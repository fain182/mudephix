<?php

namespace Acceptance;


use Mudephix\Tests\Acceptance\BaseCommandTestCase;

class EnvironmentTest extends BaseCommandTestCase
{

    public function testChooseEnvironment() {
        $this->assertCommandOutputEquals('/fixtures/environments', "showUser --env=test", ["kea"]);
    }

    public function testMissingEnvironment() {
        $this->assertCommandOutputEquals('/fixtures/environments', "showUser", ["Error: no environment specified"]);
    }

    public function testMissingKeyInEnvironment() {
        $this->assertCommandOutputEquals('/fixtures/environments', "missingKey --env=prod", ["Error: key ssh_params.NOT_EXISTS is missing in environment prod"]);
    }

}