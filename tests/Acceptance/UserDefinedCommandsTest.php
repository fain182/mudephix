<?php

namespace Acceptance;


class UserDefinedCommandsTest extends \PHPUnit_Framework_TestCase
{

    public function testCommandWithoutArguments() {
        $fakeWriter = new FakeWriter();

        $mudephix = new \Mudephix\Mudephix($fakeWriter);
        $mudephix->run(__DIR__.'/fixtures/mdxfile.php', 'yell');

        $this->assertEquals("FOO\n", $fakeWriter->getOutput());
    }
    
}

class FakeWriter {

    public function __construct()
    {
        $this->output = '';
    }

    public function write($string) {
        $this->output .= $string;
    }

    public function getOutput()
    {
        return $this->output;
    }
}