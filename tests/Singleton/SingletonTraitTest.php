<?php

namespace PetrKnap\Php\Singleton\Test;

use PetrKnap\Php\Singleton\Test\SingletonTraitTest\ClassThatUsesSingletonTrait;

class SingletonTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsValidInstance()
    {
        $instance = ClassThatUsesSingletonTrait::getInstance();

        $this->assertInstanceOf(ClassThatUsesSingletonTrait::getClassName(), $instance);
    }

    public function testReturnsOnlyOneInstance()
    {
        $data = __METHOD__;

        /** @var ClassThatUsesSingletonTrait $a */
        $a = ClassThatUsesSingletonTrait::getInstance();

        $a->setData($data);

        /** @var ClassThatUsesSingletonTrait $b */
        $b = ClassThatUsesSingletonTrait::getInstance();

        $this->assertEquals($data, $b->getData());
    }
}
