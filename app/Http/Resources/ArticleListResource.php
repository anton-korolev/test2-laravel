<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class ArticleListResource extends JsonResource
{
    /**
     * Returns a list of the all `Articles`.
     *
     * @return static
     */
    public static function list(): static
    {
        $rows = DB::select(
            "SELECT title, url, SUM(words_in_articles.`count`) AS word_count, ROUND(LENGTH(content) / 1024, 2) AS len\n"
                . "FROM articles\n"
                . "INNER JOIN words_in_articles ON words_in_articles.article_id = articles.id\n"
                . "GROUP BY articles.id;"
        );
        return new static($rows);
    }
}
