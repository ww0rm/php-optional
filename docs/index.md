ww0rm\optional\Optional
===============

Class Optional
implements Java8 Optional features in PHP7



Methods
-------


### isPresent

    bool ww0rm\optional\Optional::isPresent()

is object is not null


### ifPresent

    ww0rm\optional\Optional::ifPresent(callable $callable)

call user function if object is present


### orElse

    object ww0rm\optional\Optional::orElse()

get object or return object from argument


### orElseThrow

    object|exception ww0rm\optional\Optional::orElseThrow(\Exception $exception)

get object or throw exception


### get

    object ww0rm\optional\Optional::get()

get object