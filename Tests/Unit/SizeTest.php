<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Size;
use \PHPUnit\Framework\TestCase;

/**
 * Description of SizeTest
 */
final class SizeTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Size();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new Size();

        $subject->setWidth(356);
        $subject->setMinWidth(100);
        $subject->setMaxWidth(1000);
        $subject->setHeight(494);
        $subject->setMinHeight(111);
        $subject->setMaxHeight(1212);

        $expected = Size::PARAM_WIDTH . '=356&'
                  . Size::PARAM_WIDTH_MIN . '=100&'
                  . Size::PARAM_WIDTH_MAX . '=1000&'
                  . Size::PARAM_HEIGHT . '=494&'
                  . Size::PARAM_HEIGHT_MIN . '=111&'
                  . Size::PARAM_HEIGHT_MAX . '=1212';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new Size();

        $params = [Size::PARAM_HEIGHT_MIN => 333];

        $subject->setParams($params);

        $this->assertArrayHasKey(Size::PARAM_HEIGHT_MIN, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetWidth(): void
    {
        $subject = new Size();

        $subject->setWidth(200);

        $this->assertEquals(200, $subject->getWidth());
        $this->assertEquals(Size::PARAM_WIDTH . '=200', (string) $subject);
    }

    public function testCanUnsetWidth(): void
    {
        $subject = new Size();

        $subject->setWidth(123);
        $subject->unsetWidth();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetMinWidth(): void
    {
        $subject = new Size();

        $subject->setMinWidth(200);

        $this->assertEquals(200, $subject->getMinWidth());
        $this->assertEquals(Size::PARAM_WIDTH_MIN . '=200', (string) $subject);
    }

    public function testCanUnsetMinWidth(): void
    {
        $subject = new Size();

        $subject->setMinWidth(123);
        $subject->unsetMinWidth();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetMaxWidth(): void
    {
        $subject = new Size();

        $subject->setMaxWidth(200);

        $this->assertEquals(200, $subject->getMaxWidth());
        $this->assertEquals(Size::PARAM_WIDTH_MAX . '=200', (string) $subject);
    }

    public function testCanUnsetMaxWidth(): void
    {
        $subject = new Size();

        $subject->setMaxWidth(123);
        $subject->unsetMaxWidth();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetWidthRatio(): void
    {
        $subject = new Size();

        $subject->setWidthRatio(0.77);

        $this->assertEquals(0.77, $subject->getWidthRatio());
        $this->assertEquals(Size::PARAM_WIDTH . '=0.77', (string) $subject);
    }

    public function testCanUnsetWidthRatio(): void
    {
        $subject = new Size();

        $subject->setWidthRatio(0.22);
        $subject->unsetWidthRatio();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetHeight(): void
    {
        $subject = new Size();

        $subject->setHeight(200);

        $this->assertEquals(200, $subject->getHeight());
        $this->assertEquals(Size::PARAM_HEIGHT . '=200', (string) $subject);
    }

    public function testCanUnsetHeight(): void
    {
        $subject = new Size();

        $subject->setHeight(123);
        $subject->unsetHeight();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetMinHeight(): void
    {
        $subject = new Size();

        $subject->setMinHeight(200);

        $this->assertEquals(200, $subject->getMinHeight());
        $this->assertEquals(Size::PARAM_HEIGHT_MIN . '=200', (string) $subject);
    }

    public function testCanUnsetMinHeight(): void
    {
        $subject = new Size();

        $subject->setMinHeight(123);
        $subject->unsetMinHeight();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetMaxHeight(): void
    {
        $subject = new Size();

        $subject->setMaxHeight(200);

        $this->assertEquals(200, $subject->getMaxHeight());
        $this->assertEquals(Size::PARAM_HEIGHT_MAX . '=200', (string) $subject);
    }

    public function testCanUnsetMaxHeight(): void
    {
        $subject = new Size();

        $subject->setMaxHeight(123);
        $subject->unsetMaxHeight();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetHeightRatio(): void
    {
        $subject = new Size();

        $subject->setHeightRatio(0.77);

        $this->assertEquals(0.77, $subject->getHeightRatio());
        $this->assertEquals(Size::PARAM_HEIGHT . '=0.77', (string) $subject);
    }

    public function testCanUnsetHeightRatio(): void
    {
        $subject = new Size();

        $subject->setHeightRatio(0.22);
        $subject->unsetHeightRatio();

        $this->assertEmpty((string) $subject);
    }
}
