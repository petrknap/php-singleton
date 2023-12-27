# Singleton pattern for PHP

Simple implementation of singleton (anti-)pattern.


## Why use a singleton?

Because it can solve deadlocks and other problems. See this example:

```php
class UnsafeFileAppender
{
    const MY_FILE = '/tmp/my.file';

    private $handle = null;

    public function __construct()
    {
        $this->handle = fopen(self::MY_FILE, 'a');
        flock($this->handle, LOCK_EX);
    }

    public function __destruct()
    {
        flock($this->handle, LOCK_UN);
        fclose($this->handle);
    }
}
```

You cannot create two instances at the same time with this code...

```php
$first = new MyFileAppender();  // OK
$second = new MyFileAppender(); // Deadlock
```

...so simply extend the class...

```php
use PetrKnap\Singleton\SingletonInterface;
use PetrKnap\Singleton\SingletonTrait;

class SafeFileAppender extends UnsafeFileAppender implements SingletonInterface
{
    use SingletonTrait;

    private function __construct()
    {
        parent::__construct();
    }
}
```

...and use the same instance twice.

```php
$first = SafeFileAppender::getInstance();  // OK
$second = SafeFileAppender::getInstance(); // OK
```

---

Run `composer require petrknap/singleton` to install it.
You can [support this project via donation](https://petrknap.github.io/donate.html).
The project is licensed under [the terms of the `LGPL-3.0-or-later`](./COPYING.LESSER).
