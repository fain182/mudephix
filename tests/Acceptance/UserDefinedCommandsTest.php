<?php

namespace Acceptance;


class UserDefinedCommandsTest extends \PHPUnit_Framework_TestCase
{

    public function testWithoutInputFile() {
        $this->assertCommandOutputEquals('/fixtures/empty', "any_command", ["No mdxfile found."]);
    }

    public function testCommandWithoutArgument() {
        $this->assertCommandOutputEquals('/fixtures/simple', "yell", ["FOO"]);
    }


    //command not found
    //command with argument
    //dry-run

    private function assertCommandOutputEquals($fixture, $command, $expected)
    {
        $mdx = __DIR__ . '/../../bin/mudephix';
        chdir(__DIR__ . $fixture);
        exec($mdx . " " . $command, $output);
        $this->assertEquals($expected, $output);
    }

}