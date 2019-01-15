<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 15.01.2019
 * Time: 17:47
 */

class Claim
{
    private $id;
    private $width, $height;
    private $x, $y;

    /**
     * Claim constructor.
     * @param $id
     * @param $width
     * @param $height
     * @param $x
     * @param $y
     */
    public function __construct($id, $width, $height, $x, $y)
    {
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x): void
    {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y): void
    {
        $this->y = $y;
    }


}