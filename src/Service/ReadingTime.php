<?php

namespace App\Service;

trait ReadingTime
{
    public function getReadTimeInMinutes(string $text, int $wordsPerMinute = 200): int
    {
        // Returns word count, longer than 3 word-chars.
        $wordCount = preg_match_all('/\w{4,}/', strip_tags($text));

        return ceil($wordCount / $wordsPerMinute);
    }
}