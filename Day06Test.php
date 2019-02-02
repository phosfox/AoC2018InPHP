<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 02.02.2019
 * Time: 19:23
 */

require_once 'Day06.php';

class Day06Test extends PHPUnit_Framework_TestCase
{

    public function testManhattanDist()
    {
        $d = new Day06();
        $this->assertTrue($d->manhattanDist(1, 1, 3, 3) == 4);
        $this->assertTrue($d->manhattanDist(1, 1, 1, 1) == 0);
        $this->assertTrue($d->manhattanDist(3, 3, 1, 1) == 4);
        $this->assertTrue($d->manhattanDist(2, 4, 4, 2) == 4);

    }
}
