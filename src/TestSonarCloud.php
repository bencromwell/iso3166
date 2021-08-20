<?php

declare(strict_types=1);

namespace Cromwell\ISO3166;

class TestSonarCloud
{
    private string $hello;
    private string $world;

    public function __construct(string $hello, string $world)
    {
        $this->hello = $hello;
        $this->world = $world;
    }

    public function getHello(): string
    {
        return $this->hello;
    }

    public function getWorld(): string
    {
        return $this->world;
    }
}
