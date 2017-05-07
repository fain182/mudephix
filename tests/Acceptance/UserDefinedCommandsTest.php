<?php

namespace Acceptance;


class UserDefinedCommandsTest extends \PHPUnit_Framework_TestCase
{

    public function testWithoutInputFile() {
        $this->assertCommandOutputEquals('/fixtures/empty', "any_command", ["No mdxfile found."]);
    }

    public function testWrongCommandName() {
        $this->assertCommandOutputEquals('/fixtures/simple', "wrong_name", ["Command 'wrong_name' not found."]);
    }

    public function testCommandWithoutArgument() {
        $this->assertCommandOutputEquals('/fixtures/simple', "yell", ["FOO!"]);
    }

    public function testCommandWithArgument() {
        $this->assertCommandOutputEquals('/fixtures/simple', "yell asd", ["ASD!"]);
    }

    public function testCommandMissingMandatoryArgument() {
        $this->assertCommandOutputEquals('/fixtures/simple', "greet", ["Too few arguments."]);
    }

    public function testListOfCommands() {
        $this->assertCommandOutputEquals('/fixtures/simple', "", ["mdxfile - available commands:", "yell", "greet"]);
    }


    public function testChooseEnvironment() {
        $this->assertCommandOutputEquals('/fixtures/environments', "showUser --env=test", ["kea"]);
    }

    public function testMissingEnvironment() {
        $this->assertCommandOutputEquals('/fixtures/environments', "showUser", ["Error: no environment specified"]);
    }


    private function assertCommandOutputEquals($fixture, $command, $expected)
    {
        $mdx = __DIR__ . '/../../bin/mudephix';
        chdir(__DIR__ . $fixture);
        exec($mdx . " " . $command, $output);
        $this->assertEquals($expected, $output);
    }

}