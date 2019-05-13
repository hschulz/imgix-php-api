<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * Fill parameters describe how blank or partially transparent pixels
 * in an image will be filled.
 */
class Fill extends QueryEmitter
{
    /**
     * Name of the background color parameter.
     * @var string
     */
    const PARAM_BACKGROUND_COLOR = 'bg';

    /**
     * Name of the fill color parameter.
     * @var string
     */
    const PARAM_FILL_COLOR = 'fill-color';

    /**
     * Name of the fill mode parameter.
     * @var string
     */
    const PARAM_FILL_MODE = '';

    /**
     * Value for the solid fill mode.
     * @var string
     */
    const VALUE_FILL_SOLID = 'solid';

    /**
     * Value for the blur fill mode.
     * @var string
     */
    const VALUE_FILL_BLUR = 'blur';

    /**
     * Returns the set background color value or the default value.
     *
     * @return string The background color or '' as the default value
     */
    public function getBackgroundColor(): string
    {
        return $this->params[self::PARAM_BACKGROUND_COLOR] ?? '';
    }

    /**
     * The bg parameter allows you to fill in any transparent areas in your
     * image with a color of your choice.
     *
     * Valid values are 3- (RGB), 4- (ARGB) 6- (RRGGBB) or 8-digit (AARRGGBB)
     * hexadecimal values. The "A" in a 4- or 8-digit hex value represents the
     * color's alpha transparency. The default is transparent white, 0FFF.
     * When outputting image formats that do not support transparency
     * (such as JPEG), set this value to a non-transparent color.
     *
     * bg also sets the background color for transparent areas defined
     * by the pad parameter.
     *
     * @param string $color 3- (RGB), 4- (ARGB) 6- (RRGGBB) or 8-digit (AARRGGBB)
     * @return void
     */
    public function setBackgroundColor(string $color): void
    {
        $this->params[self::PARAM_BACKGROUND_COLOR] = $color;
    }

    /**
     * Unsets the background color value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetBackgroundColor(): void
    {
        unset($this->params[self::PARAM_BACKGROUND_COLOR]);
    }

    /**
     * Returns the set fill color or the default value.
     *
     * @return string The fill color or '' as the default value
     */
    public function getFillColor(): string
    {
        return $this->params[self::PARAM_FILL_COLOR] ?? '';
    }

    /**
     * The fill-color parameter specifies the solid color applied to the excess
     * space of an image resized with fit=fill or fit=fillmax.
     * The parameter is dependent on the fill=solid mode.
     *
     * Valid values are 3- (RGB), 4- (ARGB) 6- (RRGGBB) or 8-digit (AARRGGBB)
     * hexadecimal values. The "A" in a 4- or 8-digit hex value represents the
     * color's alpha transparency. The default is transparent white, 0FFF.
     * When outputting image formats that do not support transparency
     * (such as JPEG), set this value to a non-transparent color.
     *
     * @param string $color 3- (RGB), 4- (ARGB) 6- (RRGGBB) or 8-digit (AARRGGBB)
     * @return void
     */
    public function setFillColor(string $color): void
    {
        $this->params[self::PARAM_FILL_COLOR] = $color;
    }

    /**
     * Unsets the background color value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFillColor(): void
    {
        unset($this->params[self::PARAM_FILL_COLOR]);
    }

    /**
     * Returns the set fill mode or the default value.
     *
     * @return string The fill mode or '' as the default value
     */
    public function getFillMode(): string
    {
        return $this->params[self::PARAM_FILL_MODE] ?? '';
    }

    /**
     * Sets the fill mode to solid.
     *
     * @return void
     */
    public function setFillModeSolid(): void
    {
        $this->params[self::PARAM_FILL_MODE] = self::VALUE_FILL_SOLID;
    }

    /**
     * Sets the fill mode to blur.
     *
     * @return void
     */
    public function setFillModeBlur(): void
    {
        $this->params[self::PARAM_FILL_MODE] = self::VALUE_FILL_BLUR;
    }

    /**
     * Unsets the fill mode value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFillMode(): void
    {
        unset($this->params[self::PARAM_FILL_MODE]);
    }
}
