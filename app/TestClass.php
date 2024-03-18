<?php

namespace App;

class TestClass
{
    private string $name;
    public string $test;

    public function __debugInfo () {
        return call_user_func('get_object_vars', $this);
    }
}
