<?php

namespace hschulz\imgix\Tests\Unit;

use \hschulz\imgix\Adjustment;
use \hschulz\imgix\Adjustment\Parameters;
use \PHPUnit\Framework\TestCase;

final class AdjustmentTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Adjustment();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetMultipleParameters(): void
    {
        $subject = new Adjustment();

        $subject->setHighlight(-50);
        $subject->setExposure(77);
        $subject->setGamma(0);
        $subject->setUnsharpMask(8.99);

        $expected = Parameters::HIGHLIGHT . '=-50&'
                  . Parameters::EXPOSURE . '=77&'
                  . Parameters::GAMMA . '=0&'
                  . Parameters::UNSHARP_MASK . '=8.99';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new Adjustment();

        $params = [Parameters::HIGHLIGHT => 66];

        $subject->setParams($params);

        $this->assertArrayHasKey(Parameters::HIGHLIGHT, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetBrightness(): void
    {
        $subject = new Adjustment();

        $subject->setBrightness(50);

        $this->assertEquals(50, $subject->getBrightness());
        $this->assertEquals(Parameters::BRIGHTNESS . '=50', (string) $subject);
    }

    public function testCanUnsetBrightness(): void
    {
        $subject = new Adjustment();

        $subject->setBrightness(100);
        $subject->unsetBrightness();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetContrast(): void
    {
        $subject = new Adjustment();

        $subject->setContrast(50);

        $this->assertEquals(50, $subject->getContrast());
        $this->assertEquals(Parameters::CONTRAST . '=50', (string) $subject);
    }

    public function testCanUnsetContrast(): void
    {
        $subject = new Adjustment();

        $subject->setContrast(100);
        $subject->unsetContrast();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetExposure(): void
    {
        $subject = new Adjustment();

        $subject->setExposure(50);

        $this->assertEquals(50, $subject->getExposure());
        $this->assertEquals(Parameters::EXPOSURE . '=50', (string) $subject);
    }

    public function testCanUnsetExposure(): void
    {
        $subject = new Adjustment();

        $subject->setExposure(100);
        $subject->unsetExposure();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetGamma(): void
    {
        $subject = new Adjustment();

        $subject->setGamma(50);

        $this->assertEquals(50, $subject->getGamma());
        $this->assertEquals(Parameters::GAMMA . '=50', (string) $subject);
    }

    public function testCanUnsetGamma(): void
    {
        $subject = new Adjustment();

        $subject->setGamma(100);
        $subject->unsetGamma();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetHighlight(): void
    {
        $subject = new Adjustment();

        $subject->setHighlight(-50);

        $this->assertEquals(-50, $subject->getHighlight());
        $this->assertEquals(Parameters::HIGHLIGHT . '=-50', (string) $subject);
    }

    public function testCanUnsetHighlight(): void
    {
        $subject = new Adjustment();

        $subject->setHighlight(-99);
        $subject->unsetHighlight();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetHueShift(): void
    {
        $subject = new Adjustment();

        $subject->setHueShift(285);

        $this->assertEquals(285, $subject->getHueShift());
        $this->assertEquals(Parameters::HUE_SHIFT . '=285', (string) $subject);
    }

    public function testCanUnsetHueShift(): void
    {
        $subject = new Adjustment();

        $subject->setHueShift(123);
        $subject->unsetHueShift();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetInvertFalse(): void
    {
        $subject = new Adjustment();

        $subject->setInvert(false);

        $this->assertFalse($subject->getInvert());
        $this->assertEquals(Parameters::INVERT . '=false', (string) $subject);
    }

    public function testCanSetInvertTrue(): void
    {
        $subject = new Adjustment();

        $subject->setInvert(true);

        $this->assertTrue($subject->getInvert());
        $this->assertEquals(Parameters::INVERT . '=true', (string) $subject);
    }

    public function testGetInvertDefaultValue(): void
    {
        $subject = new Adjustment();

        $this->assertFalse($subject->getInvert());
        $this->assertEmpty((string) $subject);
    }

    public function testCanUnsetInvert(): void
    {
        $subject = new Adjustment();

        $subject->setInvert(true);
        $subject->unsetInvert();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetSaturation(): void
    {
        $subject = new Adjustment();

        $subject->setSaturation(50);

        $this->assertEquals(50, $subject->getSaturation());
        $this->assertEquals(Parameters::SATURATION . '=50', (string) $subject);
    }

    public function testCanUnsetSaturation(): void
    {
        $subject = new Adjustment();

        $subject->setSaturation(34);
        $subject->unsetSaturation();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetShadow(): void
    {
        $subject = new Adjustment();

        $subject->setShadow(50);

        $this->assertEquals(50, $subject->getShadow());
        $this->assertEquals(Parameters::SHADOW . '=50', (string) $subject);
    }

    public function testCanUnsetShadow(): void
    {
        $subject = new Adjustment();

        $subject->setShadow(23);
        $subject->unsetShadow();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetSharpen(): void
    {
        $subject = new Adjustment();

        $subject->setSharpen(50);

        $this->assertEquals(50, $subject->getSharpen());
        $this->assertEquals(Parameters::SHARPEN . '=50', (string) $subject);
    }

    public function testCanUnsetSharpen(): void
    {
        $subject = new Adjustment();

        $subject->setSharpen(11);
        $subject->unsetSharpen();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetUnsharpMask(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMask(3.1415);

        $this->assertEquals(3.1415, $subject->getUnsharpMask());
        $this->assertEquals(Parameters::UNSHARP_MASK . '=3.1415', (string) $subject);
    }

    public function testCanUnsetUnsharpMask(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMask(1.11);
        $subject->unsetUnsharpMask();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetUnsharpMaskRadius(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMaskRadius(3.1415);

        $this->assertEquals(3.1415, $subject->getUnsharpMaskRadius());
        $this->assertEquals(Parameters::UNSHARP_MASK_RADIUS . '=3.1415', (string) $subject);
    }

    public function testCanUnsetUnsharpMaskRadius(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMaskRadius(2.22);
        $subject->unsetUnsharpMaskRadius();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetVibrance(): void
    {
        $subject = new Adjustment();

        $subject->setVibrance(50);

        $this->assertEquals(50, $subject->getVibrance());
        $this->assertEquals(Parameters::VIBRANCE . '=50', (string) $subject);
    }

    public function testCanUnsetVibrance(): void
    {
        $subject = new Adjustment();

        $subject->setVibrance(44);
        $subject->unsetVibrance();

        $this->assertEmpty((string) $subject);
    }
}
