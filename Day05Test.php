<?php
/**
 * Created by PhpStorm.
 * User: Constantin
 * Date: 22.01.2019
 * Time: 18:00
 */

require_once "Day05.php";

class Day05Test extends PHPUnit_Framework_TestCase
{
    public function testCanReact()
    {
        $d = new Day05();
        $s = "Aad";
        $sNew = substr_replace($s, "", 0, 2);
        echo $sNew . "\n";
        $this->assertTrue($d->canReact($s[0], $s[1]));
        $this->assertTrue($d->canReact($s[1], $s[0]));
        $this->assertFalse($d->canReact($s[0], $s[2]));
    }

    public function testRemoveLettersFromString()
    {
        $d = new Day05();
        $chr = 'a';
        $chr2 = 's';
        $str = 'AAssssddddaa';

        $this->assertSame('ssssdddd', $d->removeLetterFromString($chr, $str));
        $this->assertSame('AAddddaa', $d->removeLetterFromString($chr2, $str));

    }
}
