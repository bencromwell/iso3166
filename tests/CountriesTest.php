<?php

use Cromwell\ISO3166\CodesByName;
use PHPUnit\Framework\TestCase;

class CountriesTest extends TestCase
{
    const TOTAL_COUNTRIES = 246;

    public function testCountries()
    {
        $countries = new \Cromwell\ISO3166\Countries();
        $this->assertCount(self::TOTAL_COUNTRIES, $countries);

        $austria = $countries[CodesByName::AUSTRIA];
        $this->assertNotNull($austria);
        $this->assertInstanceOf('Cromwell\ISO3166\Country', $austria);
        $this->assertEquals(CodesByName::AUSTRIA, $austria->code);
        $this->assertEquals('Austria', $austria->name);

        $this->assertNull($countries['123']);
        $countries['123'] = new \Cromwell\ISO3166\Country('code', 'name');
        $test = $countries['123'];
        $this->assertNotNull($test);
        $this->assertInstanceOf('Cromwell\ISO3166\Country', $test);

        unset($countries['123']);
        $this->assertNull($countries['123']);

        $forJson = $countries->jsonSerialize();
        $this->assertCount(self::TOTAL_COUNTRIES, $forJson);

        $countries = new \Cromwell\ISO3166\Countries([CodesByName::AUSTRIA]);
        $this->assertEquals(1, count($countries));
        $json = json_encode($countries);
        $this->assertEquals('{"AT":{"code":"AT","name":"Austria"}}', $json);
    }
}
