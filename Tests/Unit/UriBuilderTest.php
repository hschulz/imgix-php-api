<?php

namespace hschulz\imgix\Tests\Unit;

use \hschulz\imgix\FocalPointCrop;
use \hschulz\imgix\Size;
use \hschulz\imgix\UriBuilder;
use \PHPUnit\Framework\TestCase;

/**
 * Description of UriBuilderTest
 */
final class UriBuilderTest extends TestCase
{
    public function testCanReturnUnparameterizedUri(): void
    {
        $url = 'https://unittest.imgix.net';
        $imageUrl = '/path/to/image.jpg';

        $subject = new UriBuilder($url);

        $this->assertEquals($url . $imageUrl, $subject->getImageUri($imageUrl));
    }

    public function testCanAddQueryPart(): void
    {
        $url = 'https://unittest.imgix.net';
        $imageUrl = '/path/to/image.jpg';

        $subject = new UriBuilder($url);

        $fpc = new FocalPointCrop();
        $fpc->setX(10);
        $fpc->setY(20);
        $fpc->setZoom(1.23);

        $subject->addQueryPart($fpc);

        $size = new Size();
        $size->setWidth(640);
        $size->setHeight(480);

        $subject->addQueryPart($size);

        $expected = $url . $imageUrl . '?' . (string) $fpc . '&' . (string) $size;

        $this->assertEquals($expected, $subject->getImageUri($imageUrl));
    }

    public function testCanRemoveQueryPart(): void
    {
        $url = 'https://unittest.imgix.net';
        $imageUrl = '/path/to/image.jpg';

        $subject = new UriBuilder($url);

        $fpc = new FocalPointCrop();
        $fpc->setX(10);
        $fpc->setY(20);
        $fpc->setZoom(1.23);

        $subject->addQueryPart($fpc);
        $subject->removeQueryPart($fpc);

        $this->assertEquals($url . $imageUrl, $subject->getImageUri($imageUrl));
    }
}
