<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 02.02.2019
 * Time: 19:44
 */

class Point
{
    public $x, $y;

    /**
     * Point constructor.
     * @param $x
     * @param $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

}