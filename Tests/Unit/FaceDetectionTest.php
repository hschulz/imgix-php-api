<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\FaceDetection;
use \PHPUnit\Framework\TestCase;

/**
 * Description of FaceDetectionTest
 */
final class FaceDetectionTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new FaceDetection();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new FaceDetection();

        $subject->setFaceIndex(3);
        $subject->setFacePadding(3.45);
        $subject->enableFaceData();

        $expected = FaceDetection::PARAM_FACE_INDEX . '=3&'
                  . FaceDetection::PARAM_FACE_PADDING . '=3.45&'
                  . FaceDetection::PARAM_FACES . '=1';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new FaceDetection();

        $params = [FaceDetection::PARAM_FACE_INDEX => 4];

        $subject->setParams($params);

        $this->assertArrayHasKey(FaceDetection::PARAM_FACE_INDEX, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetFaceIndex(): void
    {
        $subject = new FaceDetection();

        $subject->setFaceIndex(5);

        $this->assertEquals(5, $subject->getFaceIndex());
        $this->assertEquals(FaceDetection::PARAM_FACE_INDEX . '=5', (string) $subject);
    }

    public function testCanUnsetFaceIndex(): void
    {
        $subject = new FaceDetection();

        $subject->setFaceIndex(5);
        $subject->unsetFaceIndex();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetFacePadding(): void
    {
        $subject = new FaceDetection();

        $subject->setFacePadding(1.23);

        $this->assertEquals(1.23, $subject->getFacePadding());
        $this->assertEquals(FaceDetection::PARAM_FACE_PADDING . '=1.23', (string) $subject);
    }

    public function testCanUnsetFacePadding(): void
    {
        $subject = new FaceDetection();

        $subject->setFacePadding(2.34);
        $subject->unsetFacePadding();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetFaceData(): void
    {
        $subject = new FaceDetection();

        $subject->setFaceData(true);

        $this->assertTrue($subject->getFaceData());
        $this->assertEquals(FaceDetection::PARAM_FACES . '=1', (string) $subject);
    }

    public function testCanUnsetFaceData(): void
    {
        $subject = new FaceDetection();

        $subject->setFaceData(false);
        $subject->unsetFaceData();

        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableFaceData(): void
    {
        $subject = new FaceDetection();

        $subject->enableFaceData();

        $this->assertTrue($subject->isFaceDataEnabled());
    }

    public function testCanDisableFaceData(): void
    {
        $subject = new FaceDetection();

        $subject->disableFaceData();

        $this->assertFalse($subject->isFaceDataEnabled());
    }
}
