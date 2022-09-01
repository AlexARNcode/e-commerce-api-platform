<?php

namespace App\Service;

class StringModifier 
{
    public function removeAccents(string $stringWithAccents): string 
    {
        return \Transliterator::create('NFD; [:Nonspacing Mark:] Remove; NFC')->transliterate($stringWithAccents);
    }

    public function replaceWhiteSpacesByDash(string $stringWithWhiteSpaces): string 
    {
        return str_replace(' ', '-', $stringWithWhiteSpaces);
    }
}