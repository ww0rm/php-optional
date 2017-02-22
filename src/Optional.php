<?php
/**
 * Created by PhpStorm.
 * User: ww0rm
 * Date: 2/23/17
 * Time: 01:02
 */

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
    public static function of(object $obj) : Optional
    {
        return new Optional($obj);
    }

    /**
     * Optional constructor.
     * @param object $obj
     */
    private function __construct(object $obj)
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
     * get object or return argument object
     * @param object $obj
     * @return object
     */
    public function orElse(object $obj) : object
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
    public function orElseThrow(\Exception $exception) : object
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
    public function get() : object
    {
        return $this->obj;
    }
}