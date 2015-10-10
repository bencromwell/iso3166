<?php

namespace Cromwell\ISO3166;

class Countries implements CodesByName, \ArrayAccess, \Countable, \JsonSerializable
{

    /** @var Country[] */
    protected $selectedCountries = [];

    /** @var Country[] */
    protected $worldCountries = [];

    private $worldCountriesRaw = [
        ['code' => self::ANDORRA, 'name' => 'Andorra'],
        ['code' => self::UNITED_ARAB_EMIRATES, 'name' => 'United Arab Emirates'],
        ['code' => self::AFGHANISTAN, 'name' => 'Afghanistan'],
        ['code' => self::ANTIGUA_BARBUDA, 'name' => 'Antigua And Barbuda'],
        ['code' => self::ANGUILLA, 'name' => 'Anguilla'],
        ['code' => self::ALBANIA, 'name' => 'Albania'],
        ['code' => self::ARMENIA, 'name' => 'Armenia'],
        ['code' => self::NETHERLANDS_ANTILLES, 'name' => 'Netherlands Antilles'],
        ['code' => self::ANGOLA, 'name' => 'Angola'],
        ['code' => self::ANTARCTICA, 'name' => 'Antarctica'],
        ['code' => self::ARGENTINA, 'name' => 'Argentina'],
        ['code' => self::AMERICAN_SAMOA, 'name' => 'American Samoa'],
        ['code' => self::AUSTRIA, 'name' => 'Austria'],
        ['code' => self::AUSTRALIA, 'name' => 'Australia'],
        ['code' => self::ARUBA, 'name' => 'Aruba'],
        ['code' => self::ALAND_ISLANDS, 'name' => 'Aland Islands'],
        ['code' => self::AZERBAIJAN, 'name' => 'Azerbaijan'],
        ['code' => self::BOSNIA_HERZEGOVINA, 'name' => 'Bosnia And Herzegovina'],
        ['code' => self::BARBADOS, 'name' => 'Barbados'],
        ['code' => self::BANGLADESH, 'name' => 'Bangladesh'],
        ['code' => self::BELGIUM, 'name' => 'Belgium'],
        ['code' => self::BURKINA_FASO, 'name' => 'Burkina Faso'],
        ['code' => self::BULGARIA, 'name' => 'Bulgaria'],
        ['code' => self::BAHRAIN, 'name' => 'Bahrain'],
        ['code' => self::BURUNDI, 'name' => 'Burundi'],
        ['code' => self::BENIN, 'name' => 'Benin'],
        ['code' => self::SAINT_BARTHELEMY, 'name' => 'Saint Barthelemy'],
        ['code' => self::BERMUDA, 'name' => 'Bermuda'],
        ['code' => self::BRUNEI_DARUSSALAM, 'name' => 'Brunei Darussalam'],
        ['code' => self::BOLIVIA, 'name' => 'Bolivia'],
        ['code' => self::BRAZIL, 'name' => 'Brazil'],
        ['code' => self::BAHAMAS, 'name' => 'Bahamas'],
        ['code' => self::BHUTAN, 'name' => 'Bhutan'],
        ['code' => self::BOUVET_ISLAND, 'name' => 'Bouvet Island'],
        ['code' => self::BOTSWANA, 'name' => 'Botswana'],
        ['code' => self::BELARUS, 'name' => 'Belarus'],
        ['code' => self::BELIZE, 'name' => 'Belize'],
        ['code' => self::CANADA, 'name' => 'Canada'],
        ['code' => self::COCOS_KEELING_ISLANDS, 'name' => 'Cocos (Keeling) Islands'],
        ['code' => self::CONGO_DEMOCRATIC_REPUBLIC, 'name' => 'Congo, Democratic Republic'],
        ['code' => self::CENTRAL_AFRICAN_REPUBLIC, 'name' => 'Central African Republic'],
        ['code' => self::CONGO, 'name' => 'Congo'],
        ['code' => self::SWITZERLAND, 'name' => 'Switzerland'],
        ['code' => self::COTE_DIVOIRE, 'name' => 'Cote D\'Ivoire'],
        ['code' => self::COOK_ISLANDS, 'name' => 'Cook Islands'],
        ['code' => self::CHILE, 'name' => 'Chile'],
        ['code' => self::CAMEROON, 'name' => 'Cameroon'],
        ['code' => self::CHINA, 'name' => 'China'],
        ['code' => self::COLOMBIA, 'name' => 'Colombia'],
        ['code' => self::COSTA_RICA, 'name' => 'Costa Rica'],
        ['code' => self::CUBA, 'name' => 'Cuba'],
        ['code' => self::CAPE_VERDE, 'name' => 'Cape Verde'],
        ['code' => self::CHRISTMAS_ISLAND, 'name' => 'Christmas Island'],
        ['code' => self::CYPRUS, 'name' => 'Cyprus'],
        ['code' => self::CZECH_REPUBLIC, 'name' => 'Czech Republic'],
        ['code' => self::GERMANY, 'name' => 'Germany'],
        ['code' => self::DJIBOUTI, 'name' => 'Djibouti'],
        ['code' => self::DENMARK, 'name' => 'Denmark'],
        ['code' => self::DOMINICA, 'name' => 'Dominica'],
        ['code' => self::DOMINICAN_REPUBLIC, 'name' => 'Dominican Republic'],
        ['code' => self::ALGERIA, 'name' => 'Algeria'],
        ['code' => self::ECUADOR, 'name' => 'Ecuador'],
        ['code' => self::ESTONIA, 'name' => 'Estonia'],
        ['code' => self::EGYPT, 'name' => 'Egypt'],
        ['code' => self::WESTERN_SAHARA, 'name' => 'Western Sahara'],
        ['code' => self::ERITREA, 'name' => 'Eritrea'],
        ['code' => self::SPAIN, 'name' => 'Spain'],
        ['code' => self::ETHIOPIA, 'name' => 'Ethiopia'],
        ['code' => self::FINLAND, 'name' => 'Finland'],
        ['code' => self::FIJI, 'name' => 'Fiji'],
        ['code' => self::FALKLAND_ISLANDS, 'name' => 'Falkland Islands (Malvinas)'],
        ['code' => self::MICRONESIA, 'name' => 'Micronesia, Federated States Of'],
        ['code' => self::FAROE_ISLANDS, 'name' => 'Faroe Islands'],
        ['code' => self::FRANCE, 'name' => 'France'],
        ['code' => self::GABON, 'name' => 'Gabon'],
        ['code' => self::UNITED_KINGDOM, 'name' => 'United Kingdom'],
        ['code' => self::GRENADA, 'name' => 'Grenada'],
        ['code' => self::GEORGIA, 'name' => 'Georgia'],
        ['code' => self::FRENCH_GUIANA, 'name' => 'French Guiana'],
        ['code' => self::GUERNSEY, 'name' => 'Guernsey'],
        ['code' => self::GHANA, 'name' => 'Ghana'],
        ['code' => self::GIBRALTAR, 'name' => 'Gibraltar'],
        ['code' => self::GREENLAND, 'name' => 'Greenland'],
        ['code' => self::GAMBIA, 'name' => 'Gambia'],
        ['code' => self::GUINEA, 'name' => 'Guinea'],
        ['code' => self::GUADELOUPE, 'name' => 'Guadeloupe'],
        ['code' => self::EQUATORIAL_GUINEA, 'name' => 'Equatorial Guinea'],
        ['code' => self::GREECE, 'name' => 'Greece'],
        ['code' => self::SOUTH_GEORGIA_SANDWICH, 'name' => 'South Georgia And Sandwich Isl.'],
        ['code' => self::GUATEMALA, 'name' => 'Guatemala'],
        ['code' => self::GUAM, 'name' => 'Guam'],
        ['code' => self::GUINEA_BISSAU, 'name' => 'Guinea-Bissau'],
        ['code' => self::GUYANA, 'name' => 'Guyana'],
        ['code' => self::HONG_KONG, 'name' => 'Hong Kong'],
        ['code' => self::HEARD_MCDONALD_ISLANDS, 'name' => 'Heard Island & Mcdonald Islands'],
        ['code' => self::HONDURAS, 'name' => 'Honduras'],
        ['code' => self::CROATIA, 'name' => 'Croatia'],
        ['code' => self::HAITI, 'name' => 'Haiti'],
        ['code' => self::HUNGARY, 'name' => 'Hungary'],
        ['code' => self::INDONESIA, 'name' => 'Indonesia'],
        ['code' => self::IRELAND, 'name' => 'Ireland'],
        ['code' => self::ISRAEL, 'name' => 'Israel'],
        ['code' => self::ISLE_OF_MAN, 'name' => 'Isle Of Man'],
        ['code' => self::INDIA, 'name' => 'India'],
        ['code' => self::BRITISH_INDIAN_OCEAN_TERRITORY, 'name' => 'British Indian Ocean Territory'],
        ['code' => self::IRAQ, 'name' => 'Iraq'],
        ['code' => self::IRAN, 'name' => 'Iran, Islamic Republic Of'],
        ['code' => self::ICELAND, 'name' => 'Iceland'],
        ['code' => self::ITALY, 'name' => 'Italy'],
        ['code' => self::JERSEY, 'name' => 'Jersey'],
        ['code' => self::JAMAICA, 'name' => 'Jamaica'],
        ['code' => self::JORDAN, 'name' => 'Jordan'],
        ['code' => self::JAPAN, 'name' => 'Japan'],
        ['code' => self::KENYA, 'name' => 'Kenya'],
        ['code' => self::KYRGYZSTAN, 'name' => 'Kyrgyzstan'],
        ['code' => self::CAMBODIA, 'name' => 'Cambodia'],
        ['code' => self::KIRIBATI, 'name' => 'Kiribati'],
        ['code' => self::COMOROS, 'name' => 'Comoros'],
        ['code' => self::SAINT_KITTS_NEVIS, 'name' => 'Saint Kitts And Nevis'],
        ['code' => self::KOREA, 'name' => 'Korea'],
        ['code' => self::KUWAIT, 'name' => 'Kuwait'],
        ['code' => self::CAYMAN_ISLANDS, 'name' => 'Cayman Islands'],
        ['code' => self::KAZAKHSTAN, 'name' => 'Kazakhstan'],
        ['code' => self::LAO, 'name' => 'Lao People\'s Democratic Republic'],
        ['code' => self::LEBANON, 'name' => 'Lebanon'],
        ['code' => self::SAINT_LUCIA, 'name' => 'Saint Lucia'],
        ['code' => self::LIECHTENSTEIN, 'name' => 'Liechtenstein'],
        ['code' => self::SRI_LANKA, 'name' => 'Sri Lanka'],
        ['code' => self::LIBERIA, 'name' => 'Liberia'],
        ['code' => self::LESOTHO, 'name' => 'Lesotho'],
        ['code' => self::LITHUANIA, 'name' => 'Lithuania'],
        ['code' => self::LUXEMBOURG, 'name' => 'Luxembourg'],
        ['code' => self::LATVIA, 'name' => 'Latvia'],
        ['code' => self::LIBYAN_ARAB_JAMAHIRIYA, 'name' => 'Libyan Arab Jamahiriya'],
        ['code' => self::MOROCCO, 'name' => 'Morocco'],
        ['code' => self::MONACO, 'name' => 'Monaco'],
        ['code' => self::MOLDOVA, 'name' => 'Moldova'],
        ['code' => self::MONTENEGRO, 'name' => 'Montenegro'],
        ['code' => self::SAINT_MARTIN, 'name' => 'Saint Martin'],
        ['code' => self::MADAGASCAR, 'name' => 'Madagascar'],
        ['code' => self::MARSHALL_ISLANDS, 'name' => 'Marshall Islands'],
        ['code' => self::MACEDONIA, 'name' => 'Macedonia'],
        ['code' => self::MALI, 'name' => 'Mali'],
        ['code' => self::MYANMAR, 'name' => 'Myanmar'],
        ['code' => self::MONGOLIA, 'name' => 'Mongolia'],
        ['code' => self::MACAO, 'name' => 'Macao'],
        ['code' => self::NORTHERN_MARIANA_ISLANDS, 'name' => 'Northern Mariana Islands'],
        ['code' => self::MARTINIQUE, 'name' => 'Martinique'],
        ['code' => self::MAURITANIA, 'name' => 'Mauritania'],
        ['code' => self::MONTSERRAT, 'name' => 'Montserrat'],
        ['code' => self::MALTA, 'name' => 'Malta'],
        ['code' => self::MAURITIUS, 'name' => 'Mauritius'],
        ['code' => self::MALDIVES, 'name' => 'Maldives'],
        ['code' => self::MALAWI, 'name' => 'Malawi'],
        ['code' => self::MEXICO, 'name' => 'Mexico'],
        ['code' => self::MALAYSIA, 'name' => 'Malaysia'],
        ['code' => self::MOZAMBIQUE, 'name' => 'Mozambique'],
        ['code' => self::NAMIBIA, 'name' => 'Namibia'],
        ['code' => self::NEW_CALEDONIA, 'name' => 'New Caledonia'],
        ['code' => self::NIGER, 'name' => 'Niger'],
        ['code' => self::NORFOLK_ISLAND, 'name' => 'Norfolk Island'],
        ['code' => self::NIGERIA, 'name' => 'Nigeria'],
        ['code' => self::NICARAGUA, 'name' => 'Nicaragua'],
        ['code' => self::NETHERLANDS, 'name' => 'Netherlands'],
        ['code' => self::NORWAY, 'name' => 'Norway'],
        ['code' => self::NEPAL, 'name' => 'Nepal'],
        ['code' => self::NAURU, 'name' => 'Nauru'],
        ['code' => self::NIUE, 'name' => 'Niue'],
        ['code' => self::NEW_ZEALAND, 'name' => 'New Zealand'],
        ['code' => self::OMAN, 'name' => 'Oman'],
        ['code' => self::PANAMA, 'name' => 'Panama'],
        ['code' => self::PERU, 'name' => 'Peru'],
        ['code' => self::FRENCH_POLYNESIA, 'name' => 'French Polynesia'],
        ['code' => self::PAPUA_NEW_GUINEA, 'name' => 'Papua New Guinea'],
        ['code' => self::PHILIPPINES, 'name' => 'Philippines'],
        ['code' => self::PAKISTAN, 'name' => 'Pakistan'],
        ['code' => self::POLAND, 'name' => 'Poland'],
        ['code' => self::SAINT_PIERRE_MIQUELON, 'name' => 'Saint Pierre And Miquelon'],
        ['code' => self::PITCAIRN, 'name' => 'Pitcairn'],
        ['code' => self::PUERTO_RICO, 'name' => 'Puerto Rico'],
        ['code' => self::PALESTINIAN_TERRITORY_OCCUPIED, 'name' => 'Palestinian Territory, Occupied'],
        ['code' => self::PORTUGAL, 'name' => 'Portugal'],
        ['code' => self::PALAU, 'name' => 'Palau'],
        ['code' => self::PARAGUAY, 'name' => 'Paraguay'],
        ['code' => self::QATAR, 'name' => 'Qatar'],
        ['code' => self::REUNION, 'name' => 'Reunion'],
        ['code' => self::ROMANIA, 'name' => 'Romania'],
        ['code' => self::SERBIA, 'name' => 'Serbia'],
        ['code' => self::RUSSIAN_FEDERATION, 'name' => 'Russian Federation'],
        ['code' => self::RWANDA, 'name' => 'Rwanda'],
        ['code' => self::SAUDI_ARABIA, 'name' => 'Saudi Arabia'],
        ['code' => self::SOLOMON_ISLANDS, 'name' => 'Solomon Islands'],
        ['code' => self::SEYCHELLES, 'name' => 'Seychelles'],
        ['code' => self::SUDAN, 'name' => 'Sudan'],
        ['code' => self::SWEDEN, 'name' => 'Sweden'],
        ['code' => self::SINGAPORE, 'name' => 'Singapore'],
        ['code' => self::SAINT_HELENA, 'name' => 'Saint Helena'],
        ['code' => self::SLOVENIA, 'name' => 'Slovenia'],
        ['code' => self::SVALBARD_JAN_MAYEN, 'name' => 'Svalbard And Jan Mayen'],
        ['code' => self::SLOVAKIA, 'name' => 'Slovakia'],
        ['code' => self::SIERRA_LEONE, 'name' => 'Sierra Leone'],
        ['code' => self::SAN_MARINO, 'name' => 'San Marino'],
        ['code' => self::SENEGAL, 'name' => 'Senegal'],
        ['code' => self::SOMALIA, 'name' => 'Somalia'],
        ['code' => self::SURINAME, 'name' => 'Suriname'],
        ['code' => self::SAO_TOME_PRINCIPE, 'name' => 'Sao Tome And Principe'],
        ['code' => self::EL_SALVADOR, 'name' => 'El Salvador'],
        ['code' => self::SYRIAN_ARAB_REPUBLIC, 'name' => 'Syrian Arab Republic'],
        ['code' => self::SWAZILAND, 'name' => 'Swaziland'],
        ['code' => self::TURKS_CAICOS_ISLANDS, 'name' => 'Turks And Caicos Islands'],
        ['code' => self::CHAD, 'name' => 'Chad'],
        ['code' => self::FRENCH_SOUTHERN_TERRITORIES, 'name' => 'French Southern Territories'],
        ['code' => self::TOGO, 'name' => 'Togo'],
        ['code' => self::THAILAND, 'name' => 'Thailand'],
        ['code' => self::TAJIKISTAN, 'name' => 'Tajikistan'],
        ['code' => self::TOKELAU, 'name' => 'Tokelau'],
        ['code' => self::TIMOR_LESTE, 'name' => 'Timor-Leste'],
        ['code' => self::TURKMENISTAN, 'name' => 'Turkmenistan'],
        ['code' => self::TUNISIA, 'name' => 'Tunisia'],
        ['code' => self::TONGA, 'name' => 'Tonga'],
        ['code' => self::TURKEY, 'name' => 'Turkey'],
        ['code' => self::TRINIDAD_TOBAGO, 'name' => 'Trinidad And Tobago'],
        ['code' => self::TUVALU, 'name' => 'Tuvalu'],
        ['code' => self::TAIWAN, 'name' => 'Taiwan'],
        ['code' => self::TANZANIA, 'name' => 'Tanzania'],
        ['code' => self::UKRAINE, 'name' => 'Ukraine'],
        ['code' => self::UGANDA, 'name' => 'Uganda'],
        ['code' => self::UNITED_STATES_OUTLYING_ISLANDS, 'name' => 'United States Outlying Islands'],
        ['code' => self::UNITED_STATES, 'name' => 'United States'],
        ['code' => self::URUGUAY, 'name' => 'Uruguay'],
        ['code' => self::UZBEKISTAN, 'name' => 'Uzbekistan'],
        ['code' => self::HOLY_SEE_VATICAN_CITY_STATE, 'name' => 'Holy See (Vatican City State)'],
        ['code' => self::SAINT_VINCENT_GRENADINES, 'name' => 'Saint Vincent And Grenadines'],
        ['code' => self::VENEZUELA, 'name' => 'Venezuela'],
        ['code' => self::VIRGIN_ISLANDS_BRITISH, 'name' => 'Virgin Islands, British'],
        ['code' => self::VIRGIN_ISLANDS_US, 'name' => 'Virgin Islands, U.S.'],
        ['code' => self::VIET_NAM, 'name' => 'Viet Nam'],
        ['code' => self::VANUATU, 'name' => 'Vanuatu'],
        ['code' => self::WALLIS_FUTUNA, 'name' => 'Wallis And Futuna'],
        ['code' => self::SAMOA, 'name' => 'Samoa'],
        ['code' => self::YEMEN, 'name' => 'Yemen'],
        ['code' => self::MAYOTTE, 'name' => 'Mayotte'],
        ['code' => self::SOUTH_AFRICA, 'name' => 'South Africa'],
        ['code' => self::ZAMBIA, 'name' => 'Zambia'],
        ['code' => self::ZIMBABWE, 'name' => 'Zimbabwe'],
    ];

    /**
     * @param array $items - array of country codes
     */
    public function __construct($items = [])
    {
        array_walk($this->worldCountriesRaw, function ($item) {
            $this->worldCountries[$item['code']] = new Country($item['code'], $item['name']);
        });

        if (empty($items)) {
            $items = array_map(function ($item) {
                return $item['code'];
            }, $this->worldCountriesRaw);
        }

        $this->initSubset($items);
    }

    /**
     * @param mixed $offset country code
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($offset)
    {
        return isset($this->selectedCountries[$offset]);
    }

    /**
     * @param string $offset country code
     * @return Country|null
     */
    public function offsetGet($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->selectedCountries[$offset];
        }

        return null;
    }

    /**
     * @param string $offset  country code
     * @param Country $value  country model
     */
    public function offsetSet($offset, $value)
    {
        $this->selectedCountries[$offset] = $value;
    }

    /**
     * @param string $offset country code
     */
    public function offsetUnset($offset)
    {
        unset($this->selectedCountries[$offset]);
    }

    /**
     * @return int number of countries in the selection
     */
    public function count()
    {
        return count($this->selectedCountries);
    }

    /**
     * @param $countryCodes
     */
    protected function initSubset($countryCodes)
    {
        array_walk($countryCodes, function($code) {
            $this->selectedCountries[$code] = $this->worldCountries[$code];
        });
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
        return $this->selectedCountries;
    }

}
