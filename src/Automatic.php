<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;
use function \array_search;
use function \count;
use function \implode;

class Automatic extends QueryEmitter
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
     * @param bool $automaticOutputFormat
     * @param bool $imageCompression
     * @param bool $imageEnhancement
     * @param bool $redeyeRemoval
     */
    public function __construct(
        bool $automaticOutputFormat = false,
        bool $imageCompression = false,
        bool $imageEnhancement = false,
        bool $redeyeRemoval = false
    ) {
        parent::__construct();

        if ($automaticOutputFormat) {
            $this->params[] = self::VALUE_FORMAT;
        }

        if ($imageCompression) {
            $this->params[] = self::VALUE_COMPRESSION;
        }

        if ($imageEnhancement) {
            $this->params[] = self::VALUE_ENHANCE;
        }

        if ($redeyeRemoval) {
            $this->params[] = self::VALUE_REDEYE;
        }
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
     *
     * @param string $param
     * @return void
     */
    protected function addParam(string $param): void
    {
        if (array_search($param, $this->params, true) === false) {
            $this->params[] = $param;
        }
    }

    /**
     *
     * @param string $param
     * @return void
     */
    protected function removeParam(string $param): void
    {
        $pos = array_search($param, $this->params, true);

        if ($pos !== false) {
            unset($this->params[$pos]);
        }
    }

    /**
     * Enables the automatic output format detection feature.
     *
     * @return void
     */
    public function enableAutoOutputFormat(): void
    {
        $this->addParam(self::VALUE_FORMAT);
    }

    /**
     * Disables the automatic output format detection feature.
     *
     * @return void
     */
    public function disableAutoOutputFormat(): void
    {
        $this->removeParam(self::VALUE_FORMAT);
    }

    /**
     *
     * @return void
     */
    public function enableImageCompression(): void
    {
        $this->addParam(self::VALUE_COMPRESSION);
    }

    /**
     *
     * @return void
     */
    public function disableImageCompression(): void
    {
        $this->removeParam(self::VALUE_COMPRESSION);
    }

    /**
     *
     * @return void
     */
    public function enableImageEnhancement(): void
    {
        $this->addParam(self::VALUE_ENHANCE);
    }

    /**
     *
     * @return void
     */
    public function disableImageEnhancement(): void
    {
        $this->removeParam(self::VALUE_ENHANCE);
    }

    /**
     *
     * @return void
     */
    public function enableRedeyeRemoval(): void
    {
        $this->addParam(self::VALUE_REDEYE);
    }

    /**
     *
     * @return void
     */
    public function disableRedeyeRemoval(): void
    {
        $this->removeParam(self::VALUE_REDEYE);
    }
}
