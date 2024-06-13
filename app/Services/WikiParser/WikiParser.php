<?php

declare(strict_types=1);

namespace App\Services\WikiParser;

use Illuminate\Support\Facades\Http;

class WikiParser
{
    /**
     * Returns a Wikipedia article by keyword.
     *
     * @param string $keyword search keyword.
     *
     *@return \App\Services\WikiParser\ArticleDTO|null article or `null` in no article was found.
     */
    public static function getArticleByKeyword(string $keyword): ArticleDTO|null
    {
        $query = [
            'action' => 'parse',
            'page' => str_replace(' ', '_', $keyword),
            'format' => 'php',
        ];
        $url = "https://ru.wikipedia.org/w/api.php";

        $response = Http::timeout(10)->get($url, $query);

        if (!$response->successful()) {
            return null;
        }

        $response = unserialize($response->body());

        $response = $response['parse'] ?? null;
        if (!$response) {
            return null;
        }

        $response['text']['*'] =
            preg_replace(
                '/[ ]+/',
                ' ',
                preg_replace(
                    '/[ ]*\n+[ ]*/',
                    chr(10),
                    strip_tags(
                        preg_replace(
                            '/>/i',
                            '> ',
                            preg_replace(
                                '/<style\b[^>]*>.*<\/style>/i',
                                '',
                                /* htmlspecialchars_decode */
                                (($response['text']['*']))
                            )
                        )
                    )
                )
            );

        return new ArticleDTO(
            'https://ru.wikipedia.org/wiki/' . $response['title'],
            $response['title'],
            $response['text']['*']
        );
    }
}
