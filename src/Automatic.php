<?php

namespace hschulz\imgix;

use function \array_search;
use function \count;
use function \implode;

class Automatic
{
    /**
     * The auto parameter helps you automate a baseline level of optimization
     * across your entire image catalog.
     * @var string
     */
    const PARAMETER_NAME = 'auto';

    /**
     * When auto=compress is set, imgix will apply best-effort techniques
     * to reduce the size of the image. This includes altering our normal
     * processing algorithm to apply more aggressive image compression.
     * auto=format is respected, so images will be served in a WebP format
     * whenever possible. If the WebP format is not supported, images that
     * contain transparency will be served in a PNG8 format, if supported,
     * and all others will be served as JPEG.
     * The quality standard (q) is set to 45.
     * @var string
     */
    const VALUE_COMPRESSION = 'compress';

    /**
     * When auto=enhance is set, the image is adjusted using the distribution
     * of highlights, midtones, and shadows across all three channels—red,
     * green, and blue (RGB). Overall, the enhancement gives images a more
     * vibrant appearance.
     * @var string
     */
    const VALUE_ENHANCE = 'enhance';

    /**
     * When auto=format is set, imgix determines whether the image can be
     * served in a better format by a process called automatic content
     * negotiation. It compiles the various signals available to us—including
     * headers, user agents, and image analytics—to select the optimal image
     * format for your user. This format is served back and the image is
     * correctly cached.
     * @var string
     */
    const VALUE_FORMAT = 'format';

    /**
     * When auto=redeye is set, red-eye removal is applied to any
     * detected faces.
     * @var string
     */
    const VALUE_REDEYE = 'redeye';

    /**
     * Used to store the raw representation of the query parameter key value pairs.
     *
     * @var array
     */
    protected $params = [];

    /**
     * Creates a new automatic optimization with no features enabled.
     *
     * @param bool $enableAutomaticOutputFormat
     * @param bool $enableCompression
     * @param bool $enableImageEnhancement
     * @param bool $enableRedeyeRemoval
     */
    public function __construct(
        bool $enableAutomaticOutputFormat = false,
        bool $enableCompression = false,
        bool $enableImageEnhancement = false,
        bool $enableRedeyeRemoval = false
    )
    {
        /* Just initialize empty in any case */
        $this->params = [];

        if ($enableAutomaticOutputFormat) {
            $this->params[] = self::VALUE_FORMAT;
        }

        if ($enableCompression) {
            $this->params[] = self::VALUE_COMPRESSION;
        }

        if ($enableImageEnhancement) {
            $this->params[] = self::VALUE_ENHANCE;
        }

        if ($enableRedeyeRemoval) {
            $this->params[] = self::VALUE_REDEYE;
        }
    }

    /**
     * Returns the query string when the object is cast to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getQueryString();
    }

    /**
     * Returns the query string containing all enabled features.
     *
     * @return string
     */
    public function getQueryString(): string
    {
        /* When at least one feature is enabled the query string is created */
        return count($this->params) > 0
            ? self::PARAMETER_NAME . '=' . implode(',', $this->params) : '';
    }

    /**
     * Enables the automatic output format detection feature.
     *
     * @return void
     */
    public function enableAutoFormat(): void
    {
        if (array_search(self::VALUE_FORMAT, $this->params, true) === false) {
            $this->params[] = self::VALUE_FORMAT;
        }
    }

    /**
     * Disables the automatic output format detection feature.
     *
     * @return void
     */
    public function disableAutoFormat(): void
    {
        $pos = array_search(self::VALUE_FORMAT, $this->params, true);

        if ($pos !== false) {
            unset($this->params[$pos]);
        }
    }
}
