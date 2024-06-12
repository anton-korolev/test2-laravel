<?php

namespace App\Http\Resources;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Find the `Article` resource by its id or throw an exception.
     *
     * @param string $id article id.
     *
     * @return static instance of the `Article` resource.
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\App\Models\Article>
     */
    public static function findOrFail(string $id): static
    {
        return new static(Article::findOrFail($id));
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
