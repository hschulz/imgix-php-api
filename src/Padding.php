<?php

declare(strict_types=1);

namespace Hschulz\Imgix;

/**
 * Add padding to your image.
 */
class Padding extends QueryEmitter
{
    /**
     * Name of the padding parameter.
     * @var string
     */
    public const PARAM_NAME = 'padding';

    /**
     * Returns the set padding value or the default value.
     *
     * @return int The padding value or 0.
     */
    public function get(): int
    {
        return $this->params[self::PARAM_NAME] ?? 0;
    }

    /**
     * Pads the image by the number of pixels specified.
     * Must be a positive integer.
     *
     * If the image is requested without a specified width and height,
     * padding will be added to the dimensions of the image. If the image is
     * cropped or resized, the image (including the padding) will be sized to
     * fit within the requested dimensions.
     *
     * If bg is set, the padded area will be filled in with its value;
     * otherwise it will be transparent if the output format allows
     * transparency, and white if not.
     *
     * @param int $padding
     * @return void
     */
    public function set(int $padding): void
    {
        $this->params[self::PARAM_NAME] = $padding;
    }

    /**
     * Unsets the padding value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unset(): void
    {
        unset($this->params[self::PARAM_NAME]);
    }
}
