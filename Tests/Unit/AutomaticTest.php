<?php

namespace hschulz\imgix\Tests\Unit;

use \hschulz\imgix\Automatic;
use \PHPUnit\Framework\TestCase;

/**
 *
 */
final class AutomaticTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Automatic();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCreateWithAllFeatures(): void
    {
        $subject = new Automatic(true, true, true, true);

        $expected = Automatic::PARAMETER_NAME . '='
                  . Automatic::VALUE_FORMAT . ','
                  . Automatic::VALUE_COMPRESSION . ','
                  . Automatic::VALUE_ENHANCE . ','
                  . Automatic::VALUE_REDEYE;

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParameters(): void
    {
        $subject = new Automatic();

        $params = [ Automatic::VALUE_COMPRESSION ];

        $subject->setParams($params);

        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanEnableFormat(): void
    {
        $subject = new Automatic();

        $subject->enableAutoOutputFormat();

        $this->assertEquals(Automatic::PARAMETER_NAME . '=' . Automatic::VALUE_FORMAT, (string) $subject);
    }

    public function testCanDisableFormat(): void
    {
        $subject = new Automatic(true);

        $subject->disableAutoOutputFormat();

        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableCompression(): void
    {
        $subject = new Automatic();

        $subject->enableImageCompression();

        $this->assertEquals(Automatic::PARAMETER_NAME . '=' . Automatic::VALUE_COMPRESSION, (string) $subject);
    }

    public function testCanDisableCompression(): void
    {
        $subject = new Automatic(false, true);

        $subject->disableImageCompression();

        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableEnhance(): void
    {
        $subject = new Automatic();

        $subject->enableImageEnhancement();

        $this->assertEquals(Automatic::PARAMETER_NAME . '=' . Automatic::VALUE_ENHANCE, (string) $subject);
    }

    public function testCanDisableEnhance(): void
    {
        $subject = new Automatic(false, false, true);

        $subject->disableImageEnhancement();

        $this->assertEmpty((string) $subject);
    }

    public function testCanEnableRedeye(): void
    {
        $subject = new Automatic();

        $subject->enableRedeyeRemoval();

        $this->assertEquals(Automatic::PARAMETER_NAME . '=' . Automatic::VALUE_REDEYE, (string) $subject);
    }

    public function testCanDisableRedeye(): void
    {
        $subject = new Automatic(false, false, false, true);

        $subject->disableRedeyeRemoval();

        $this->assertEmpty((string) $subject);
    }
}
