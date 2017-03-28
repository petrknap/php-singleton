<?php

namespace PetrKnap\Php\Singleton\Test\SingletonTraitTest;

use PetrKnap\Php\Singleton\SingletonInterface;
use PetrKnap\Php\Singleton\SingletonTrait;

class ClassThatUsesSingletonTrait implements SingletonInterface
{
    use SingletonTrait;

    private $data;

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }
}
