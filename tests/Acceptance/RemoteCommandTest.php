<?php

namespace Mudephix\Tests\Acceptance;

class RemoteCommandTest extends BaseCommandTestCase
{

    public function testRemoteCommand() {
        $this->assertCommandOutputContains('/fixtures/remoteCommand', "remoteUser --env=CI", "mudephixtest");
    }

    public function testRemoteCommandError() {
        $this->assertCommandOutputContains('/fixtures/remoteCommand', "remoteFail --env=CI", "ERROR in console command.");
    }

}