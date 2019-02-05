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
    private $maxX = PHP_INT_MIN;
    private $maxY = PHP_INT_MIN;
    private $minX = PHP_INT_MAX;
    private $minY = PHP_INT_MAX;

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
        $this->solvePart1();
    }

    public function solvePart2()
    {
        // TODO: Implement solvePart2() method.
    }

    public function solvePart1()
    {
        foreach ($this->points as $p) {
            if ($p->x > $this->maxX) {
                $this->maxX = $p->x;
            }
            if ($p->y > $this->maxY) {
                $this->maxY = $p->y;
            }
            if ($p->x < $this->minX) {
                $this->minX = $p->x;
            }
            if ($p->y < $this->minY) {
                $this->minY = $p->y;
            }
        }
        printf('max: %d,%d min: %d,%d' . PHP_EOL, $this->maxX, $this->maxY, $this->minX, $this->minY);


    }

    public function manhattanDist(int $x1, int $y1, int $x2, int $y2)
    {
        return abs($x1 - $x2) + abs($y1 - $y2);
    }
}
$d = new Day06();
$d->main();
