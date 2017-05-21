<?php

namespace Mudephix\Tests\Acceptance;


class BaseCommandTestCase extends \PHPUnit_Framework_TestCase
{

    public function assertCommandOutputEquals($fixture, $command, $expected)
    {
        $output = $this->runCommand($fixture, $command);
        $this->assertEquals($expected, $output);
    }

    public function assertCommandOutputContains($fixture, $command, $expected)
    {
        $output = $this->runCommand($fixture, $command);
        $this->assertContains($expected, $output);
    }

    private function runCommand($fixture, $command)
    {
        $mdx = __DIR__ . '/../../bin/mudephix';
        chdir(__DIR__ . $fixture);
        exec($mdx . " " . $command, $output);
        return $output;
    }

}