<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Pdf;
use PHPUnit\Framework\TestCase;

/**
 * Description of PdfTest
 */
final class PdfTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Pdf();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetParams(): void
    {
        $subject = new Pdf();

        $params = [Pdf::PARAM_NAME => 2];

        $subject->setParams($params);

        $this->assertArrayHasKey(Pdf::PARAM_NAME, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanBeSet(): void
    {
        $subject = new Pdf();

        $subject->set(40);

        $this->assertEquals(40, $subject->get());
        $this->assertEquals(Pdf::PARAM_NAME . '=40', (string) $subject);
    }

    public function testCanBeUnset(): void
    {
        $subject = new Pdf();

        $subject->set(99);
        $subject->unset();

        $this->assertEmpty((string) $subject);
    }
}
