<?php

namespace hschulz\imgix\Tests\Unit\Format;

use \hschulz\imgix\Format\OutputFormat;
use \PHPUnit\Framework\TestCase;

/**
 * Description of OutputFormatTest
 */
final class OutputFormatTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new OutputFormat();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanUnset(): void
    {
        $subject = new OutputFormat();

        $subject->setJson();
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }

    public function testCanGetEmpty(): void
    {
        $subject = new OutputFormat();

        $subject->setJson();

        $this->assertEquals(OutputFormat::VALUE_JSON, $subject->get());
    }

    public function testCanSetGif(): void
    {
        $subject = new OutputFormat();

        $subject->setGif();

        $this->assertTrue($subject->isGif());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_GIF, (string) $subject);
    }

    public function testCanSetJp2(): void
    {
        $subject = new OutputFormat();

        $subject->setJp2();

        $this->assertTrue($subject->isJp2());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_JP2, (string) $subject);
    }

    public function testCanSetJpg(): void
    {
        $subject = new OutputFormat();

        $subject->setJpg();

        $this->assertTrue($subject->isJpg());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_JPG, (string) $subject);
    }

    public function testCanSetJson(): void
    {
        $subject = new OutputFormat();

        $subject->setJson();

        $this->assertTrue($subject->isJson());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_JSON, (string) $subject);
    }

    public function testCanSetJxr(): void
    {
        $subject = new OutputFormat();

        $subject->setJxr();

        $this->assertTrue($subject->isJxr());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_JXR, (string) $subject);
    }

    public function testCanSetPjpg(): void
    {
        $subject = new OutputFormat();

        $subject->setPjpg();

        $this->assertTrue($subject->isPjpg());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_PJPG, (string) $subject);
    }

    public function testCanSetMp4(): void
    {
        $subject = new OutputFormat();

        $subject->setMp4();

        $this->assertTrue($subject->isMp4());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_MP4, (string) $subject);
    }

    public function testCanSetPng(): void
    {
        $subject = new OutputFormat();

        $subject->setPng();

        $this->assertTrue($subject->isPng());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_PNG, (string) $subject);
    }

    public function testCanSetPng8(): void
    {
        $subject = new OutputFormat();

        $subject->setPng8();

        $this->assertTrue($subject->isPng8());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_PNG8, (string) $subject);
    }

    public function testCanSetPng32(): void
    {
        $subject = new OutputFormat();

        $subject->setPng32();

        $this->assertTrue($subject->isPng32());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_PNG32, (string) $subject);
    }

    public function testCanSetWebm(): void
    {
        $subject = new OutputFormat();

        $subject->setWebm();

        $this->assertTrue($subject->isWebm());
        $this->assertEquals(OutputFormat::PARAM_NAME . '=' . OutputFormat::VALUE_WEBM, (string) $subject);
    }
}
