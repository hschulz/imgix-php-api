<?php

declare(strict_types=1);

namespace Hschulz\Imgix;

use Hschulz\Imgix\QueryEmitter;

/**
 * This set of parameters gives you control over the output properties of your
 * image across several aspects.
 */
class Format extends QueryEmitter
{
    /**
     * Name of the color quantization parameter.
     * @var string
     */
    public const PARAM_COLOR_QUANTIZATION = 'colorquant';

    /**
     * Name of the dpi parameter.
     * @var string
     */
    public const PARAM_DPI = 'dpi';

    /**
     * Name of the download parameter.
     * @var string
     */
    public const PARAM_DOWNLOAD = 'dl';

    /**
     * Name of the lossless parameter.
     * @var string
     */
    public const PARAM_LOSSLESS = 'lossless';

    /**
     * Name of the quality parameter.
     * @var string
     */
    public const PARAM_QUALITY = 'q';

    /**
     * Returns the set color quantization value or the default value.
     *
     * @return int The color quantization value or '0' as the default value
     */
    public function getColorQuantization(): int
    {
        return $this->params[self::PARAM_COLOR_QUANTIZATION] ?? 0;
    }

    /**
     * Limits the number of colors in a picture using color quantization,
     * which reduces the distinct colors in an image while maintaining
     * a visually-similar image.
     *
     * The effect is similar to that of posterization—decreasing the value
     * of the colorquant parameter will reduce the gradation of tone and create
     * abrupt changes from one tone to another.
     *
     * @param int $colors Valid values range between 2 – 256
     * @return void
     */
    public function setColorQuantization(int $colors): void
    {
        $this->params[self::PARAM_COLOR_QUANTIZATION] = $colors;
    }

    /**
     * Unsets the color quantization value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetColorQuantization(): void
    {
        unset($this->params[self::PARAM_COLOR_QUANTIZATION]);
    }

    /**
     * Returns the set dpi value or the default value.
     *
     * @return int The set dpi value or '0' as the default value
     */
    public function getDpi(): int
    {
        return $this->params[self::PARAM_DPI] ?? 0;
    }

    /**
     * Sets the DPI value in the Exif header. It does not alter the web display
     * of the image.
     *
     * The DPI value affects the print size of an image. For instance,
     * an 1800×1200-pixel image set to 300 DPI will print at a size of 6"×4".
     *
     * @param int $dpi
     * @return void
     */
    public function setDpi(int $dpi): void
    {
        $this->params[self::PARAM_DPI] = $dpi;
    }

    /**
     * Unsets the dpi entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetDpi(): void
    {
        unset($this->params[self::PARAM_DPI]);
    }

    /**
     * Returns the set download value or the default value.
     *
     * @return string The download value or '' as the default value
     */
    public function getDownload(): string
    {
        return $this->params[self::PARAM_DOWNLOAD] ?? '';
    }

    /**
     * When used in a link, dl will force the browser to download the image instead
     * of opening it in a new window. Set the value to your desired filename.
     *
     * @param string $filename The download filename
     * @return void
     */
    public function setDownload(string $filename): void
    {
        $this->params[self::PARAM_DOWNLOAD] = $filename;
    }

    /**
     * Unsets the download value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetDownload(): void
    {
        unset($this->params[self::PARAM_DOWNLOAD]);
    }

    /**
     * The lossless parameter enables delivery of lossless images in formats
     * that support lossless compression (JPEG XR and WEBP).
     *
     * @return void
     */
    public function enableLossless(): void
    {
        $this->params[self::PARAM_LOSSLESS] = 'true';
    }

    /**
     * Unsets the lossless value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function disableLossless(): void
    {
        unset($this->params[self::PARAM_LOSSLESS]);
    }

    /**
     * Returns wether the lossless parameter is set.
     *
     * @return bool
     */
    public function isLossless(): bool
    {
        return isset($this->params[self::PARAM_LOSSLESS]);
    }

    /**
     * Returns the set quality value or the default value.
     *
     * @return int The default value or '75' as the default value
     */
    public function getQuality(): int
    {
        return $this->params[self::PARAM_QUALITY] ?? 75;
    }

    /**
     * Controls the output quality of lossy file formats (jpg, pjpg, webp, or jxr).
     *
     * Valid values are in the range 0 – 100 and the default is 75.
     * Quality can often be set much lower than the default,
     * especially when serving high-DPR images.
     *
     * @param int $quality Valid values are in the range 0 – 100
     * @return void
     */
    public function setQuality(int $quality): void
    {
        $this->params[self::PARAM_QUALITY] = $quality;
    }

    /**
     * Unsets the quality value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetQuality(): void
    {
        unset($this->params[self::PARAM_QUALITY]);
    }
}
