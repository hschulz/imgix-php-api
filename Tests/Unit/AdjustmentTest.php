<?php

namespace hschulz\imgix\Tests\Unit;

use \hschulz\imgix\Adjustment;
use \hschulz\imgix\AdjustmentParameters;
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

        $expected = AdjustmentParameters::HIGHLIGHT . '=-50&'
                  . AdjustmentParameters::EXPOSURE . '=77&'
                  . AdjustmentParameters::GAMMA . '=0&'
                  . AdjustmentParameters::UNSHARP_MASK . '=8.99';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetBrightness(): void
    {
        $subject = new Adjustment();

        $subject->setBrightness(50);

        $this->assertEquals(50, $subject->getBrightness());
        $this->assertEquals(AdjustmentParameters::BRIGHTNESS . '=50', (string) $subject);
    }

    public function testCanSetContrast(): void
    {
        $subject = new Adjustment();

        $subject->setContrast(50);

        $this->assertEquals(50, $subject->getContrast());
        $this->assertEquals(AdjustmentParameters::CONTRAST . '=50', (string) $subject);
    }

    public function testCanSetExposure(): void
    {
        $subject = new Adjustment();

        $subject->setExposure(50);

        $this->assertEquals(50, $subject->getExposure());
        $this->assertEquals(AdjustmentParameters::EXPOSURE . '=50', (string) $subject);
    }

    public function testCanSetGamma(): void
    {
        $subject = new Adjustment();

        $subject->setGamma(50);

        $this->assertEquals(50, $subject->getGamma());
        $this->assertEquals(AdjustmentParameters::GAMMA . '=50', (string) $subject);
    }

    public function testCanSetHighlight(): void
    {
        $subject = new Adjustment();

        $subject->setHighlight(-50);

        $this->assertEquals(-50, $subject->getHighlight());
        $this->assertEquals(AdjustmentParameters::HIGHLIGHT . '=-50', (string) $subject);
    }

    public function testCanSetHueShift(): void
    {
        $subject = new Adjustment();

        $subject->setHueShift(285);

        $this->assertEquals(285, $subject->getHueShift());
        $this->assertEquals(AdjustmentParameters::HUE_SHIFT . '=285', (string) $subject);
    }

    public function testCanSetInvertFalse(): void
    {
        $subject = new Adjustment();

        $subject->setInvert(false);

        $this->assertFalse($subject->getInvert());
        $this->assertEquals(AdjustmentParameters::INVERT . '=false', (string) $subject);
    }

    public function testCanSetInvertTrue(): void
    {
        $subject = new Adjustment();

        $subject->setInvert(true);

        $this->assertTrue($subject->getInvert());
        $this->assertEquals(AdjustmentParameters::INVERT . '=true', (string) $subject);
    }

    public function testCanSetSaturation(): void
    {
        $subject = new Adjustment();

        $subject->setSaturation(50);

        $this->assertEquals(50, $subject->getSaturation());
        $this->assertEquals(AdjustmentParameters::SATURATION . '=50', (string) $subject);
    }

    public function testCanSetShadow(): void
    {
        $subject = new Adjustment();

        $subject->setShadow(50);

        $this->assertEquals(50, $subject->getShadow());
        $this->assertEquals(AdjustmentParameters::SHADOW . '=50', (string) $subject);
    }

    public function testCanSetSharpen(): void
    {
        $subject = new Adjustment();

        $subject->setSharpen(50);

        $this->assertEquals(50, $subject->getSharpen());
        $this->assertEquals(AdjustmentParameters::SHARPEN . '=50', (string) $subject);
    }

    public function testCanSetUnsharpMask(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMask(3.1415);

        $this->assertEquals(3.1415, $subject->getUnsharpMask());
        $this->assertEquals(AdjustmentParameters::UNSHARP_MASK . '=3.1415', (string) $subject);
    }

    public function testCanSetUnsharpMaskRadius(): void
    {
        $subject = new Adjustment();

        $subject->setUnsharpMaskRadius(3.1415);

        $this->assertEquals(3.1415, $subject->getUnsharpMaskRadius());
        $this->assertEquals(AdjustmentParameters::UNSHARP_MASK_RADIUS . '=3.1415', (string) $subject);
    }

    public function testCanSetVibrance(): void
    {
        $subject = new Adjustment();

        $subject->setVibrance(50);

        $this->assertEquals(50, $subject->getVibrance());
        $this->assertEquals(AdjustmentParameters::VIBRANCE . '=50', (string) $subject);
    }
}
