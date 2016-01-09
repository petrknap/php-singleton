<?php

namespace PetrKnap\Php\Singleton;

class SingletonTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testCanNotInstantiateExternally()
    {
        $reflection = new \ReflectionClass(SingletonMock::getClassName());

        $this->assertFalse($reflection->getConstructor()->isPublic());
    }

    public function testReturnsValidInstance()
    {
        $instance = SingletonMock::getInstance();

        $this->assertInstanceOf(SingletonMock::getClassName(), $instance);
    }

    public function testReturnsOnlyOneInstance()
    {
        $data = __METHOD__;

        /** @var SingletonMock $a */
        $a = SingletonMock::getInstance();

        $a->setData($data);

        /** @var SingletonMock $b */
        $b = SingletonMock::getInstance();

        $this->assertEquals($data, $b->getData());
    }
}

class SingletonMock implements SingletonInterface
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

    public static function getClassName()
    {
        return __CLASS__;
    }
}
