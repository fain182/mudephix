<?php
namespace Mudephix\Tests\Acceptance;

class LocalCommandTest extends BaseCommandTestCase
{

    public function testLocalCommand() {
        $this->assertCommandOutputEquals('/fixtures/localCommand', "hello", ["hello world"]);
    }

    public function testLocalCommandFailureStopTheTask() {
        $this->assertCommandOutputContains('/fixtures/localCommand', "helloFailure", "ERROR in console command.");
    }

}