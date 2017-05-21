# Mudephix

[![CircleCI](https://circleci.com/gh/fain182/mudephix.svg?style=svg)](https://circleci.com/gh/fain182/mudephix)

Mudephix is a little PHP task runner, that takes A LOT of inspiration from [Idephix](https://github.com/ideatosrl/Idephix).

Mudephix is meant to be (in order of priority):
 - simple and predictable
 - comfortable to use
 - compatible with idephix
 
 #Getting started 
 
 To automatize the tasks of your project you need to create an `mdxfile`, listing all the command that you want to automatize as functions.
 
 ```php
 <?php

function test(\Mudephix\Context $context) {
    $context->local('./vendor/bin/phpunit tests ');
}
```


