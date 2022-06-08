<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Rotation;
use PHPUnit\Framework\TestCase;

/**
 * Description of RotationTest
 */
final class RotationTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Rotation();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new Rotation();

        $subject->setFlip(Rotation::VALUE_FLIP_BOTH);
        $subject->setOrientation(3);
        $subject->setRotation(255);

        $expected = Rotation::PARAM_FLIP . '=hv&'
                  . Rotation::PARAM_ORIENTATION . '=3&'
                  . Rotation::PARAM_ROTATION . '=255';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new Rotation();

        $params = [Rotation::PARAM_ROTATION => 33];

        $subject->setParams($params);

        $this->assertArrayHasKey(Rotation::PARAM_ROTATION, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetFlip(): void
    {
        $subject = new Rotation();

        $subject->setFlip(Rotation::VALUE_FLIP_HORIZONTAL);

        $this->assertEquals(Rotation::VALUE_FLIP_HORIZONTAL, $subject->getFlip());
        $this->assertEquals(Rotation::PARAM_FLIP . '=' . Rotation::VALUE_FLIP_HORIZONTAL, (string) $subject);
    }

    public function testCanSetFlipHorizontal(): void
    {
        $subject = new Rotation();

        $subject->flipHorizontal();

        $this->assertEquals(Rotation::VALUE_FLIP_HORIZONTAL, $subject->getFlip());
        $this->assertEquals(Rotation::PARAM_FLIP . '=' . Rotation::VALUE_FLIP_HORIZONTAL, (string) $subject);
    }

    public function testCanSetFlipVertical(): void
    {
        $subject = new Rotation();

        $subject->flipVertical();

        $this->assertEquals(Rotation::VALUE_FLIP_VERTICAL, $subject->getFlip());
        $this->assertEquals(Rotation::PARAM_FLIP . '=' . Rotation::VALUE_FLIP_VERTICAL, (string) $subject);
    }

    public function testCanSetFlipBoth(): void
    {
        $subject = new Rotation();

        $subject->flipBoth();

        $this->assertEquals(Rotation::VALUE_FLIP_BOTH, $subject->getFlip());
        $this->assertEquals(Rotation::PARAM_FLIP . '=' . Rotation::VALUE_FLIP_BOTH, (string) $subject);
    }

    public function testCanUnsetFlip(): void
    {
        $subject = new Rotation();

        $subject->setFlip(Rotation::VALUE_FLIP_HORIZONTAL);
        $subject->unsetFlip();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetOrientation(): void
    {
        $subject = new Rotation();

        $subject->setOrientation(90);

        $this->assertEquals(90, $subject->getOrientation());
        $this->assertEquals(Rotation::PARAM_ORIENTATION . '=90', (string) $subject);
    }

    public function testCanUnsetOrientation(): void
    {
        $subject = new Rotation();

        $subject->setOrientation(5);
        $subject->unsetOrientation();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetRotation(): void
    {
        $subject = new Rotation();

        $subject->setRotation(123);

        $this->assertEquals(123, $subject->getRotation());
        $this->assertEquals(Rotation::PARAM_ROTATION . '=123', (string) $subject);
    }

    public function testCanUnsetRotation(): void
    {
        $subject = new Rotation();

        $subject->setRotation(5);
        $subject->unsetRotation();

        $this->assertEmpty((string) $subject);
    }
}
