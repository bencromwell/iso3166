<?php

namespace Cromwell\ISO3166;

class OrdUtf8
{
    public static function emojiFlag($country)
    {
        $flagOffset = 0x1F1E6;
        $asciiOffset = 0x41;

        $firstChar = mb_ord($country[0], 'UTF-8') - $asciiOffset + $flagOffset;
        $secondChar = mb_ord($country[1], 'UTF-8') - $asciiOffset + $flagOffset;

        $flag1 = mb_chr($firstChar, 'UTF-8');
        $flag2 = mb_chr($secondChar, 'UTF-8');

        return (string) $flag1 . (string) $flag2;
    }
}
