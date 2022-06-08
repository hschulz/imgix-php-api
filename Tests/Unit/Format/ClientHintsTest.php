<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Tests\Unit\Format;

use Hschulz\Imgix\Format\ClientHints;
use \PHPUnit\Framework\TestCase;

/**
 * Description of ClientHintsTest
 */
final class ClientHintsTest extends TestCase
{
    public function testEmptyObjectReturnsNothing(): void
    {
        $subject = new ClientHints();

        $this->assertEmpty((string) $subject);
        $this->assertEmpty($subject->getQueryString());
    }

    public function testCanEnableAllParams(): void
    {
        $subject = new ClientHints();

        $subject->enableDpr();
        $subject->enableSaveData();
        $subject->enableWidth();

        $expected = ClientHints::PARAM_NAME . '='
                  . ClientHints::VALUE_DPR . ','
                  . ClientHints::VALUE_SAVE_DATA . ','
                  . ClientHints::VALUE_WIDTH;

        $this->assertEquals($expected, (string) $subject);
    }

    public function testCanDisableDpr(): void
    {
        $subject = new ClientHints();

        $subject->enableDpr();
        $subject->disableDpr();

        $this->assertFalse($subject->isDprEnabled());
    }

    public function testCanDisableSaveData(): void
    {
        $subject = new ClientHints();

        $subject->enableSaveData();
        $subject->disableSaveData();

        $this->assertFalse($subject->isSaveDataEnabled());
    }

    public function testCanDisableWidth(): void
    {
        $subject = new ClientHints();

        $subject->enableWidth();
        $subject->disableWidth();

        $this->assertFalse($subject->isWidthEnabled());
    }
}
