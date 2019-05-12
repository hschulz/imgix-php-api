<?php

namespace hschulz\imgix\Format;

use \hschulz\imgix\QueryEmitter;

/**
 * Description of ColorSpace
 */
class ColorSpace extends QueryEmitter
{
    /**
     * Name of the color space parameter.
     * @var string
     */
    const PARAM_NAME = 'cs';

    /**
     * Value for SRGB color space.
     * @var string
     */
    const VALUE_SRGB = 'srgb';

    /**
     * Value for Adobe RGB 1998 color space.
     * @var string
     */
    const VALUE_ADOBERGB1998 = 'adobergb1998';

    /**
     * Value for Tiny SRGB color space.
     * @var string
     */
    const VALUE_TINYSRGB = 'tinysrgb';

    /**
     * Value for stripping the color space.
     * @var string
     */
    const VALUE_STRIP = 'strip';

    /**
     * Returns the set parameter value.
     *
     * @return string The set parameter value
     */
    public function get(): string
    {
        return $this->params[self::PARAM_NAME] ?? '';
    }

    /**
     * Unsets the value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unset(): void
    {
        unset($this->params[self::PARAM_NAME]);
    }

    /**
     * Sets the color space to SRGB.
     *
     * @return void
     */
    public function setSrgb(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_SRGB;
    }

    /**
     * Sets the color space to Adobe RGB 1998
     *
     * @return void
     */
    public function setAdobeRgb1998(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_ADOBERGB1998;
    }

    /**
     * Sets the color space to Tiny SRGB.
     *
     * @return void
     */
    public function setTinySrgb(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_TINYSRGB;
    }

    /**
     * Removes the color space from the image.
     *
     * @return void
     */
    public function setStrip(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_STRIP;
    }
}
