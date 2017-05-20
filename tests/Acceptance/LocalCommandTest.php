<?php
namespace Mudephix\Tests\Acceptance;

class LocalCommandTest extends BaseCommandTestCase
{

    public function testLocalCommand() {
        $this->assertCommandOutputEquals('/fixtures/localCommand', "hello", ["hello world"]);
    }

    public function testLocalCommandFailureStopTheTask() {
        $this->assertCommandOutputEquals('/fixtures/localCommand', "helloFailure", ["sh: WRONGCOMMAND: command not found", "ERROR in console command."]);
    }

}