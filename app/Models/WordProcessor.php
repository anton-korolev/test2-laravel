<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Support\Facades\DB;

class WordProcessor
{
    /**
     * Splits the text into words.
     *
     * Counts occurrences of each word.
     *
     * @param string $content
     *
     * @return array<string,int> (word => occurrenceCount)
     */
    protected static function explodeText(string $content): array
    {
        $words = [];
        foreach (mb_split('[^[a-zA-Zа-яА-Я0-9]]+', $content) as $word) {
            if ('' !== $word) {
                $word = mb_strtolower($word);
                $words[$word] = ($words[$word] ?? 0) + 1;
            }
        }
        // dd(mb_split('[^[a-zA-Zа-яА-Я0-9]]+', $articleDTO->content));
        // dd($words);

        return $words;
    }

    /**
     * Splits text into words and stores them in a database.
     *
     * @param string $content
     *
     * @return int full word count (including duplicates).
     */
    public static function saveWords(string $content, int $articleId): int
    {
        /** @var array<string,int> (word => occurrenceCount) */
        $words = static::explodeText($content);

        /** @var array<int,array{word:string}> */
        $wordToDB = array_map(
            fn (string $word): array => ['word' => $word],
            array_keys($words)
        );

        foreach (array_chunk($wordToDB, 25000) as $wordChank) {
            DB::table('words')->insertOrIgnore($wordChank);
        }

        /** @var array<string,int> (word => id) */
        $wordId = [];
        foreach (DB::table('words')
            ->select()
            ->whereIn('word', array_keys($words))
            ->get()
            ->all()
            as $row) {
            $wordId[(string)$row->word] = $row->id;
        }

        /** @var array<int,array{word_id:int,article_id:int,count:int}> */
        $wordInArticleToDB = [];
        foreach ($words as $word => $count) {
            $wordInArticleToDB[] = [
                'word_id' => $wordId[$word],
                'article_id' => $articleId,
                'count' => $count,
            ];
        }
        foreach (array_chunk($wordInArticleToDB, 25000) as $chank) {
            DB::table('words_in_articles')->insertOrIgnore($chank);
        }

        return array_sum($words);
    }
}
