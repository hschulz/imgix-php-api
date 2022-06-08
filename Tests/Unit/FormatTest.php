<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Format;
use PHPUnit\Framework\TestCase;

/**
 * Description of FormatTest
 */
final class FormatTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Format();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetMultipleParameters(): void
    {
        $subject = new Format();

        $subject->setColorQuantization(16);
        $subject->setDownload('unit.jpg');
        $subject->setDpi(300);
        $subject->enableLossless();
        $subject->setQuality(100);

        $expected = Format::PARAM_COLOR_QUANTIZATION . '=16&'
                  . Format::PARAM_DOWNLOAD . '=unit.jpg&'
                  . Format::PARAM_DPI . '=300&'
                  . Format::PARAM_LOSSLESS . '=true&'
                  . Format::PARAM_QUALITY . '=100';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetColorQuantization(): void
    {
        $subject = new Format();

        $subject->setColorQuantization(32);

        $this->assertEquals(32, $subject->getColorQuantization());
        $this->assertEquals(Format::PARAM_COLOR_QUANTIZATION . '=32', (string) $subject);
    }

    public function testCanUnsetColorQuantization(): void
    {
        $subject = new Format();

        $subject->setColorQuantization(8);
        $subject->unsetColorQuantization();

        $this->assertEquals(0, $subject->getColorQuantization());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetDownload(): void
    {
        $subject = new Format();

        $subject->setDownload('test.png');

        $this->assertEquals('test.png', $subject->getDownload());
        $this->assertEquals(Format::PARAM_DOWNLOAD . '=test.png', (string) $subject);
    }

    public function testCanUnsetDownload(): void
    {
        $subject = new Format();

        $subject->setDownload('dl.gif');
        $subject->unsetDownload();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetDpi(): void
    {
        $subject = new Format();

        $subject->setDpi(600);

        $this->assertEquals(600, $subject->getDpi());
        $this->assertEquals(Format::PARAM_DPI . '=600', (string) $subject);
    }

    public function testCanUnsetDpi(): void
    {
        $subject = new Format();

        $subject->setDpi(120);
        $subject->unsetDpi();

        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableLossless(): void
    {
        $subject = new Format();

        $subject->enableLossless();

        $this->assertTrue($subject->isLossless());
        $this->assertEquals(Format::PARAM_LOSSLESS . '=true', (string) $subject);
    }

    public function testCanUnsetLossless(): void
    {
        $subject = new Format();

        $subject->enableLossless();
        $subject->disableLossless();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetQuality(): void
    {
        $subject = new Format();

        $subject->setQuality(30);

        $this->assertEquals(30, $subject->getQuality());
        $this->assertEquals(Format::PARAM_QUALITY . '=30', (string) $subject);
    }

    public function testCanUnsetQuality(): void
    {
        $subject = new Format();

        $subject->setQuality(45);
        $subject->unsetQuality();

        $this->assertEmpty((string) $subject);
    }
}
