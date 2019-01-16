<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 16.01.2019
 * Time: 16:46
 */
require_once "IDay.php";

class Day04 implements IDay
{
    private $input = [];
    protected $totals = [];
    protected $minutes = [[]];

    private function parseInput(): void
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day4.txt";
        if ($fh = fopen($filename, 'rb')) {
            while (($line = fgets($fh)) !== false) {
                $this->input[] = $line;
            }
            fclose($fh);
        }
        sort($this->input);

        foreach ($this->input as $line) {
            $m0 = $m1 = 0;
            $guard = 0;
            preg_match("/:(\d+)/", $line, $matches);
            $minute = (int)$matches[1];

            if (strpos($line, '#') !== false) {
                preg_match("/#(\d+)/", $line, $matches);
                $guard = (int)$matches[1];

            } elseif (strpos($line, 'asleep') !== false) {
                $m0 = $minute;

            } elseif (strpos($line, 'wakes') !== false) {
                $m1 = $minute;
            }
            for ($m = $m0; $m < $m1; $m++) {
                $this->totals[$guard] += 1;
                $this->minutes[$guard][$m] += 1;

            }
        }
        print_r($this->totals);
        print_r($this->minutes);
    }


    public function __construct()
    {
        $this->parseInput();
    }

    public function main(): void
    {
        $this->solvePart1();
    }

    public function solvePart1(): void
    {
    }

    public function solvePart2()
    {
        // TODO: Implement solvePart2() method.
    }
}

$day = new Day04();
$day->main();