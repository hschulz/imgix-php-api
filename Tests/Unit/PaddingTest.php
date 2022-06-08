<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Padding;
use PHPUnit\Framework\TestCase;

/**
 * Description of PaddingTest
 */
final class PaddingTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Padding();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetParams(): void
    {
        $subject = new Padding();

        $params = [Padding::PARAM_NAME => 12];

        $subject->setParams($params);

        $this->assertArrayHasKey(Padding::PARAM_NAME, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanBeSet(): void
    {
        $subject = new Padding();

        $subject->set(35);

        $this->assertEquals(35, $subject->get());
        $this->assertEquals(Padding::PARAM_NAME . '=35', (string) $subject);
    }

    public function testCanBeUnset(): void
    {
        $subject = new Padding();

        $subject->set(3523);
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }
}
