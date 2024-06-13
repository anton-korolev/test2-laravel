<?php

declare(strict_types=1);

namespace App\Services\WikiParser;

class ArticleDTO
{
    public function __construct(
        public readonly string $url,
        public readonly string $title,
        public readonly string $content,
    ) {
    }
}
