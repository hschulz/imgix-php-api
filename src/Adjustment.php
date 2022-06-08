<?php

declare(strict_types=1);

namespace Hschulz\Imgix;

use Hschulz\Imgix\Adjustment\Parameters;
use Hschulz\Imgix\QueryEmitter;

/**
 * Adjustment class
 */
class Adjustment extends QueryEmitter
{
    /**
     * Returns the brightness value or the default value.
     *
     * @return int
     */
    public function getBrightness(): int
    {
        return $this->params[Parameters::BRIGHTNESS] ?? 0;
    }

    /**
     * Brightness.
     *
     * @see Hschulz\Imgix\Parameters::BRIGHTNESS
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setBrightness(int $value): void
    {
        $this->params[Parameters::BRIGHTNESS] = $value;
    }

    /**
     * Unsets the brightness value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetBrightness(): void
    {
        unset($this->params[Parameters::BRIGHTNESS]);
    }

    /**
     * Returns the contrast value or the default value.
     *
     * @return int
     */
    public function getContrast(): int
    {
        return $this->params[Parameters::CONTRAST] ?? 0;
    }

    /**
     * Contrast.
     *
     * @see Hschulz\Imgix\Parameters::CONTRAST
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setContrast(int $value): void
    {
        $this->params[Parameters::CONTRAST] = $value;
    }

    /**
     * Unsets the contrast value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetContrast(): void
    {
        unset($this->params[Parameters::CONTRAST]);
    }

    /**
     * Returns the exposure value or the default value.
     *
     * @return int
     */
    public function getExposure(): int
    {
        return $this->params[Parameters::EXPOSURE] ?? 0;
    }

    /**
     * Exposure.
     *
     * @see Hschulz\Imgix\Parameters::EXPOSURE
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setExposure(int $value): void
    {
        $this->params[Parameters::EXPOSURE] = $value;
    }

    /**
     * Unsets the exposure value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetExposure(): void
    {
        unset($this->params[Parameters::EXPOSURE]);
    }

    /**
     * Returns the gamma value or the default value.
     *
     * @return int
     */
    public function getGamma(): int
    {
        return $this->params[Parameters::GAMMA] ?? 0;
    }

    /**
     * Gamma.
     *
     * @see Hschulz\Imgix\Parameters::GAMMA
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setGamma(int $value): void
    {
        $this->params[Parameters::GAMMA] = $value;
    }

    /**
     * Unsets the gamma value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetGamma(): void
    {
        unset($this->params[Parameters::GAMMA]);
    }

    /**
     * Returns the highlight value or the default value.
     *
     * @return int
     */
    public function getHighlight(): int
    {
        return $this->params[Parameters::HIGHLIGHT] ?? 0;
    }

    /**
     * Highlight.
     *
     * @see Hschulz\Imgix\Parameters::HIGHLIGHT
     * @param int $value Valid values are in the range -100 - 0. The default value is 0.
     * @return void
     */
    public function setHighlight(int $value): void
    {
        $this->params[Parameters::HIGHLIGHT] = $value;
    }

    /**
     * Unsets the highlight value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetHighlight(): void
    {
        unset($this->params[Parameters::HIGHLIGHT]);
    }

    /**
     * Returns the hue shivt value or the default value.
     *
     * @return int
     */
    public function getHueShift(): int
    {
        return $this->params[Parameters::HUE_SHIFT] ?? 0;
    }

    /**
     * Hue shift.
     *
     * @see Hschulz\Imgix\Parameters::HUE_SHIFT
     * @param int $value Valid values are in the range 0 – 359. The default value is 0.
     * @return void
     */
    public function setHueShift(int $value): void
    {
        $this->params[Parameters::HUE_SHIFT] = $value;
    }

    /**
     * Unsets the hue shift value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetHueShift(): void
    {
        unset($this->params[Parameters::HUE_SHIFT]);
    }

    /**
     * Returns the invert value or the default value.
     *
     * @return int
     */
    public function getInvert(): bool
    {
        /* Test for set value and convert back to bool */
        if (isset($this->params[Parameters::INVERT])) {
            return $this->params[Parameters::INVERT] === 'true' ? true : false;
        }

        /* Default value */
        return false;
    }

    /**
     * Invert.
     *
     * @see Hschulz\Imgix\Parameters::INVERT
     * @param bool $isInverted
     * @return void
     */
    public function setInvert(bool $isInverted): void
    {
        $this->params[Parameters::INVERT] = $isInverted === true ? 'true' : 'false';
    }

    /**
     * Unsets the invert value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetInvert(): void
    {
        unset($this->params[Parameters::INVERT]);
    }

    /**
     * Returns the saturation value or the default value.
     *
     * @return int
     */
    public function getSaturation(): int
    {
        return $this->params[Parameters::SATURATION] ?? 0;
    }

    /**
     * Saturation.
     *
     * @see Hschulz\Imgix\Parameters::SATURATION
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setSaturation(int $value): void
    {
        $this->params[Parameters::SATURATION] = $value;
    }

    /**
     * Unsets the saturation value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetSaturation(): void
    {
        unset($this->params[Parameters::SATURATION]);
    }

    /**
     * Returns the shadow value or the default value.
     *
     * @return int
     */
    public function getShadow(): int
    {
        return $this->params[Parameters::SHADOW] ?? 0;
    }

    /**
     * Shadow.
     *
     * @see Hschulz\Imgix\Parameters::SHADOW
     * @param int $value Valid values are in the range 0 – 100. The default value is 0.
     * @return void
     */
    public function setShadow(int $value): void
    {
        $this->params[Parameters::SHADOW] = $value;
    }

    /**
     * Unsets the shadow value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetShadow(): void
    {
        unset($this->params[Parameters::SHADOW]);
    }

    /**
     * Returns the sharpen value or the default value.
     *
     * @return int
     */
    public function getSharpen(): int
    {
        return $this->params[Parameters::SHARPEN] ?? 0;
    }

    /**
     * Sharpen.
     *
     * @see Hschulz\Imgix\Parameters::SHARPEN
     * @param int $value Valid values are in the range 0 – 100. The default value is 0.
     * @return void
     */
    public function setSharpen(int $value): void
    {
        $this->params[Parameters::SHARPEN] = $value;
    }

    /**
     * Unsets the sharpen value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetSharpen(): void
    {
        unset($this->params[Parameters::SHARPEN]);
    }

    /**
     * Returns the unsharp mask value or the default value.
     *
     * @return float
     */
    public function getUnsharpMask(): float
    {
        return $this->params[Parameters::UNSHARP_MASK] ?? 0;
    }

    /**
     * Unsharp mask.
     *
     * @see Hschulz\Imgix\Parameters::UNSHARP_MASK
     * @param int $value Valid values are any floating point number. The default value is 0.
     * @return void
     */
    public function setUnsharpMask(float $value): void
    {
        $this->params[Parameters::UNSHARP_MASK] = $value;
    }

    /**
     * Unsets the unsharp mask value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetUnsharpMask(): void
    {
        unset($this->params[Parameters::UNSHARP_MASK]);
    }

    /**
     * Returns the unsharp mask radius value or the default value.
     *
     * @return float
     */
    public function getUnsharpMaskRadius(): float
    {
        return $this->params[Parameters::UNSHARP_MASK_RADIUS] ?? 2.5;
    }

    /**
     * Unsharp mask radius.
     *
     * @see Hschulz\Imgix\Parameters::UNSHARP_MASK_RADIUS
     * @param int $value Valid values are positive numbers, and the default is 2.5.
     * @return void
     */
    public function setUnsharpMaskRadius(float $value): void
    {
        $this->params[Parameters::UNSHARP_MASK_RADIUS] = $value;
    }

    /**
     * Unsets the unsharp mask radius value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetUnsharpMaskRadius(): void
    {
        unset($this->params[Parameters::UNSHARP_MASK_RADIUS]);
    }

    /**
     * Returns the vibrance value or the default value.
     *
     * @return int
     */
    public function getVibrance(): int
    {
        return $this->params[Parameters::VIBRANCE] ?? 0;
    }

    /**
     * Vibrance.
     *
     * @see Hschulz\Imgix\Parameters::VIBRANCE
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setVibrance(int $value): void
    {
        $this->params[Parameters::VIBRANCE] = $value;
    }

    /**
     * Unsets the vibrance value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetVibrance(): void
    {
        unset($this->params[Parameters::VIBRANCE]);
    }
}
