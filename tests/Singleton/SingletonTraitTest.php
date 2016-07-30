<?php

namespace PetrKnap\Php\Singleton\Test;

use PetrKnap\Php\Singleton\SingletonInterface;
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

    /**
     * @dataProvider dataReturnsOnlyOneInstance
     * @param string $singletonClassName
     * @param SingletonInterface $expectedSingletonInstance
     */
    public function testReturnsOnlyOneInstance($singletonClassName, SingletonInterface $expectedSingletonInstance)
    {
        $instance = call_user_func("{$singletonClassName}::getInstance");

        $this->assertSame($expectedSingletonInstance, $instance);

        /** @noinspection PhpUndefinedMethodInspection */
        $expectedSingletonInstance->setData(rand(0, 1023));

        /** @noinspection PhpUndefinedMethodInspection */
        $this->assertEquals($expectedSingletonInstance->getData(), $instance->getData());
    }

    public function dataReturnsOnlyOneInstance()
    {
        return [
            [ClassThatUsesSingletonTrait::getClassName(), ClassThatUsesSingletonTrait::getInstance()],
            [ClassThatExtendsSingleton::getClassName(), ClassThatExtendsSingleton::getInstance()]
        ];
    }
}
