<?php

namespace App\Service;

trait ReadingTime
{
    public function getReadTimeInMinutes(string $text, int $wordsPerMinute = 200): int
    {
        // Returns word count with 4 or more word-characters.
        $wordCount = preg_match_all('/\w{4,}/', strip_tags($text));

        return ceil($wordCount / $wordsPerMinute);
    }
}