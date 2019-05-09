<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * The rotation parameters allow you to change the orientation of your image,
 * by either flipping along its axes or rotating around the center.
 */
class Rotation extends QueryEmitter
{
    /**
     * Name of the flip parameter.
     * @var string
     */
    const PARAM_FLIP = 'flip';

    /**
     * Value indicating a horizontal flip.
     * @var string
     */
    const VALUE_FLIP_HORIZONTAL = 'h';

    /**
     * Value indicating a vertical flip.
     * @var string
     */
    const VALUE_FLIP_VERTICAL = 'v';

    /**
     * Value indicating a horizontal and vertical flip.
     * @var string
     */
    const VALUE_FLIP_BOTH = 'hv';

    /**
     * Name of the orientation parameter.
     * @var string
     */
    const PARAM_ORIENTATION = 'or';

    /**
     * Name of the rotation parameter.
     * @var string
     */
    const PARAM_ROTATION = 'rot';

    /**
     * Returns the set flip value or an empty string.
     *
     * @return string The flip value or an empty string.
     */
    public function getFlip(): string
    {
        return $this->params[self::PARAM_FLIP] ?? '';
    }

    /**
     * Flips the image horizontally, vertically, or both.
     * Valid values are h for horizontal, v for vertical, and hv
     * to flip along both axes.
     *
     * @param string $flip Valid values are 'h', 'v' and 'hv'
     * @return void
     */
    public function setFlip(string $flip): void
    {
        $this->params[self::PARAM_FLIP] = $flip;
    }

    /**
     * Unsets the flip value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFlip(): void
    {
        unset($this->params[self::PARAM_FLIP]);
    }

    /**
     * Shortcut method to set the flip value to horizontal.
     *
     * @return void
     */
    public function flipHorizontal(): void
    {
        $this->params[self::PARAM_FLIP] = self::VALUE_FLIP_HORIZONTAL;
    }

    /**
     * Shortcut method to set the flip value to vertical.
     *
     * @return void
     */
    public function flipVertical(): void
    {
        $this->params[self::PARAM_FLIP] = self::VALUE_FLIP_VERTICAL;
    }

    /**
     * Shortcut method to set the flip value to horizontal and vertical.
     *
     * @return void
     */
    public function flipBoth(): void
    {
        $this->params[self::PARAM_FLIP] = self::VALUE_FLIP_BOTH;
    }

    /**
     * Returns the set orientation value or the default value.
     *
     * @return Int the orientation value or 0.
     */
    public function getOrientation(): int
    {
        return $this->params[self::PARAM_ORIENTATION] ?? 0;
    }

    /**
     * Changes the cardinal orientation of the image by overriding any
     * Exif orientation metadata.
     *
     * By default, imgix automatically uses Exchangeable image file format
     * (Exif) metadata present in the master image to orient your photos
     * correctly. If your image does not contain Exif orientation data,
     * we assume a value of 0 and do not rotate the image.
     *
     * To override the Exif data, you can set the value either to 1 through 8
     * (following Exif format), or to 90, 180, 270, etc. as degree aliases for
     * the Exif values where 90 = 6, 180 = 3, and 270 = 8.
     *
     * @param int $orientation Should be an EXIF value (1-8) or 90, 180, 270
     * @return void
     */
    public function setOrientation(int $orientation): void
    {
        $this->params[self::PARAM_ORIENTATION] = $orientation;
    }

    /**
     * Unsets the orientation value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetOrientation(): void
    {
        unset($this->params[self::PARAM_ORIENTATION]);
    }

    /**
     * Returns the set rotation value or the default value.
     *
     * @return int The rotation value or 0.
     */
    public function getRotation(): int
    {
        return $this->params[self::PARAM_ROTATION] ?? 0;
    }

    /**
     * Rotates the image by degrees according to the value specified.
     * Valid values are in the range 0 – 359, and rotation is counter-clockwise
     * with 0 (the default) at the top of the image. The image will be zoomed
     * after rotation so that it covers the entire specified dimensions
     * (unlike or, which keeps the image at the same zoom setting and rotates
     * the frame along with the image).
     *
     * @param int $rotation Valid values are in the range 0 – 359
     * @return void
     */
    public function setRotation(int $rotation): void
    {
        $this->params[self::PARAM_ROTATION] = $rotation;
    }

    /**
     * Unsets the rotation value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetRotation(): void
    {
        unset($this->params[self::PARAM_ROTATION]);
    }
}
