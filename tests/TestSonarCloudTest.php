<?php

use Cromwell\ISO3166\TestSonarCloud;
use PHPUnit\Framework\TestCase;

class TestSonarCloudTest extends TestCase
{
    public function testSonarCloud()
    {
        $testSonarCloud = new TestSonarCloud('hello', 'world');

        $this->assertEquals('hello', $testSonarCloud->getHello());
        //$this->assertEquals('world', $testSonarCloud->getWorld()); // not yet
    }
}
