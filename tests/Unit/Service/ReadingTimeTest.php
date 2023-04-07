<?php

namespace App\Tests\Unit\Service;

use App\Service\ReadingTime;
use PHPUnit\Framework\TestCase;

class ReadingTimeTest extends TestCase
{

    use ReadingTime;

    public function testGetReadTime()
    {
        foreach ($this->provider() as $testCase) {
            $this->assertEquals($this->getReadTimeInMinutes($testCase['value']), $testCase['expected']);
        }
    }

    private function provider(): array
    {
        return array(
            array('value' => file_get_contents(__DIR__ . '/../DataForTest/1min_text.txt'), 'expected' => 1),
            array('value' => file_get_contents(__DIR__ . '/../DataForTest/2min_text.txt'), 'expected' => 2),
            array('value' => '', 'expected' => 0),
            array('value' => file_get_contents(__DIR__ . '/../DataForTest/non_word_chars.txt'), 'expected' => 0),
        );
    }
}