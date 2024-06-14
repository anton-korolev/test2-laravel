<?php

namespace App\Http\Resources;

use App\Http\Requests\KeywordRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ArticleSearchResource extends JsonResource
{
    /**
     * Returns a list of the seaeched `Articles`.
     *
     * @param string $keyWord
     *
     * @return static
     */
    public static function search(KeywordRequest $request): static
    {
        $validated = $request->validated();

        $rows = DB::select(
            "SELECT articles.id AS id, articles.title AS title, words_in_articles.`count` AS `count`\n"
                . "FROM articles\n"
                . "INNER JOIN words_in_articles ON articles.id = words_in_articles.article_id\n"
                . "INNER JOIN words ON words.id = words_in_articles.word_id\n"
                . "WHERE words.word = '{$validated['keyword']}'\n"
                . "ORDER BY words_in_articles.`count` DESC;"
        );

        $count = 0;
        foreach ($rows as $row) {
            $count += $row->count;
        }

        return new static([
            'title' => 'Найдено совпадений: ' . $count,
            'results' => $rows,
        ]);
    }
}
