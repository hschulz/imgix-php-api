<?php

declare(strict_types=1);

namespace Hschulz\Imgix;

/**
 * Focal point cropping gives you the ability to choose and fine-tune the point
 * of interest of your image for better art direction.
 *
 * These parameters are dependent on the fit=crop and crop=focalpoint
 * operations. When they're set, the focal point parameters allow you to
 * intentionally art-direct a point of interest when cropping an image,
 * with horizontal (fp-x), vertical (fp-y), and zoom (fp-z) values.
 * As the image is then sized and cropped, the focal point determines which
 * areas are centered and within bounds of the image, and what gets cropped out.
 *
 * To better identify where the focal point is set on an image, an optional
 * debug mode (fp-debug) is also available.
 */
class FocalPointCrop extends QueryEmitter
{
    /**
     * Name of the focalpoint x coordinate.
     * @var string
     */
    public const PARAMETER_FPX = 'fp-x';

    /**
     * Name of the focalpoint y coordinate.
     * @var string
     */
    public const PARAMETER_FPY = 'fp-y';

    /**
     * Name of the focalpoint zoom value.
     * @var string
     */
    public const PARAMETER_FPZ = 'fp-z';

    /**
     * When set to true, this places a crosshair overlay on the image
     * that identifies where the focal point of the image is set.
     * @var string
     */
    public const PARAMETER_DEBUG = 'fp-debug';

    /**
     * Returns the set x coordinate or the default value.
     *
     * @return int The set x value or 0.5.
     */
    public function getX(): float
    {
        return $this->params[self::PARAMETER_FPX] ?? 0.5;
    }

    /**
     * The horizontal or x value of the focal point of an image.
     *
     * Must be a float between 0.0 and 1.0, inclusive.
     * The default value is 0.5, or the center of the image.
     * For the focal point to be set on an image, fit=crop and
     * crop=focalpoint must also be set.
     *
     * @param float Must be a float between 0.0 and 1.0, inclusive.
     * @return void
     */
    public function setX(float $x): void
    {
        $this->params[self::PARAMETER_FPX] = $x;
    }

    /**
     * Unsets the x value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetX(): void
    {
        unset($this->params[self::PARAMETER_FPX]);
    }

    /**
     * The vertical or y value of the focal point of an image.
     *
     * Must be a float between 0.0 and 1.0, inclusive.
     * The default value is 0.5, or the center of the image.
     * For the focal point to be set on an image, fit=crop and
     * crop=focalpoint must also be set.
     *
     * @return int The set x valur or '0.5'.
     */
    public function getY(): float
    {
        return $this->params[self::PARAMETER_FPY] ?? 0.5;
    }

    /**
     * The vertical or y value of the focal point of an image.
     *
     * Must be a float between 0.0 and 1.0, inclusive.
     * The default value is 0.5, or the center of the image.
     * For the focal point to be set on an image, fit=crop and
     * crop=focalpoint must also be set.
     *
     * @param float $y Must be a float between 0.0 and 1.0, inclusive.
     * @return void
     */
    public function setY(float $y): void
    {
        $this->params[self::PARAMETER_FPY] = $y;
    }

    /**
     * Unsets the y value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetY(): void
    {
        unset($this->params[self::PARAMETER_FPY]);
    }

    /**
     * Returns the set zoom value or the default value.
     *
     * @return float The set zoom value or '1.0'.
     */
    public function getZoom(): float
    {
        return $this->params[self::PARAMETER_FPZ] ?? 1.0;
    }

    /**
     * The zoom or z-dimension value of a focal point of an image.
     *
     * Must be a float between 1 and 100, inclusive.
     * The default value is 1, representing the original size of the image,
     * and every full step is the equivalent of a 100% zoom
     * (e.g. fp-z=2 is the same as viewing the image at 200%).
     * The suggested range is 1 – 10. For the focal point to be set on an image,
     * fit=crop and crop=focalpoint must also be set.
     *
     * @param float $zoom
     */
    public function setZoom(float $zoom)
    {
        $this->params[self::PARAMETER_FPZ] = $zoom;
    }

    /**
     * Unsets the zoom value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetZoom(): void
    {
        unset($this->params[self::PARAMETER_FPZ]);
    }

    /**
     * When set to true, this places a crosshair overlay on the image that
     * identifies where the focal point of the image is set.
     *
     * To use debug mode, fit=crop and crop=focalpoint must also be set.
     *
     * @param bool $isDebug Enable or disable debug mode
     * @return void
     */
    public function setDebug(bool $isDebug): void
    {
        $this->params[self::PARAMETER_DEBUG] = $isDebug === true ? 'true' : 'false';
    }

    /**
     * Unsets the debug value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetDebug(): void
    {
        unset($this->params[self::PARAMETER_DEBUG]);
    }

    /**
     * Returns the debug value or the default value.
     *
     * @return bool Returns false as the default value when debug is unset.
     */
    public function isDebug(): bool
    {
        if (isset($this->params[self::PARAMETER_DEBUG])) {
            return $this->params[self::PARAMETER_DEBUG] === 'true' ? true : false;
        }

        return false;
    }

    /**
     * Shortcut method to enable the debug mode.
     *
     * @return void
     */
    public function enableDebug(): void
    {
        $this->params[self::PARAMETER_DEBUG] = 'true';
    }

    /**
     * Shortcut method to disable the debug mode.
     *
     * @return void
     */
    public function disableDebug(): void
    {
        $this->params[self::PARAMETER_DEBUG] = 'false';
    }
}
