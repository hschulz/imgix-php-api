<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit;

use Hschulz\Imgix\Security;
use PHPUnit\Framework\TestCase;

/**
 * Description of SecurityTest
 */
final class SecurityTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new Security();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanSetParams(): void
    {
        $subject = new Security();

        $params = [Security::PARAM_EXPIRES => 1865100000];

        $subject->setParams($params);

        $this->assertArrayHasKey(Security::PARAM_EXPIRES, $subject->getParams());
        $this->assertEquals($params, $subject->getParams());
    }

    public function testCanSetSigningKey(): void
    {
        $subject = new Security();

        $subject->setSigningKey('85af727fd022d3a13e7972fd6a418582');

        $this->assertEquals('85af727fd022d3a13e7972fd6a418582', $subject->getSigningKey());
        $this->assertEquals(Security::PARAM_SIGNING_KEY . '=85af727fd022d3a13e7972fd6a418582', (string) $subject);
    }

    public function testCanUnsetSigningKey(): void
    {
        $subject = new Security();

        $subject->setSigningKey('85af727fd022d3a13e7972fd6a418582');
        $subject->unsetSigningKey();

        $this->assertEmpty((string) $subject);
    }

    public function testCanSetExpires(): void
    {
        $subject = new Security();

        $subject->setExpires(1865100000);

        $this->assertEquals(1865100000, $subject->getExpires());
        $this->assertEquals(Security::PARAM_EXPIRES . '=1865100000', (string) $subject);
    }

    public function testCanUnsetExpires(): void
    {
        $subject = new Security();

        $subject->setExpires(1865100000);
        $subject->unsetExpires();

        $this->assertEmpty((string) $subject);
    }
}
