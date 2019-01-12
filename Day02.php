<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 12.01.2019
 * Time: 16:31
 */

class Day02
{
    private $input = array();

    private function parseInput()
    {
        $filename = "C:\Users\Constantin\PhpstormProjects\AdventOfCode2018\Inputs\Day2.txt";
        if ($fh = fopen($filename, "r")) {
            while (($line = fgets($fh)) !== false) {
                array_push($this->input, $line);
            }
            fclose($fh);
        }
    }

    private function solvePart2()
    {
        foreach ($this->input as $str) {
            foreach ($this->input as $str2) {
                if ($str == $str2) {
                    break;
                }
                if ($this->differBy1($str, $str2)) {
                    for ($i = 0; $i < strlen($str); $i++) {
                        if ($str[$i] != $str2[$i]) {
                            $result = str_split($str, 1);

                            //This removes an element at index i
                            unset($result[$i]);

                            //implode glues together the elements of an array with a given glue
                            printf("%s\n",implode("", $result));
                            return;
                        }
                    }
                }
            }
        }
    }

    private function differBy1(string $str1, string $str2): bool
    {
        $diff = 0;
        for ($i = 0; $i < strlen($str1); $i++) {
            if ($str1[$i] != $str2[$i]) {
                $diff++;
            }
            if ($diff >= 2) {
                return false;
            }
        }
        return true;
    }

    private function solvePart1()
    {
        $twos = $threes = 0;
        foreach ($this->input as $str) {
            $freq = $this->countLetters($str);
            $twos += $freq[0];
            $threes += $freq[1];
        }
        printf("%d * %d = %d\n", $twos, $threes, $twos * $threes);
    }

    private function countLetters(string $s)
    {
        $twos = $threes = 0;
        $arr = array_count_values(str_split($s, 1));

        foreach ($arr as $value) {
            if ($value == 2) {
                $twos = 1;
            }
            if ($value == 3) {
                $threes = 1;
            }
        }
        return [$twos, $threes];
    }

    public function main()
    {
        $this->solvePart1();
        $this->solvePart2();
    }

    public function __construct()
    {
        $this->parseInput();
    }
}

$day = new Day02();
$day->main();