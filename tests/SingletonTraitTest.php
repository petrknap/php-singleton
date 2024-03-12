<?php declare(strict_types=1);

namespace PetrKnap\Singleton;

use PetrKnap\Singleton\SingletonTraitTest\AbstractSingleton;
use PetrKnap\Singleton\SingletonTraitTest\MySingleton;
use PetrKnap\Singleton\SingletonTraitTest\NotMySingleton;
use PHPUnit\Framework\TestCase;

final class SingletonTraitTest extends TestCase
{
    public function testSameInstancesAreSame(): void
    {
        self::assertSame(
            MySingleton::getInstance(),
            MySingleton::getInstance(),
        );
    }

    public function testDifferentInstancesAreNotSame(): void
    {
        self::assertNotSame(
            MySingleton::getInstance(),
            NotMySingleton::getInstance(),
        );
    }
}
