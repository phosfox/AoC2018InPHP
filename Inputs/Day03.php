<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 15.01.2019
 * Time: 17:30
 */
require_once "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Claim.php";

class Day03
{
    private $claims = array();
    private $fabric = array(array());
    private $width = 1000;

    public function main(): void
    {
        $this->solvePart1();
    }


    public function setFabric(): void
    {
        $this->fabric = array_fill(0, $this->width, array_fill(0, $this->width, 0));
    }


    public function __construct()
    {
        $this->parseInput();
        $this->setFabric();
    }

    private function parseInput(): void
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day3.txt";
        if ($fh = fopen($filename, 'rb')) {
            while (($line = fgets($fh)) !== false) {
                //array_push($this->input, $line);
                preg_match("/#(\d+)\s+@\s+(\d+),(\d+):\s+(\d+)x(\d+)/", $line, $words);
                $claim = new Claim($words[1], $words[4], $words[5], $words[2], $words[3]);
                $this->claims[] = $claim;
            }
            fclose($fh);
        }
    }

    private function solvePart1(): void
    {
        foreach ($this->claims as $claim) {
            $x = $claim->getX();
            $y = $claim->getY();
            $w = $claim->getWidth();
            $h = $claim->getHeight();
            $xPlusW = $x + $w;
            $yPlusH = $y + $h;
            printf("ID:%d X:%d Y:%d WIDTH:%d Height%d x+w:%d y+h:%d\n", $claim->getId(), $x, $y, $w, $h, $xPlusW, $yPlusH);

            for (; $x <= $xPlusW; $x++) {
                for (; $y <= $yPlusH; $y++) {
                    if ($this->fabric[$x][$y] === 0) {
                        $this->fabric[$x][$y] = $claim->getId();
                    } else {
                        $this->fabric[$x][$y] = -1;
                    }
                }
            }
        }

        $claimedInches = 0;
        foreach ($this->fabric as $row) {
            foreach ($row as $e) {
                if ($e === -1) {
                    $claimedInches++;
                }
            }
        }
        print_r($claimedInches);

    }

}

$day = new Day03();
$day->main();
