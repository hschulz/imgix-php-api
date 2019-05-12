<?php

namespace hschulz\imgix\Tests\Unit\Format;

use \hschulz\imgix\Format\ChromaSubsampling;
use \PHPUnit\Framework\TestCase;

/**
 * Description of ChromaSubsamplingTest
 */
final class ChromaSubsamplingTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new ChromaSubsampling();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanBeSetTo420(): void
    {
        $subject = new ChromaSubsampling();

        $subject->setTo420();

        $this->assertEquals(420, $subject->get());
        $this->assertEquals(ChromaSubsampling::PARAM_NAME . '=420', (string) $subject);
    }

    public function testCanBeSetTo422(): void
    {
        $subject = new ChromaSubsampling();

        $subject->setTo422();

        $this->assertEquals(422, $subject->get());
        $this->assertEquals(ChromaSubsampling::PARAM_NAME . '=422', (string) $subject);
    }

    public function testCanBeSetTo444(): void
    {
        $subject = new ChromaSubsampling();

        $subject->setTo444();

        $this->assertEquals(444, $subject->get());
        $this->assertEquals(ChromaSubsampling::PARAM_NAME . '=444', (string) $subject);
    }

    public function testCanBeUnset(): void
    {
        $subject = new ChromaSubsampling();

        $subject->setTo422();
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }
}
