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
    private $totals = [];
    private $minutes = [[]];

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
                //printf("guard:%d\n", $guard);

            } elseif (strpos($line, 'asleep') !== false) {
                $m0 = $minute;
                //printf("m0:%d\n", $m0);


            } elseif (strpos($line, 'wakes') !== false) {
                $m1 = $minute;
                //printf("m1:%d\n", $m1);

            }
            for ($m = $m0; $m < $m1; $m++) {
                print $guard;
                if (array_key_exists($guard, $this->totals)) {
                    $this->totals[$guard]++;
                } else {
                    $this->totals[$guard] = 1;
                }
                if (array_key_exists($m, $this->minutes[$guard])) {
                    $this->minutes[$guard][$m] += 1;
                } else {
                    $this->minutes[$guard][$m] = 1;

                }

            }
        }
//        print_r($this->totals);
//        print_r($this->minutes);
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
        print_r($this->totals);
        print_r($this->minutes);
    }

    public function solvePart2(): void
    {
        // TODO: Implement solvePart2() method.
    }
}

$day = new Day04();
$day->main();