<?php

namespace PetrKnap\Php\Singleton;

/**
 * Singleton trait
 *
 * @author   Petr Knap <dev@petrknap.cz>
 * @since    2015-04-18
 * @category Patterns
 * @package  PetrKnap\Php\Singleton
 * @version  0.2
 * @license  https://github.com/petrknap/php-singleton/blob/master/LICENSE MIT
 */
trait SingletonTrait
{
    /**
     * @var self[]
     */
    private static $instances = [];

    /**
     * Creates new instance
     */
    private function __construct()
    {
        // Constructor must be private
    }

    /**
     * Returns instance, if instance does not exist then creates new one and returns it
     *
     * @return self
     */
    public static function getInstance()
    {
        $self = get_called_class();
        if (!isset(self::$instances[$self])) {
            self::$instances[$self] = new $self;
        }
        return self::$instances[$self];
    }
}
