<?php

namespace hschulz\imgix\Tests\Unit\Format;

use \hschulz\imgix\Format\ColorSpace;
use \PHPUnit\Framework\TestCase;

/**
 * Description of ColorSpace
 */
final class ColorSpaceTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new ColorSpace();

        $this->assertEmpty($subject->get());
        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanUnset(): void
    {
        $subject = new ColorSpace();

        $subject->setAdobeRgb1998();
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetAdobeRgb1998(): void
    {
        $subject = new ColorSpace();

        $subject->setAdobeRgb1998();

        $this->assertEquals(ColorSpace::VALUE_ADOBERGB1998, $subject->get());
        $this->assertEquals(ColorSpace::PARAM_NAME . '=' . ColorSpace::VALUE_ADOBERGB1998, (string) $subject);
    }

    public function testCanSetSrgb(): void
    {
        $subject = new ColorSpace();

        $subject->setSrgb();

        $this->assertEquals(ColorSpace::VALUE_SRGB, $subject->get());
        $this->assertEquals(ColorSpace::PARAM_NAME . '=' . ColorSpace::VALUE_SRGB, (string) $subject);
    }

    public function testCanSetStrip(): void
    {
        $subject = new ColorSpace();

        $subject->setStrip();

        $this->assertEquals(ColorSpace::VALUE_STRIP, $subject->get());
        $this->assertEquals(ColorSpace::PARAM_NAME . '=' . ColorSpace::VALUE_STRIP, (string) $subject);
    }

    public function testCanSetTinySrgb(): void
    {
        $subject = new ColorSpace();

        $subject->setTinySrgb();

        $this->assertEquals(ColorSpace::VALUE_TINYSRGB, $subject->get());
        $this->assertEquals(ColorSpace::PARAM_NAME . '=' . ColorSpace::VALUE_TINYSRGB, (string) $subject);
    }
}
