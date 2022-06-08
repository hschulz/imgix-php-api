<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Stylize;
use PHPUnit\Framework\TestCase;

/**
 * Description of StylizeTest
 */
final class StylizeTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Stylize();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetAllParams(): void
    {
        $subject = new Stylize();

        $subject->setBlur(40);
        $subject->setHalftone(10);
        $subject->setMonochrome('40302010');
        $subject->setPixellate(12);
        $subject->setSepia(50);

        $expected = Stylize::PARAM_BLUR . '=40&'
                  . Stylize::PARAM_HALFTONE . '=10&'
                  . Stylize::PARAM_MONOCHROME . '=40302010&'
                  . Stylize::PARAM_PIXELLATE . '=12&'
                  . Stylize::PARAM_SEPIA . '=50';

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanSetParams(): void
    {
        $subject = new Stylize();

        $params = [Stylize::PARAM_SEPIA => 66];

        $subject->setParams($params);

        $this->assertArrayHasKey(Stylize::PARAM_SEPIA, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetBlur(): void
    {
        $subject = new Stylize();

        $subject->setBlur(10);

        $this->assertEquals(10, $subject->getBlur());
        $this->assertEquals(Stylize::PARAM_BLUR . '=10', (string) $subject);
    }

    public function testCanUnsetBlur(): void
    {
        $subject = new Stylize();

        $subject->setBlur(99);
        $subject->unsetBlur();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetHalftone(): void
    {
        $subject = new Stylize();

        $subject->setHalftone(20);

        $this->assertEquals(20, $subject->getHalftone());
        $this->assertEquals(Stylize::PARAM_HALFTONE . '=20', (string) $subject);
    }

    public function testCanUnsetHalftone(): void
    {
        $subject = new Stylize();

        $subject->setHalftone(33);
        $subject->unsetHalftone();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetMonochrome(): void
    {
        $subject = new Stylize();

        $subject->setMonochrome('ABC');

        $this->assertEquals('ABC', $subject->getMonochrome());
        $this->assertEquals(Stylize::PARAM_MONOCHROME . '=ABC', (string) $subject);
    }

    public function testCanUnsetMonochrome(): void
    {
        $subject = new Stylize();

        $subject->setMonochrome('ABCD');
        $subject->unsetMonochrome();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetPixellate(): void
    {
        $subject = new Stylize();

        $subject->setPixellate(55);

        $this->assertEquals(55, $subject->getPixellate());
        $this->assertEquals(Stylize::PARAM_PIXELLATE . '=55', (string) $subject);
    }

    public function testCanUnsetPixellate(): void
    {
        $subject = new Stylize();

        $subject->setPixellate(22);
        $subject->unsetPixellate();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetSepia(): void
    {
        $subject = new Stylize();

        $subject->setSepia(96);

        $this->assertEquals(96, $subject->getSepia());
        $this->assertEquals(Stylize::PARAM_SEPIA . '=96', (string) $subject);
    }

    public function testCanUnsetSepia(): void
    {
        $subject = new Stylize();

        $subject->setSepia(22);
        $subject->unsetSepia();

        $this->assertEmpty((string) $subject);
    }
}
