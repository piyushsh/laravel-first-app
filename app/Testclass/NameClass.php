<?php
/**
 * Created by PhpStorm.
 * User: piyush sharma
 * Date: 23-04-2015
 * Time: 13:29
 */

namespace App\Testclass;


use app\Testinterface\TestInterface;

class NameClass implements  TestInterface{

    protected $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name=$name;
    }

}