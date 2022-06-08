<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\PixelDensity;
use PHPUnit\Framework\TestCase;

/**
 * Description of PixelDensityTest
 */
final class PixelDensityTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new PixelDensity();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetParams(): void
    {
        $subject = new PixelDensity();

        $params = [PixelDensity::PARAM_NAME => 2.5];

        $subject->setParams($params);

        $this->assertArrayHasKey(PixelDensity::PARAM_NAME, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanBeSet(): void
    {
        $subject = new PixelDensity();

        $subject->set(1.25);

        $this->assertEquals(1.25, $subject->get());
        $this->assertEquals(PixelDensity::PARAM_NAME . '=1.25', (string) $subject);
    }

    public function testCanBeUnset(): void
    {
        $subject = new PixelDensity();

        $subject->set(5.0);
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }
}
