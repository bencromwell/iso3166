# iso3166

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bencromwell/iso3166/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bencromwell/iso3166/?branch=master)
[![Build Status](https://travis-ci.org/bencromwell/iso3166.svg)](https://travis-ci.org/bencromwell/iso3166)
[![Code Climate](https://codeclimate.com/github/bencromwell/iso3166/badges/gpa.svg)](https://codeclimate.com/github/bencromwell/iso3166)
[![Test Coverage](https://codeclimate.com/github/bencromwell/iso3166/badges/coverage.svg)](https://codeclimate.com/github/bencromwell/iso3166/coverage)

Package for interacting with ISO3166 country codes

### Example Usage

```php
$iso = new \Cromwell\ISO3166\Countries();

$iso[$iso::UNITED_KINGDOM]->name;
```

The above isn't _hugely_ useful, it gets more interesting when the code has been stored and retrieved from persistence:

```php
$iso = new \Cromwell\ISO3166\Countries();

$iso[$customer->country]->name;
```

You can also use `jsonSerialize()` either for JSON encoding or as a convenient way to get a multidimensional array for use to construct a `<select>` box of code => name.

### Subsets

You can construct any subset of countries by passing an array of codes. The package contains an EU subset at the moment, you can use the EU class as an example of how to do it or if you just wanted EU countries, there you go.

Passing an array of codes is useful if they've been selected on the fly by an end user. It could be a list of countries that they ship to, for example. In this instance it's likely to change between customers or be initialised from the database. If it's a static list, such as a continent or EU membership, use the EU example and extend the base Countries class to implement your subset. 
