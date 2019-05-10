<?php

namespace hschulz\imgix;

/**
 * The size parameters allow you to control the image dimensions.
 */
class Size extends QueryEmitter
{
    /**
     * Name of the width parameter.
     * @var string
     */
    const PARAM_WIDTH = 'w';

    /**
     * Name of the minimum width parameter.
     * @var string
     */
    const PARAM_WIDTH_MIN = 'min-w';

    /**
     * Name of the maximum width parameter.
     * @var string
     */
    const PARAM_WIDTH_MAX = 'max-w';

    /**
     * Name of the height parameter.
     * @var string
     */
    const PARAM_HEIGHT = 'h';

    /**
     * Name of the minimum height parameter.
     * @var string
     */
    const PARAM_HEIGHT_MIN = 'min-h';

    /**
     * Name of the maximum height parameter.
     * @var string
     */
    const PARAM_HEIGHT_MAX = 'max-h';

    /**
     * Returns the set width value or the default value.
     *
     * @return int The set width or '0' as the default
     */
    public function getWidth(): int
    {
        return (int) $this->params[self::PARAM_WIDTH] ?? 0;
    }

    /**
     * The width of the output image. Primary mode is a positive integer,
     * interpreted as pixel height. The resulting image will be w pixels wide.
     *
     * A secondary mode is a float between 0.0 and 1.0, interpreted as a ratio
     * in relation to the source image size. For example, a w value of 0.5 will
     * result in an output image half the width of the source image.
     *
     * If only one dimension is specified, the other dimension will be
     * calculated according to the aspect ratio of the input image.
     * If both width and height are omitted, then the input image's
     * dimensions are used.
     *
     * If the fit parameter is set to clip or max, then the actual output width
     * may be equal to or less than the dimensions you specify.
     *
     * Note: The maximum output image size on imgix is 8192×8192 pixels.
     * All output images will be sized down to accommodate this limit.
     *
     * If you'd like to resize using only w, please use fit=clip to ensure that
     * the other dimension will be accurately calculated.
     *
     * @param int $width A positive integer; maximum is 8192
     * @return void
     */
    public function setWidth(int $width): void
    {
        $this->params[self::PARAM_WIDTH] = $width;
    }

    /**
     * Unsets the width value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetWidth(): void
    {
        unset($this->params[self::PARAM_WIDTH]);
    }

    /**
     * Returns the set width ratio value or the default value.
     *
     * @return float The set width ratio or '0.0' as the default
     */
    public function getWidthRatio(): float
    {
        return (float) $this->params[self::PARAM_WIDTH] ?? 0.0;
    }

    /**
     *
     * @param float $width
     * @return void
     */
    public function setWidthRatio(float $width): void
    {
        $this->params[self::PARAM_WIDTH] = $width;
    }

    /**
     * Unsets the width ratio value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetWidthRatio(): void
    {
        $this->unsetWidth();
    }

    /**
     * Returns the set minimum width value or the default value.
     *
     * @return int The minimum width or '0' as the default
     */
    public function getMinWidth(): int
    {
        return $this->params[self::PARAM_WIDTH_MIN] ?? 0;
    }

    /**
     * The minimum allowed width of the output image.
     * Must be an integer greater than 0. This parameter will only work
     * if fit=crop is present.
     *
     * This feature is particularly useful for horizontally-scrolling feeds that
     * display user-uploaded images. By specifying a minimum width for each
     * image, useful previews will still be generated for very tall,
     * skinny panoramas.
     *
     * @param int $minWidth
     * @return void
     */
    public function setMinWidth(int $minWidth): void
    {
        $this->params[self::PARAM_WIDTH_MIN] = $minWidth;
    }

    /**
     * Unsets the min width value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetMinWidth(): void
    {
        unset($this->params[self::PARAM_WIDTH_MIN]);
    }

    /**
     * Returns the set max width value or the default value.
     *
     * @return int The max width or '0' as the default
     */
    public function getMaxWidth(): int
    {
        return $this->params[self::PARAM_WIDTH_MAX] ?? 0;
    }

    /**
     * The maximum allowed width of the output image.
     * Must be an integer greater than 0. This parameter will only work
     * if fit=crop is present.
     *
     * This feature is particularly useful for horizontally-scrolling feeds that
     * display user-uploaded images. By specifying a maximum width for each
     * image, users are prevented from accidentally (or intentionally) breaking
     * the user experience of the site or app by uploading incredibly wide,
     * short images.
     *
     * @param int $maxWidth
     * @return void
     */
    public function setMaxWidth(int $maxWidth): void
    {
        $this->params[self::PARAM_WIDTH_MAX] = $maxWidth;
    }

    /**
     * Unsets the max width value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetMaxWidth(): void
    {
        unset($this->params[self::PARAM_WIDTH_MAX]);
    }

    /**
     * Returns the set height value or the default value.
     *
     * @return int The height value or '0' as the default
     */
    public function getHeight(): int
    {
        return $this->params[self::PARAM_HEIGHT] ?? 0;
    }

    /**
     * The height of the output image. Primary mode is a positive integer,
     * interpreted as pixel height. The resulting image will be h pixels tall.
     *
     * A secondary mode is a float between 0.0 and 1.0, interpreted as a ratio
     * in relation to the source image size. For example, an h value of 0.5 will
     * result in an output image half the height of the source image.
     *
     * If only one dimension is specified, the other dimension will be
     * calculated according to the aspect ratio of the input image.
     * If both width and height are omitted, then the source image's
     * dimensions are used.
     *
     * If the fit parameter is set to clip or max, then the actual output height
     * may be equal to or less than the dimensions you specify. If you'd like
     * to resize using only h, please use fit=clip to ensure that the other
     * dimension will be accurately calculated.
     *
     * Note: The maximum output image size on imgix is 8192×8192 pixels.
     * All output images will be sized down to accomodate this limit.
     *
     * @param int $height
     * @return void
     */
    public function setHeight(int $height): void
    {
        $this->params[self::PARAM_HEIGHT] = $height;
    }

    /**
     * Unsets the height value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetHeight(): void
    {
        unset($this->params[self::PARAM_HEIGHT]);
    }

    /**
     *
     * @return float
     */
    public function getHeightRatio(): float
    {
        return (float) $this->params[self::PARAM_HEIGHT] ?? 0.0;
    }

    /**
     *
     * @param float $height
     * @return void
     */
    public function setHeightRatio(float $height): void
    {
        $this->params[self::PARAM_HEIGHT] = $height;
    }

    /**
     * Unsets the height ratio value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetHeightRatio(): void
    {
        $this->unsetHeight();
    }

    /**
     * Returns the set minimum height value or the default value.
     *
     * @return int The minimum height value or '0' as the default
     */
    public function getMinHeight(): int
    {
        return $this->params[self::PARAM_HEIGHT_MIN] ?? 0;
    }

    /**
     * The minimum allowed height of the output image.
     *
     * Must be an integer greater than 0. This parameter will only work
     * if fit=crop is present.
     *
     * This feature is particularly useful for vertically-scrolling feeds that
     * display user-uploaded images. By specifying a minimum height for each
     * image, useful previews will still be generated for very wide,
     * short panoramas.
     *
     * @param int $minHeight
     * @return void
     */
    public function setMinHeight(int $minHeight): void
    {
        $this->params[self::PARAM_HEIGHT_MIN] = $minHeight;
    }

    /**
     * Unsets the min height value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetMinHeight(): void
    {
        unset($this->params[self::PARAM_HEIGHT_MIN]);
    }

    /**
     * Returns the set maximum height value or the default value.
     *
     * @return int The max height value or '0' as default
     */
    public function getMaxHeight(): int
    {
        return $this->params[self::PARAM_HEIGHT_MAX] ?? 0;
    }

    /**
     * The maximum allowed height of the output image.
     *
     * Must be an integer greater than 0. This parameter will only work
     * if fit=crop is present.
     *
     * This feature is particularly useful for vertically-scrolling feeds that
     * display user-uploaded images. By specifying a maximum height for each
     * image, users are prevented from accidentally (or intentionally) breaking
     * the user experience of the site or app by uploading incredibly tall,
     * skinny images.
     *
     * @param int $maxHeight
     * @return void
     */
    public function setMaxHeight(int $maxHeight): void
    {
        $this->params[self::PARAM_HEIGHT_MAX] = $maxHeight;
    }

    /**
     * Unsets the max height value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetMaxHeight(): void
    {
        unset($this->params[self::PARAM_HEIGHT_MAX]);
    }
}
