<?php

namespace App\Tests\Service;

use App\Service\StringModifier;
use PHPUnit\Framework\TestCase;

class StringModifierTest extends TestCase
{
    /**
     * @dataProvider accentsProvider
     */
    public function testRemoveAccents($stringWithAccents, $expected)
    {
        $stringModifier = new StringModifier();

        $this->assertEquals($expected, $stringModifier->removeAccents($stringWithAccents));
    }
    
    /**
     * @dataProvider whiteSpacesProvider
     */
    public function testReplaceWhiteSpacesByDash($stringWithWhiteSpaces, $expected)
    {
        $stringModifier = new StringModifier();

        $this->assertEquals($expected, $stringModifier->replaceWhiteSpacesByDash($stringWithWhiteSpaces));
    }

    public function accentsProvider(): array
    {
        return [
            ["héhé", "hehe"],
            ["Hélène va au cinéma avec zèle et prend un blâme", "Helene va au cinema avec zele et prend un blame"],
            ["éèâè", "eeae"]
        ];
    }

    public function whiteSpacesProvider(): array
    {
        return [
            ["test whitespace", "test-whitespace"],
            ["test white space for a long sentence", "test-white-space-for-a-long-sentence"]
        ];
    }
}
