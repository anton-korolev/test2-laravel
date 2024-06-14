<?php

namespace App\Http\Resources;

use App\Http\Requests\KeywordRequest;
use App\Models\Article;
use App\Models\WordProcessor;
use App\Services\WikiParser\WikiParser;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Find the `Article` resource by its id or throw an exception.
     *
     * @param string $id article id.
     *
     * @return static|\App\Http\Resources\ArticleErrorResource instance of the `Article` resource or
     * the `ArticleError` resource if the article is not found.
     */
    public static function findById(string $id): static|ArticleErrorResource
    {
        try {
            return new static(Article::findOrFail($id));
        } catch (ModelNotFoundException $th) {
            return new ArticleErrorResource(['message' => 'Статья не найдена.']);
        }
    }

    /**
     * Import and save article.
     *
     * @param \App\Http\Requests\ImportArticleRequest $request
     *
     * @return static|\App\Http\Resources\ArticleErrorResource
     */
    public static function import(KeywordRequest $request): static|ArticleErrorResource
    {
        $startTime = microtime(true);
        $wordCount = 0;

        $validated = $request->validated();

        $articleDTO = WikiParser::getArticleByKeyword($validated['keyword']);
        if (!$articleDTO) {
            return new ArticleErrorResource(['message' => 'Подходящая статья не найдена.']);
        }

        // dd(static::explodeText($articleDTO->content));
        // static::saveWords(static::explodeText($articleDTO->content), 0);

        // $article->query()->upsert($article->getAttributes(), 'url_hash', []);
        if ($article = Article::findByURL($articleDTO->url)) {
            return new ArticleErrorResource(['message' => "Эта статья уже загружена.\nСсылка:{$article->url}"]);
        } else {
            $article = Article::create([
                'url' => $articleDTO->url,
                'title' => $articleDTO->title,
                'content' => $articleDTO->content,
            ]);
            $article->save();
            // $startTime = microtime(true);
            $wordCount = WordProcessor::saveWords($articleDTO->content, $article->id);
        }

        $endTime = microtime(true);

        $result = [
            'articleUrl' => $article->url,
            'articleTitle' => $article->title,
            'articleSize' => (string)round(strlen($article->content) / 1024, 2) . ' Kb',
            'wordCount' => $wordCount,
            'elapsedTime' => (string)round($endTime - $startTime, 2) . ' сек.',
        ];

        return new static($result);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
