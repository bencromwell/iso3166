<?php

namespace Cromwell\ISO3166;

class Country implements \JsonSerializable
{

    /** @var string */
    public $code;

    /** @var string */
    public $name;

    /**
     * Country constructor.
     *
     * @param string $code
     * @param string $name
     */
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
        ];
    }

}
