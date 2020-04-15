<?php

namespace Cromwell\ISO3166\Subsets;

use Cromwell\ISO3166\Countries;

class EU extends Countries
{

    /**
     * @param array $items
     */
    protected function initSubset($items = [])
    {
        $euCodes = [
            self::AUSTRIA,
            self::BELGIUM,
            self::BULGARIA,
            self::CYPRUS,
            self::CZECH_REPUBLIC,
            self::GERMANY,
            self::DENMARK,
            self::ESTONIA,
            self::SPAIN,
            self::FINLAND,
            self::FRANCE,
            self::GREECE,
            self::HUNGARY,
            self::CROATIA,
            self::IRELAND,
            self::ITALY,
            self::LITHUANIA,
            self::LUXEMBOURG,
            self::LATVIA,
            self::MALTA,
            self::NETHERLANDS,
            self::POLAND,
            self::PORTUGAL,
            self::ROMANIA,
            self::SLOVENIA,
            self::SLOVAKIA,
            self::SWEDEN,
        ];

        parent::initSubset($euCodes);
    }

}
