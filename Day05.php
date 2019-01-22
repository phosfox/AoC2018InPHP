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
    }

    public function solvePart2(): void
    {
        // TODO: Implement solvePart2() method.
    }

    public function solvePart1(): void
    {
        $this->input = $this->reactString($this->input);
        echo $this->input . "\n";
        printf("Lenght: %d", strlen($this->input));
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
}

$day = new Day05();
$day->main();