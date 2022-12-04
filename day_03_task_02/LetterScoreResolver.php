<?php

class LetterScoreResolver
{
    /** @var array<string, int> */
    private array $letterScore = [];

    public function __construct()
    {
        $lowerCaseLetters = range('a', 'z');

        $i = 1;

        foreach ($lowerCaseLetters as $lowerCaseLetter) {
            $this->letterScore[$lowerCaseLetter] = $i;
            $this->letterScore[strtoupper($lowerCaseLetter)] = $i + 26;

            $i++;
        }
    }

    public static function getInstance(): self
    {
        return new self();
    }

    public function getLetterPoints(string $letter): int
    {
        return $this->letterScore[$letter];
    }
}