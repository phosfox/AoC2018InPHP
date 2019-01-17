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

        $m0 = $m1 = 0;
        $guard = 0;
        foreach ($this->input as $line) {

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

                for ($m = $m0; $m < $m1; $m++) {
                    if (!isset($this->totals[$guard])) {
                        $this->totals[$guard] = 1;
                    } else {
                        $this->totals[$guard] += 1;
                    }
                    if (!isset($this->minutes[$guard][$m])) {
                        $this->minutes[$guard][$m] = 1;
                    } else {
                        $this->minutes[$guard][$m] += 1;

                    }
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
        $this->solvePart2();
    }

    public function solvePart1(): void
    {
        $max = -1;
        $guardID = 0;
        $maxMin = -1;
        $timeStamp = 0;

        foreach ($this->totals as $key => $value) {
            if ($value >= $max) {
                $max = $value;
                $guardID = $key;
            }
        }
        foreach ($this->minutes[$guardID] as $key => $value) {
            if ($value >= $maxMin) {
                $maxMin = $value;
                $timeStamp = $key;
            }
        }

        printf("maxMin:%d * id:%d = %d\n", $timeStamp, $guardID, $timeStamp * $guardID);
    }

    public function solvePart2(): void
    {
        $id = 0;
        $asleepMin = 0;
        $max = -1;

        foreach ($this->minutes as $guardId => $guardMinutes) {
            foreach ($guardMinutes as $minute => $timesAsleep) {
                if ($timesAsleep >= $max) {
                    $max = $timesAsleep;
                    $id = $guardId;
                    $asleepMin = $minute;
                }
            }
        }
        printf("id:%d * minute:%d = %d\n", $id, $asleepMin, $id * $asleepMin);

    }
}

$day = new Day04();
$day->main();