<?php

use Cromwell\ISO3166\CodesByName;

class CountryTest extends PHPUnit_Framework_TestCase
{

    public function testConstruct()
    {
        $country = new \Cromwell\ISO3166\Country(CodesByName::AUSTRIA, 'Austria');

        $this->assertEquals(CodesByName::AUSTRIA, $country->code);
        $this->assertEquals('Austria', $country->name);
    }

    public function testJsonSerialize()
    {
        $country = new \Cromwell\ISO3166\Country(CodesByName::AUSTRIA, 'Austria');
        $forJson = $country->jsonSerialize();

        $this->assertArrayHasKey('code', $forJson);
        $this->assertArrayHasKey('name', $forJson);

        $this->assertEquals('{"code":"AT","name":"Austria"}', json_encode($country));
    }

}
