<?php

namespace Mudephix\Tests\Acceptance;


class UserDefinedCommandsTest extends BaseCommandTestCase
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

}