<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * Controls the output density of your image, so you can serve images at the
 * correct density for every user's device from a single master image.
 *
 * You must specify a width, a height, or both for this parameter to work.
 * The default is 1 and the maximum value is 8.
 *
 * Device pixel ratio (DPR) is an easy way to convert between device-independent
 * pixels and device pixels (also called "CSS pixels"), so that high-DPR images
 * are only delivered to devices that can support them. This makes images faster
 * and saves bandwidth for users with lower-DPR devices, while delivering the
 * expected crispness of high-DPR imagery to those devices.
 */
class PixelDensity extends QueryEmitter
{
    /**
     * Name of the pixel density parameter.
     * @var string
     */
    const PARAM_NAME = 'dpr';

    /**
     * Returns the set device pixel ratio value or the default value.
     *
     * @return float The device pixel ratio value or '1.0' as the default value
     */
    public function get(): float
    {
        return $this->params[self::PARAM_NAME] ?? 1.0;
    }

    /**
     * Sets the device pixel ratio to the given value.
     * Although the API documentation says the dpr only uses integer values,
     * the API itself uses float values for demonstration.
     * The valid range is from close to 0.0 to 8.0
     *
     * You must specify a width, a height, or both for this parameter to work.
     *
     * @param float $value The valid range is from close to 0.0 to 8.0
     * @return void
     */
    public function set(float $value): void
    {
        $this->params[self::PARAM_NAME] = $value;
    }

    /**
     * Unsets the device pixel ratio value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unset(): void
    {
        unset($this->params[self::PARAM_NAME]);
    }
}
