<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\ResizeFitMode;
use PHPUnit\Framework\TestCase;

/**
 * Description of ResizeFitModeTest
 */
final class ResizeFitModeTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new ResizeFitMode();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanUnsetParameter(): void
    {
        $subject = new ResizeFitMode();

        $subject->setFillmax();
        $subject->unset();

        $this->assertFalse($subject->isClamp());
        $this->assertFalse($subject->isClip());
        $this->assertFalse($subject->isCrop());
        $this->assertFalse($subject->isFacearea());
        $this->assertFalse($subject->isFill());
        $this->assertFalse($subject->isFillmax());
        $this->assertFalse($subject->isMax());
        $this->assertFalse($subject->isMin());
        $this->assertFalse($subject->isScale());
        $this->assertEmpty((string) $subject);
    }

    public function testCanSetCustomValue(): void
    {
        $subject = new ResizeFitMode();

        $subject->setValue('my-value');

        $this->assertFalse($subject->isClamp());
        $this->assertFalse($subject->isClip());
        $this->assertFalse($subject->isCrop());
        $this->assertFalse($subject->isFacearea());
        $this->assertFalse($subject->isFill());
        $this->assertFalse($subject->isFillmax());
        $this->assertFalse($subject->isMax());
        $this->assertFalse($subject->isMin());
        $this->assertFalse($subject->isScale());
        $this->assertEquals('my-value', $subject->getValue());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=my-value', (string) $subject);
    }

    public function testCanSetClamp(): void
    {
        $subject = new ResizeFitMode();

        $subject->setClamp();

        $this->assertTrue($subject->isClamp());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_CLAMP, (string) $subject);
    }

    public function testCanSetClip(): void
    {
        $subject = new ResizeFitMode();

        $subject->setClip();

        $this->assertTrue($subject->isClip());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_CLIP, (string) $subject);
    }

    public function testCanSetCrop(): void
    {
        $subject = new ResizeFitMode();

        $subject->setCrop();

        $this->assertTrue($subject->isCrop());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_CROP, (string) $subject);
    }

    public function testCanSetFacearea(): void
    {
        $subject = new ResizeFitMode();

        $subject->setFacearea();

        $this->assertTrue($subject->isFacearea());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_FACEAREA, (string) $subject);
    }

    public function testCanSetFill(): void
    {
        $subject = new ResizeFitMode();

        $subject->setFill();

        $this->assertTrue($subject->isFill());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_FILL, (string) $subject);
    }

    public function testCanSetFillmax(): void
    {
        $subject = new ResizeFitMode();

        $subject->setFillmax();

        $this->assertTrue($subject->isFillmax());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_FILLMAX, (string) $subject);
    }

    public function testCanSetMax(): void
    {
        $subject = new ResizeFitMode();

        $subject->setMax();

        $this->assertTrue($subject->isMax());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_MAX, (string) $subject);
    }

    public function testCanSetMin(): void
    {
        $subject = new ResizeFitMode();

        $subject->setMin();

        $this->assertTrue($subject->isMin());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_MIN, (string) $subject);
    }

    public function testCanSetScale(): void
    {
        $subject = new ResizeFitMode();

        $subject->setScale();

        $this->assertTrue($subject->isScale());
        $this->assertEquals(ResizeFitMode::PARAM_NAME . '=' . ResizeFitMode::VALUE_SCALE, (string) $subject);
    }
}
