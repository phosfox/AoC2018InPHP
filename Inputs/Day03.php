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
    public function main(): void
    {
        print_r($this->claims);
    }

    public function __construct()
    {
        $this->parseInput();
    }

    private function parseInput(): void
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day3.txt";
        if ($fh = fopen($filename, 'rb')) {
            while (($line = fgets($fh)) !== false) {
                //array_push($this->input, $line);
                preg_match("/#(\d+).*(\d+),(\d+).*(\d+)x(\d+)/", $line, $words);
                $claim = new Claim($words[1],$words[4],$words[5],$words[2],$words[3]);
                $this->claims[] = $claim;
            }
            fclose($fh);
        }
    }


}
$day = new Day03();
$day->main();
