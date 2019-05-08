<?php

namespace hschulz\imgix;

use \hschulz\imgix\AdjustmentParameters;
use function \http_build_query;

/**
 * Adjustment class
 */
class Adjustment
{
    /**
     * Used to store the raw representation of the query parameter key value pairs.
     *
     * @var array
     */
    protected $params = [];

    /**
     * Creates a new and empty adjustment parameter list.
     */
    public function __construct()
    {
        $this->params = [];
    }

    /**
     * Returns the query string when object is cast to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getQueryString();
    }

    /**
     * Retuns the query string representation of the configured parameters.
     *
     * @return string
     */
    public function getQueryString(): string
    {
        return http_build_query($this->params);
    }

    /**
     * Returns the raw array containing all set parameters.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Replaces the parameter array with the given array.
     *
     * @return void
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }

    /**
     * Returns the brightness value or the default value.
     *
     * @return int
     */
    public function getBrightness(): int
    {
        return $this->params[AdjustmentParameters::BRIGHTNESS] ?? 0;
    }

    /**
     * Brightness.
     *
     * @see \hschulz\imgix\AdjustmentParameters::BRIGHTNESS
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setBrightness(int $value): void
    {
        $this->params[AdjustmentParameters::BRIGHTNESS] = $value;
    }

    /**
     * Unsets the brightness value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetBrightness(): void
    {
        unset($this->params[AdjustmentParameters::BRIGHTNESS]);
    }

    /**
     * Returns the contrast value or the default value.
     *
     * @return int
     */
    public function getContrast(): int
    {
        return $this->params[AdjustmentParameters::CONTRAST] ?? 0;
    }

    /**
     * Contrast.
     *
     * @see \hschulz\imgix\AdjustmentParameters::CONTRAST
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setContrast(int $value): void
    {
        $this->params[AdjustmentParameters::CONTRAST] = $value;
    }

    /**
     * Unsets the contrast value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetContrast(): void
    {
        unset($this->params[AdjustmentParameters::CONTRAST]);
    }

    /**
     * Returns the exposure value or the default value.
     *
     * @return int
     */
    public function getExposure(): int
    {
        return $this->params[AdjustmentParameters::EXPOSURE] ?? 0;
    }

    /**
     * Exposure.
     *
     * @see \hschulz\imgix\AdjustmentParameters::EXPOSURE
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setExposure(int $value): void
    {
        $this->params[AdjustmentParameters::EXPOSURE] = $value;
    }

    /**
     * Unsets the exposure value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetExposure(): void
    {
        unset($this->params[AdjustmentParameters::EXPOSURE]);
    }

    /**
     * Returns the gamma value or the default value.
     *
     * @return int
     */
    public function getGamma(): int
    {
        return $this->params[AdjustmentParameters::GAMMA] ?? 0;
    }

    /**
     * Gamma.
     *
     * @see \hschulz\imgix\AdjustmentParameters::GAMMA
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setGamma(int $value): void
    {
        $this->params[AdjustmentParameters::GAMMA] = $value;
    }

    /**
     * Unsets the gamma value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetGamma(): void
    {
        unset($this->params[AdjustmentParameters::GAMMA]);
    }

    /**
     * Returns the highlight value or the default value.
     *
     * @return int
     */
    public function getHighlight(): int
    {
        return $this->params[AdjustmentParameters::HIGHLIGHT] ?? 0;
    }

    /**
     * Highlight.
     *
     * @see \hschulz\imgix\AdjustmentParameters::HIGHLIGHT
     * @param int $value Valid values are in the range -100 - 0. The default value is 0.
     * @return void
     */
    public function setHighlight(int $value): void
    {
        $this->params[AdjustmentParameters::HIGHLIGHT] = $value;
    }

    /**
     * Unsets the highlight value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetHighlight(): void
    {
        unset($this->params[AdjustmentParameters::HIGHLIGHT]);
    }

    /**
     * Returns the hue shivt value or the default value.
     *
     * @return int
     */
    public function getHueShift(): int
    {
        return $this->params[AdjustmentParameters::HUE_SHIFT] ?? 0;
    }

    /**
     * Hue shift.
     *
     * @see \hschulz\imgix\AdjustmentParameters::HUE_SHIFT
     * @param int $value Valid values are in the range 0 – 359. The default value is 0.
     * @return void
     */
    public function setHueShift(int $value): void
    {
        $this->params[AdjustmentParameters::HUE_SHIFT] = $value;
    }

    /**
     * Unsets the hue shift value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetHueShift(): void
    {
        unset($this->params[AdjustmentParameters::HUE_SHIFT]);
    }

    /**
     * Returns the invert value or the default value.
     *
     * @return int
     */
    public function getInvert(): bool
    {
        /* Test for set value and convert back to bool */
        if (isset($this->params[AdjustmentParameters::INVERT])) {
            return $this->params[AdjustmentParameters::INVERT] === 'true' ? true : false;
        }

        /* Default value */
        return false;
    }

    /**
     * Invert.
     *
     * @see \hschulz\imgix\AdjustmentParameters::INVERT
     * @param bool $isInverted
     * @return void
     */
    public function setInvert(bool $isInverted): void
    {
        $this->params[AdjustmentParameters::INVERT] = $isInverted === true ? 'true' : 'false';
    }

    /**
     * Unsets the invert value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetInvert(): void
    {
        unset($this->params[AdjustmentParameters::INVERT]);
    }

    /**
     * Returns the saturation value or the default value.
     *
     * @return int
     */
    public function getSaturation(): int
    {
        return $this->params[AdjustmentParameters::SATURATION] ?? 0;
    }

    /**
     * Saturation.
     *
     * @see \hschulz\imgix\AdjustmentParameters::SATURATION
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setSaturation(int $value): void
    {
        $this->params[AdjustmentParameters::SATURATION] = $value;
    }

    /**
     * Unsets the saturation value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetSaturation(): void
    {
        unset($this->params[AdjustmentParameters::SATURATION]);
    }

    /**
     * Returns the shadow value or the default value.
     *
     * @return int
     */
    public function getShadow(): int
    {
        return $this->params[AdjustmentParameters::SHADOW] ?? 0;
    }

    /**
     * Shadow.
     *
     * @see \hschulz\imgix\AdjustmentParameters::SHADOW
     * @param int $value Valid values are in the range 0 – 100. The default value is 0.
     * @return void
     */
    public function setShadow(int $value): void
    {
        $this->params[AdjustmentParameters::SHADOW] = $value;
    }

    /**
     * Unsets the shadow value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetShadow(): void
    {
        unset($this->params[AdjustmentParameters::SHADOW]);
    }

    /**
     * Returns the sharpen value or the default value.
     *
     * @return int
     */
    public function getSharpen(): int
    {
        return $this->params[AdjustmentParameters::SHARPEN] ?? 0;
    }

    /**
     * Sharpen.
     *
     * @see \hschulz\imgix\AdjustmentParameters::SHARPEN
     * @param int $value Valid values are in the range 0 – 100. The default value is 0.
     * @return void
     */
    public function setSharpen(int $value): void
    {
        $this->params[AdjustmentParameters::SHARPEN] = $value;
    }

    /**
     * Unsets the sharpen value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetSharpen(): void
    {
        unset($this->params[AdjustmentParameters::SHARPEN]);
    }

    /**
     * Returns the unsharp mask value or the default value.
     *
     * @return float
     */
    public function getUnsharpMask(): float
    {
        return $this->params[AdjustmentParameters::UNSHARP_MASK] ?? 0;
    }

    /**
     * Unsharp mask.
     *
     * @see \hschulz\imgix\AdjustmentParameters::UNSHARP_MASK
     * @param int $value Valid values are any floating point number. The default value is 0.
     * @return void
     */
    public function setUnsharpMask(float $value): void
    {
        $this->params[AdjustmentParameters::UNSHARP_MASK] = $value;
    }

    /**
     * Unsets the unsharp mask value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetUnsharpMask(): void
    {
        unset($this->params[AdjustmentParameters::UNSHARP_MASK]);
    }

    /**
     * Returns the unsharp mask radius value or the default value.
     *
     * @return float
     */
    public function getUnsharpMaskRadius(): float
    {
        return $this->params[AdjustmentParameters::UNSHARP_MASK_RADIUS] ?? 2.5;
    }

    /**
     * Unsharp mask radius.
     *
     * @see \hschulz\imgix\AdjustmentParameters::UNSHARP_MASK_RADIUS
     * @param int $value Valid values are positive numbers, and the default is 2.5.
     * @return void
     */
    public function setUnsharpMaskRadius(float $value): void
    {
        $this->params[AdjustmentParameters::UNSHARP_MASK_RADIUS] = $value;
    }

    /**
     * Unsets the unsharp mask radius value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetUnsharpMaskRadius(): void
    {
        unset($this->params[AdjustmentParameters::UNSHARP_MASK_RADIUS]);
    }

    /**
     * Returns the vibrance value or the default value.
     *
     * @return int
     */
    public function getVibrance(): int
    {
        return $this->params[AdjustmentParameters::VIBRANCE] ?? 0;
    }

    /**
     * Vibrance.
     *
     * @see \hschulz\imgix\AdjustmentParameters::VIBRANCE
     * @param int $value Valid values are in the range -100 – 100. The default value is 0.
     * @return void
     */
    public function setVibrance(int $value): void
    {
        $this->params[AdjustmentParameters::VIBRANCE] = $value;
    }

    /**
     * Unsets the vibrance value entirely and therefore removes it from the query string.
     *
     * @return void
     */
    public function unsetVibrance(): void
    {
        unset($this->params[AdjustmentParameters::VIBRANCE]);
    }
}
