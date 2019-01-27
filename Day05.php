<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 22.01.2019
 * Time: 16:33
 */
require_once "IDay.php";

class Day05 implements IDay
{
    private $input = "";
    private $diffInputs = [];

    public function parseInput(): void
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day5.txt";
        if ($fh = fopen($filename, 'rb')) {
            while (($line = fgets($fh)) !== false) {
                $this->input = $line;
            }
            fclose($fh);
        }
    }

    public function __construct()
    {
        $this->parseInput();
    }

    public function main(): void
    {
        $this->solvePart1();
        $this->solvePart2();
    }

    public function solvePart2(): void
    {
        $letters = 'abcdefghijklmnopqrstuvwxyz';
        for ($i = 0, $iMax = strlen($letters); $i < $iMax; $i++) {
            $this->diffInputs[] = $this->removeLetterFromString($letters[$i], $this->input);
        }

        $reactedStr = [];
        foreach ($this->diffInputs as $str) {
            $reactedStr[] = $this->reactString($str);
        }

        $minLen = PHP_INT_MAX;
        foreach ($reactedStr as $s) {
            if (strlen($s) <= $minLen) {
                $minLen = strlen($s);
            }
        }
        printf('Shortest polymer length: %d' . PHP_EOL, $minLen);
    }

    public function solvePart1(): void
    {
        $this->input = $this->reactString($this->input);
        printf('Length: %d' . PHP_EOL, strlen($this->input));
    }

    private function reactString(string $input): String
    {
        while (true) {
            $lenBefore = strlen($input);
            for ($i = 0; $i < strlen($input) - 1; $i++) {
                if ($this->canReact($input[$i], $input[$i + 1])) {
                    $input = substr_replace($input, "", $i, 2);
                }
            }
            if ($lenBefore === strlen($input)) {
                break;
            }
        }
        return $input;
    }

    public function canReact($l, $r): bool
    {
        if ($l === $r) {
            return false;
        }
        return strtoupper($l) === $r or strtolower($l) === $r;
    }

    public function removeLetterFromString(string $char, string $str): string
    {
        $chars = [$char, strtoupper($char)];
        return str_replace($chars, '', $str);

    }
}

$day = new Day05();
$day->main();