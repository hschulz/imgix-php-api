<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Fill;
use \PHPUnit\Framework\TestCase;

/**
 * Description of FillTest
 */
final class FillTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Fill();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new Fill();

        $subject->setBackgroundColor('abad');
        $subject->setFillColor('c001');
        $subject->setFillModeBlur();

        $expected = Fill::PARAM_BACKGROUND_COLOR . '=abad&'
                  . Fill::PARAM_FILL_COLOR . '=c001&'
                  . Fill::PARAM_FILL_MODE . '=' . Fill::VALUE_FILL_BLUR;

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetBackgroundColor(): void
    {
        $subject = new Fill();

        $subject->setBackgroundColor('01020304');

        $this->assertEquals('01020304', $subject->getBackgroundColor());
        $this->assertEquals(Fill::PARAM_BACKGROUND_COLOR . '=01020304', (string) $subject);
    }

    public function testCanUnsetBackgroundColor(): void
    {
        $subject = new Fill();

        $subject->setBackgroundColor('123');
        $subject->unsetBackgroundColor();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetFillColor(): void
    {
        $subject = new Fill();

        $subject->setFillColor('09080706');

        $this->assertEquals('09080706', $subject->getFillColor());
        $this->assertEquals(Fill::PARAM_FILL_COLOR . '=09080706', (string) $subject);
    }

    public function testCanUnsetFillColor(): void
    {
        $subject = new Fill();

        $subject->setFillColor('890');
        $subject->unsetFillColor();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetFillModeBlur(): void
    {
        $subject = new Fill();

        $subject->setFillModeBlur();

        $this->assertEquals(Fill::VALUE_FILL_BLUR, $subject->getFillMode());
        $this->assertEquals(Fill::PARAM_FILL_MODE . '=' . Fill::VALUE_FILL_BLUR, (string) $subject);
    }

    public function testCanSetFillModeSolid(): void
    {
        $subject = new Fill();

        $subject->setFillModeSolid();

        $this->assertEquals(Fill::VALUE_FILL_SOLID, $subject->getFillMode());
        $this->assertEquals(Fill::PARAM_FILL_MODE . '=' . Fill::VALUE_FILL_SOLID, (string) $subject);
    }

    public function testCanUnsetFillMode(): void
    {
        $subject = new Fill();

        $subject->setFillModeSolid();
        $subject->unsetFillMode();

        $this->assertEmpty((string) $subject);
    }
}
