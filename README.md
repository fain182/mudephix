# Mudephix

[![CircleCI](https://circleci.com/gh/fain182/mudephix.svg?style=svg)](https://circleci.com/gh/fain182/mudephix)
[![Code Climate](https://codeclimate.com/github/fain182/mudephix/badges/gpa.svg)](https://codeclimate.com/github/fain182/mudephix)

### Mudephix is a little PHP task runner, that takes A LOT of inspiration from [Idephix](https://github.com/ideatosrl/Idephix)

It tries to take the good ideas from idephix, like:
 - define tasks like functions in php
 - simplify execution of local and remote command
 - support multi-environment

But in just ~200 lines, removing all the complexity from:
 - supporting extensions
 - supporting multiple file formats
 - supporting some specific deploy strategy
 - parsing php and running it autonomously

# Goals

Mudephix is meant to be (in order of priority):
 - simple and predictable
 - comfortable to use
 - compatible with idephix
 
# Getting started 
 
 To automatize the tasks of your project you need to create an `mdxfile`, listing all the command that you want to automatize as functions.
 
 ```php
 <?php

// the first argument must be the $context
function test(\Mudephix\Context $context) {
    $context->local('./vendor/bin/phpunit tests ');
}

// arguments after the first will be the arguments of the command
function greet(\Mudephix\Context $context, $name) {
    $context->local("echo 'Hey $name!'");
}

// arguments can have the default
function showFiles(\Mudephix\Context $context, $path='.') {
    $context->local("ls $path");
}

// you can call one task from another, exactly like you expected
function showHome(\Mudephix\Context $context) {
    showFiles($context, "/home");
}

```

## Context

`Context` is a utility class to automatize some common needs:
 - `local($shellCommand)` to run commands in the local machine
 - `remote($shellCommand)` to run commands on a remote machine via SSH (specified in the environment)
 - `writeln($string)` is like echo
 - `get($key)` to read environment-dependent configuration

## Environment

`mdxrc` file is used to store environment-dependent configuration, for example:
 
 
``` php
<?php

return [
    'envs' => [
        'production' => [
            'host' => 'google.com',
            'user' => 'root'
        ],
        'CI' => [
            'host' => 'circleci.com',
            'user' => 'mudephix'
        ]
    ]
];
```

You can call the task you want with the `--env` flag to identify the correct environment, so for example you can do something like:
`mudephix deploy --env=production`
