<?php

use Cromwell\ISO3166\CodesByName;
use PHPUnit\Framework\TestCase;

class EUTest extends TestCase
{

    public function testEU()
    {
        $eu = new \Cromwell\ISO3166\Subsets\EU();
        $this->assertCount(28, $eu);

        $this->assertNull($eu[CodesByName::UNITED_STATES]);
        $this->assertNotNull($eu[CodesByName::AUSTRIA]);
    }

}
