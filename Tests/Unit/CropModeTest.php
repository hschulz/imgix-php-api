<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\CropMode;
use \PHPUnit\Framework\TestCase;

/**
 * Description of CropModeTest
 */
final class CropModeTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new CropMode();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCreateWithAllFeatures(): void
    {
        $subject = new CropMode();

        $subject->enableBottom();
        $subject->enableEdges();
        $subject->enableEntropy();
        $subject->enableFaces();
        $subject->enableFocalpoint();
        $subject->enableLeft();
        $subject->enableRight();
        $subject->enableTop();

        $expected = CropMode::PARAM_NAME . '='
                  . CropMode::VALUE_BOTTOM . ','
                  . CropMode::VALUE_EDGES . ','
                  . CropMode::VALUE_ENTROPY . ','
                  . CropMode::VALUE_FACES . ','
                  . CropMode::VALUE_FOCALPOINT . ','
                  . CropMode::VALUE_LEFT . ','
                  . CropMode::VALUE_RIGHT . ','
                  . CropMode::VALUE_TOP;

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanEnableBottom(): void
    {
        $subject = new CropMode();

        $subject->enableBottom();

        $this->assertTrue($subject->isBottomEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_BOTTOM, (string) $subject);
    }

    public function testCanDisableBottom(): void
    {
        $subject = new CropMode();

        $subject->enableBottom();
        $subject->disableBottom();

        $this->assertFalse($subject->isBottomEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableEdges(): void
    {
        $subject = new CropMode();

        $subject->enableEdges();

        $this->assertTrue($subject->isEdgesEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_EDGES, (string) $subject);
    }

    public function testCanDisableEdges(): void
    {
        $subject = new CropMode();

        $subject->enableEdges();
        $subject->disableEdges();

        $this->assertFalse($subject->isEdgesEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableEntropy(): void
    {
        $subject = new CropMode();

        $subject->enableEntropy();

        $this->assertTrue($subject->isEntropyEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_ENTROPY, (string) $subject);
    }

    public function testCanDisableEntropy(): void
    {
        $subject = new CropMode();

        $subject->enableEntropy();
        $subject->disableEntropy();

        $this->assertFalse($subject->isEntropyEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableFaces(): void
    {
        $subject = new CropMode();

        $subject->enableFaces();

        $this->assertTrue($subject->isFacesEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_FACES, (string) $subject);
    }

    public function testCanDisableFaces(): void
    {
        $subject = new CropMode();

        $subject->enableFaces();
        $subject->disableFaces();

        $this->assertFalse($subject->isFacesEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableFocalpoint(): void
    {
        $subject = new CropMode();

        $subject->enableFocalpoint();

        $this->assertTrue($subject->isFocalpointEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_FOCALPOINT, (string) $subject);
    }

    public function testCanDisableFocalpoint(): void
    {
        $subject = new CropMode();

        $subject->enableFocalpoint();
        $subject->disableFocalpoint();

        $this->assertFalse($subject->isFocalpointEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableLeft(): void
    {
        $subject = new CropMode();

        $subject->enableLeft();

        $this->assertTrue($subject->isLeftEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_LEFT, (string) $subject);
    }

    public function testCanDisableLeft(): void
    {
        $subject = new CropMode();

        $subject->enableLeft();
        $subject->disableLeft();

        $this->assertFalse($subject->isLeftEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableRight(): void
    {
        $subject = new CropMode();

        $subject->enableRight();

        $this->assertTrue($subject->isRightEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_RIGHT, (string) $subject);
    }

    public function testCanDisableRight(): void
    {
        $subject = new CropMode();

        $subject->enableRight();
        $subject->disableRight();

        $this->assertFalse($subject->isRightEnabled());
        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableTop(): void
    {
        $subject = new CropMode();

        $subject->enableTop();

        $this->assertTrue($subject->isTopEnabled());
        $this->assertEquals(CropMode::PARAM_NAME . '=' . CropMode::VALUE_TOP, (string) $subject);
    }

    public function testCanDisableTop(): void
    {
        $subject = new CropMode();

        $subject->enableTop();
        $subject->disableTop();

        $this->assertFalse($subject->isTopEnabled());
        $this->assertEmpty((string) $subject);
    }
}
