<?php
declare(strict_types=1);


namespace App\Service;

trait ReadingTime
{
    public function readTime(string $text, int $wordsPerMinute = 200): string
    {
        $min = ceil($this->wordCount($text) / $wordsPerMinute);
        return sprintf('%d min.', $min);
    }

    private function wordCount(string $text): int
    {
        $text = strip_tags($text);
        return preg_match_all('/\S{4,}/', $text);
    }
}