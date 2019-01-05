<?php


/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 05.01.2019
 * Time: 18:38
 */

class Day01
{
    private $input = array();

    public function main()
    {
        $this->solvePart1();
        $this->solvePart2();
    }

    public function solvePart2()
    {
        $seen = new \Ds\Set();
        $sum = 0;
        while (true) {
            foreach ($this->input as $num) {
                $sum += $num;
                if ($seen->contains($sum)) {
                    printf("%d \n", $sum);
                    return;
                }
                $seen->add($sum);

            }
        }
    }

    public function solvePart1()
    {
        $sum = array_sum($this->input);
        print $sum;
        print "\n";
    }

    public function parseInput()
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day1.txt";
        if ($fh = fopen($filename, "r")) {
            while (($line = fgets($fh)) !== false) {
                array_push($this->input, (int)$line);
            }
            fclose($fh);
        }
    }

    public function __construct()
    {
        $this->parseInput();
    }

}
$day = new Day01();
$day->main();