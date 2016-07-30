<?php

namespace PetrKnap\Php\Singleton\Test;

use PetrKnap\Php\Singleton\Test\SingletonTraitTest\ClassThatExtendsSingleton;
use PetrKnap\Php\Singleton\Test\SingletonTraitTest\ClassThatUsesSingletonTrait;

class SingletonTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataReturnsValidInstance
     * @param string $singletonClassName
     */
    public function testReturnsValidInstance($singletonClassName)
    {
        $instance = call_user_func("{$singletonClassName}::getInstance");

        $this->assertEquals($singletonClassName, get_class($instance));
    }

    public function dataReturnsValidInstance()
    {
        return [
            [ClassThatUsesSingletonTrait::getClassName()],
            [ClassThatExtendsSingleton::getClassName()]
        ];
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
