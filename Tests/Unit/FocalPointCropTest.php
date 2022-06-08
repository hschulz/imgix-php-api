<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\FocalPointCrop;
use \PHPUnit\Framework\TestCase;

/**
 * Description of FocalPointCropTest
 */
final class FocalPointCropTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new FocalPointCrop();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new FocalPointCrop();

        $subject->setX(0.3);
        $subject->setY(0.8);
        $subject->setZoom(1.25);
        $subject->disableDebug();

        $expected = FocalPointCrop::PARAMETER_FPX . '=0.3&'
                  . FocalPointCrop::PARAMETER_FPY . '=0.8&'
                  . FocalPointCrop::PARAMETER_FPZ . '=1.25&'
                  . FocalPointCrop::PARAMETER_DEBUG . '=false';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new FocalPointCrop();

        $params = [FocalPointCrop::PARAMETER_DEBUG => 'true'];

        $subject->setParams($params);

        $this->assertArrayHasKey(FocalPointCrop::PARAMETER_DEBUG, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetX(): void
    {
        $subject = new FocalPointCrop();

        $subject->setX(0.7);

        $this->assertEquals(0.7, $subject->getX());
        $this->assertEquals(FocalPointCrop::PARAMETER_FPX . '=0.7', (string) $subject);
    }

    public function testCanUnsetX(): void
    {
        $subject = new FocalPointCrop();

        $subject->setX(0.7);
        $subject->unsetX();

        $this->assertEquals(0.5, $subject->getX());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetY(): void
    {
        $subject = new FocalPointCrop();

        $subject->setY(0.7);

        $this->assertEquals(0.7, $subject->getY());
        $this->assertEquals(FocalPointCrop::PARAMETER_FPY . '=0.7', (string) $subject);
    }

    public function testCanUnsetY(): void
    {
        $subject = new FocalPointCrop();

        $subject->setY(0.7);
        $subject->unsetY();

        $this->assertEquals(0.5, $subject->getY());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetZoom(): void
    {
        $subject = new FocalPointCrop();

        $subject->setZoom(2.22);

        $this->assertEquals(2.22, $subject->getZoom());
        $this->assertEquals(FocalPointCrop::PARAMETER_FPZ . '=2.22', (string) $subject);
    }

    public function testCanUnsetZoom(): void
    {
        $subject = new FocalPointCrop();

        $subject->setZoom(1.11);
        $subject->unsetZoom();

        $this->assertEquals(1.0, $subject->getZoom());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetDebug(): void
    {
        $subject = new FocalPointCrop();

        $subject->setDebug(true);

        $this->assertTrue($subject->isDebug());
        $this->assertEquals(FocalPointCrop::PARAMETER_DEBUG . '=true', (string) $subject);
    }

    public function testCanUnsetDebug(): void
    {
        $subject = new FocalPointCrop();

        $subject->enableDebug();
        $subject->unsetDebug();

        $this->assertFalse($subject->isDebug());
        $this->assertEmpty((string) $subject);
    }

    public function testCanDisableDebug(): void
    {
        $subject = new FocalPointCrop();

        $subject->setDebug(true);
        $subject->disableDebug();

        $this->assertFalse($subject->isDebug());
        $this->assertEquals(FocalPointCrop::PARAMETER_DEBUG . '=false', (string) $subject);
    }
}
