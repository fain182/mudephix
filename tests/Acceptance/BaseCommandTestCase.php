<?php

namespace Mudephix\Tests\Acceptance;


class BaseCommandTestCase extends \PHPUnit_Framework_TestCase
{

    public function assertCommandOutputEquals($fixture, $command, $expected)
    {
        $mdx = __DIR__ . '/../../bin/mudephix';
        chdir(__DIR__ . $fixture);
        exec($mdx . " " . $command, $output);
        $this->assertEquals($expected, $output);
    }

}