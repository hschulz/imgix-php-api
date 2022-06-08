<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\ColorPalette;
use \PHPUnit\Framework\TestCase;

final class ColorPaletteTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new ColorPalette();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCreateWithAllFeatures(): void
    {
        $subject = new ColorPalette();

        $subject->setColorCount(5);
        $subject->setCssPrefix('test');
        $subject->setPaletteOutputCss();

        $expected = ColorPalette::PARAM_PALETTE_COLOR_COUNT . '=5&'
                  . ColorPalette::PARAM_CSS_PREFIX . '=test&'
                  . ColorPalette::PARAM_COLOR_PALETTE_EXTRATCTION . '=' . ColorPalette::VALUE_PALETTE_CSS;

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new ColorPalette();

        $params = [ColorPalette::PARAM_PALETTE_COLOR_COUNT => 10];

        $subject->setParams($params);

        $this->assertArrayHasKey(ColorPalette::PARAM_PALETTE_COLOR_COUNT, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetCssPrefix(): void
    {
        $subject = new ColorPalette();

        $subject->setCssPrefix('unit');

        $this->assertEquals('unit', $subject->getCssPrefix());
        $this->assertEquals(ColorPalette::PARAM_CSS_PREFIX . '=unit', (string) $subject);
    }

    public function testCanUnsetCssPrefix(): void
    {
        $subject = new ColorPalette();

        $subject->setCssPrefix('unit');
        $subject->unsetCssPrefix();

        $this->assertFalse($subject->isPaletteOutputCss());
        $this->assertFalse($subject->isPaletteOutputJson());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetPaletteOutputCss(): void
    {
        $subject = new ColorPalette();

        $subject->setPaletteOutputCss();

        $this->assertTrue($subject->isPaletteOutputCss());
        $this->assertEquals(ColorPalette::VALUE_PALETTE_CSS, $subject->getPaletteOutput());
        $this->assertEquals(ColorPalette::PARAM_COLOR_PALETTE_EXTRATCTION . '=' . ColorPalette::VALUE_PALETTE_CSS, (string) $subject);
    }

    public function testCanSetPaletteOutputJson(): void
    {
        $subject = new ColorPalette();

        $subject->setPaletteOutputJson();

        $this->assertTrue($subject->isPaletteOutputJson());
        $this->assertEquals(ColorPalette::VALUE_PALETTE_JSON, $subject->getPaletteOutput());
        $this->assertEquals(ColorPalette::PARAM_COLOR_PALETTE_EXTRATCTION . '=' . ColorPalette::VALUE_PALETTE_JSON, (string) $subject);
    }

    public function testCanUnsetPaletteOutput(): void
    {
        $subject = new ColorPalette();

        $subject->setPaletteOutputJson();
        $subject->unsetPaletteOutput();

        $this->assertFalse($subject->isPaletteOutputCss());
        $this->assertFalse($subject->isPaletteOutputJson());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetColorCount(): void
    {
        $subject = new ColorPalette();

        $subject->setColorCount(12);

        $this->assertEquals(12, $subject->getColorCount());
        $this->assertEquals(ColorPalette::PARAM_PALETTE_COLOR_COUNT . '=12', (string) $subject);
    }

    public function testCanUnsetColorCount(): void
    {
        $subject = new ColorPalette();

        $subject->setColorCount(16);
        $subject->unsetColorCount();

        $this->assertEmpty((string) $subject);
    }
}
