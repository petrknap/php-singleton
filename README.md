# php-singleton

Singleton pattern for PHP by [Petr Knap].

* [What is Singleton pattern?](#what-is-singleton-pattern)
* [Why use Singletons?](#why-use-singletons)


## What is Singleton pattern?

> In software engineering, the **singleton pattern** is a design pattern that restricts the instantiation of a class to one object. This is useful when exactly one object is needed to coordinate actions across the system. The concept is sometimes generalized to systems that operate more efficiently when only one object exists, or that restrict the instantiation to a certain number of objects. The term comes from the mathematical concept of a singleton.
-- [Singleton pattern - Wikipedia, The Free Encyclopedia]


## Why use Singletons?

Because **it is deadlock-safe**. Don't trust me? Let see at this code:

```php
class MyFileAppender
{
    const MY_FILE = "./my.file";

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

$first = new MyFileAppender();  // OK
$second = new MyFileAppender(); // Deadlock
```

And now the **same code with Singleton pattern**:

```php
class MyFileAppender implements \PetrKnap\Php\Singleton\SingletonInterface
{
    use \PetrKnap\Php\Singleton\SingletonTrait;

    const MY_FILE = "./my.file";

    private $handle = null;

    private function __construct()
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

$first = MyFileAppender::getInstance();  // OK
$second = MyFileAppender::getInstance(); // OK
```



[Petr Knap]:http://petrknap.cz/
[Singleton pattern - Wikipedia, The Free Encyclopedia]:https://en.wikipedia.org/w/index.php?title=Singleton_pattern&oldid=706466443
