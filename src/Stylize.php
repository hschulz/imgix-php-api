<?php

namespace hschulz\imgix;

/**
 * The stylize parameters allow you to apply basic artistic effects
 * to your images.
 */
class Stylize extends QueryEmitter
{
    /**
     * @var string
     */
    const PARAM_BLUR = 'blur';

    /**
     * @var string
     */
    const PARAM_HALFTONE = 'htn';

    /**
     * @var string
     */
    const PARAM_MONOCHROME = 'mono';

    /**
     * @var string
     */
    const PARAM_PIXELLATE = 'px';

    /**
     * @var string
     */
    const PARAM_SEPIA = 'sepia';

    /**
     * Returns the set blur value or the default value.
     *
     * @return int The blur value or '0' as the default value
     */
    public function getBlur(): int
    {
        return $this->params[self::PARAM_BLUR] ?? 0;
    }

    /**
     * Applies a Gaussian style blur to your image, smoothing out image noise.
     *
     * Valid values are in the range from 0 – 2000.
     * The default value is 0, which leaves the image unchanged.
     *
     * @param int $blur Valid values are in the range from 0 – 2000
     * @return void
     */
    public function setBlur(int $blur): void
    {
        $this->params[self::PARAM_BLUR] = $blur;
    }

    /**
     * Unsets the blur value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetBlur(): void
    {
        unset($this->params[self::PARAM_BLUR]);
    }

    /**
     * Returns the set halftone value or the default value.
     *
     * @return int The halftone value or '0' as the default value
     */
    public function getHalftone(): int
    {
        return $this->params[self::PARAM_HALFTONE] ?? 0;
    }

    /**
     * Applies a half-toning effect to the image.
     *
     * Valid values are in the range 0 – 100.
     * The default value is 0,which leaves the image unchanged.
     * The value represents the width of the halftone dots.
     *
     * @param int $halftone Valid values are in the range 0 – 100
     * @return void
     */
    public function setHalftone(int $halftone): void
    {
        $this->params[self::PARAM_HALFTONE] = $halftone;
    }

    /**
     * Unsets the halftone value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetHalftone(): void
    {
        unset($this->params[self::PARAM_HALFTONE]);
    }

    /**
     * Returns the set monochrome value or the default value.
     *
     * @return string The monochrome value or '' as the default value
     */
    public function getMonochrome(): string
    {
        return $this->params[self::PARAM_MONOCHROME] ?? '';
    }

    /**
     * Applies an overall monochromatic hue change.
     *
     * The mono parameter can take a 3- (RGB), 4- (ARGB) 6- (RRGGBB)
     * or 8-digit (AARRGGBB) hexadecimal value. The "A" in a 4- or 8-digit
     * hex value represents the color's alpha transparency and therefore the
     * intensity of the monochromatic transformation. The higher the intensity,
     * the closer you will get to a duotone effect.
     *
     * @param string $monochrome A hex color code
     * @return void
     */
    public function setMonochrome(string $monochrome): void
    {
        $this->params[self::PARAM_MONOCHROME] = $monochrome;
    }

    /**
     * Unsets the monochrome value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetMonochrome(): void
    {
        unset($this->params[self::PARAM_MONOCHROME]);
    }

    /**
     * Returns the set pixellate value or the default value.
     *
     * @return int The pixellate value or '0' as the default value
     */
    public function getPixellate(): int
    {
        return $this->params[self::PARAM_PIXELLATE] ?? 0;
    }

    /**
     * Applies a square pixellation effect to the image.
     *
     * Valid values are in the range 0 – 100.
     * The default value is 0, which leaves the image unchanged.
     *
     * @param int Valid values are in the range 0 – 100
     * @return void
     */
    public function setPixellate(int $pixellate): void
    {
        $this->params[self::PARAM_PIXELLATE] = $pixellate;
    }

    /**
     * Unsets the pixellate value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetPixellate(): void
    {
        unset($this->params[self::PARAM_PIXELLATE]);
    }

    /**
     * Returns the set sepia value or the default value.
     *
     * @return int The sepia value or '0' as the default value
     */
    public function getSepia(): int
    {
        return $this->params[self::PARAM_SEPIA] ?? 0;
    }

    /**
     * Applies a sepia-toning effect to the image.
     *
     * Valid values are in the range 0 – 100.
     * The default value is 0, which leaves the image unchanged.
     *
     * @param int Valid values are in the range 0 – 100
     * @return void
     */
    public function setSepia(int $sepia): void
    {
        $this->params[self::PARAM_SEPIA] = $sepia;
    }

    /**
     * Unsets the sepia value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetSepia(): void
    {
        unset($this->params[self::PARAM_SEPIA]);
    }
}
