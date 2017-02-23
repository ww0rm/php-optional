<?php
namespace ww0rm\optional;


/**
 * Class Optional
 * @package ww0rm\optional
 */
class Optional
{
    /**
     * @var object
     */
    private $obj;

    /**
     * create Optional instance with object
     * @param object $obj
     * @return Optional
     */
    public static function of($obj) : Optional
    {
        return new Optional($obj);
    }

    /**
     * Optional constructor.
     * @param object $obj
     */
    private function __construct($obj)
    {
        $this->obj = $obj;
    }

    /**
     * is object is not null
     * @return bool
     */
    public function isPresent() : bool
    {
        return !is_null($this->obj);
    }

    /**
     * call user function if object is present
     * @param callable $callable
     */
    public function ifPresent(callable $callable)
    {
        if ($this->isPresent())
            call_user_func($callable, $this->obj);
    }

    /**
     * get object or return object from argument
     * @param object $obj
     * @return Object
     */
    public function orElse($obj)
    {
        if ($this->isPresent())
            return $this->obj;
        else
            return $obj;
    }

    /**
     * get object or throw exception
     * @param \Exception $exception
     * @return object
     * @throws \Exception
     */
    public function orElseThrow(\Exception $exception)
    {
        if ($this->isPresent())
            return $this->obj;
        else
            throw $exception;
    }

    /**
     * get object
     * @return object
     */
    public function get()
    {
        return $this->obj;
    }
}