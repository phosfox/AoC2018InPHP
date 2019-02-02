<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 02.02.2019
 * Time: 19:13
 */

require_once 'IDay.php';
require_once 'Point.php';

class Day06 implements IDay
{
    private $points = [];
    public function parseInput(): void
    {
        $filename ='C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day6.txt';
        if ($fh = fopen($filename, 'rb')) {
            while (($line = fgets($fh)) !== false) {
                $this->input = $line;
                $arr = explode(', ', $line);
                $this->points[] = new Point($arr[0], $arr[1]);
            }
            fclose($fh);
        }
    }

    public function main()
    {
        $this->parseInput();
    }

    public function solvePart2()
    {
        // TODO: Implement solvePart2() method.
    }

    public function solvePart1()
    {
        // TODO: Implement solvePart1() method.
    }

    public function manhattanDist(int $x1, int $y1, int $x2, int $y2)
    {
        return abs($x1 - $x2) + abs($y1 - $y2);
    }
}
$d = new Day06();
$d->main();
