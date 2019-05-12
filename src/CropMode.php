<?php

namespace hschulz\imgix;

/**
 * Crop mode controls how the image is aligned when fit=crop is set.
 * The w and h parameters should also be set, so that the crop behavior is
 * defined within specific image dimensions.
 */
class CropMode extends QueryEmitter
{
    /**
     * @var string
     */
    const PARAM_NAME = 'crop';

    /**
     * @var string
     */
    const VALUE_TOP = 'top';

    /**
     * @var string
     */
    const VALUE_BOTTOM = 'bottom';

    /**
     * @var string
     */
    const VALUE_LEFT = 'left';

    /**
     * @var string
     */
    const VALUE_RIGHT = 'right';

    /**
     * @var string
     */
    const VALUE_FACES = 'faces';

    /**
     * @var string
     */
    const VALUE_FOCALPOINT = 'focalpoint';

    /**
     * @var string
     */
    const VALUE_EDGES = 'edges';

    /**
     * @var string
     */
    const VALUE_ENTROPY = 'entropy';

    /**
     * Returns the query string containing all enabled features.
     *
     * @return string
     */
    public function getQueryString(): string
    {
        /* When at least one feature is enabled the query string is created */
        return count($this->params) > 0
            ? self::PARAM_NAME . '=' . implode(',', $this->params) : '';
    }

    /**
     * Adds a parameter to the list of parameters used for this argument if
     * it wasn't previously added.
     *
     * @param string $param The parameter name
     * @return void
     */
    protected function addParam(string $param): void
    {
        /* Only add parameter once */
        if (array_search($param, $this->params, true) === false) {
            $this->params[] = $param;
        }
    }

    /**
     * Removes a parameter from the list of used parameters for this argument.
     *
     * @param string $param The parameter name
     * @return void
     */
    protected function removeParam(string $param): void
    {
        /* Get the array index of the requested parameter */
        $pos = array_search($param, $this->params, true);

        /* Unset, even if the array index is 'false' */
        unset($this->params[$pos]);
    }

    /**
     * Crop from the top of the image, down.
     *
     * @return void
     */
    public function enableTop(): void
    {
        $this->addParam(self::VALUE_TOP);
    }

    /**
     * Disable top cropping.
     *
     * @return void
     */
    public function disableTop(): void
    {
        $this->removeParam(self::VALUE_TOP);
    }

    /**
     *
     * @return bool
     */
    public function isTopEnabled(): bool
    {
        return array_search(self::VALUE_TOP, $this->params, true) === false ? false : true;
    }

    /**
     * Crop from the bottom of the image, up.
     *
     * @return void
     */
    public function enableBottom(): void
    {
        $this->addParam(self::VALUE_BOTTOM);
    }

    /**
     * Disable bottom cropping.
     *
     * @return void
     */
    public function disableBottom(): void
    {
        $this->removeParam(self::VALUE_BOTTOM);
    }

    /**
     *
     * @return bool
     */
    public function isBottomEnabled(): bool
    {
        return array_search(self::VALUE_BOTTOM, $this->params, true) === false ? false : true;
    }

    /**
     * Crop from the left of the image, right.
     *
     * @return void
     */
    public function enableLeft(): void
    {
        $this->addParam(self::VALUE_LEFT);
    }

    /**
     * Disable left cropping.
     *
     * @return void
     */
    public function disableLeft(): void
    {
        $this->removeParam(self::VALUE_LEFT);
    }

    /**
     *
     * @return bool
     */
    public function isLeftEnabled(): bool
    {
        return array_search(self::VALUE_LEFT, $this->params, true) === false ? false : true;
    }

    /**
     * Crop from the right of the image, left.
     *
     * @return void
     */
    public function enableRight(): void
    {
        $this->addParam(self::VALUE_RIGHT);
    }

    /**
     * Disable right cropping.
     *
     * @return void
     */
    public function disableRight(): void
    {
        $this->removeParam(self::VALUE_RIGHT);
    }

    /**
     *
     * @return bool
     */
    public function isRightEnabled(): bool
    {
        return array_search(self::VALUE_RIGHT, $this->params, true) === false ? false : true;
    }

    /**
     * If faces are detected in the image, attempts to center the crop to them.
     * Otherwise, the cropping alignment will default to centered
     * if no additional values are provided.
     *
     * @return void
     */
    public function enableFaces(): void
    {
        $this->addParam(self::VALUE_FACES);
    }

    /**
     * Disable face cropping.
     *
     * @return void
     */
    public function disableFaces(): void
    {
        $this->removeParam(self::VALUE_FACES);
    }

    /**
     *
     * @return bool
     */
    public function isFacesEnabled(): bool
    {
        return array_search(self::VALUE_FACES, $this->params, true) === false ? false : true;
    }

    /**
     * When set in combination with a relative horizontal (fp-x),
     * vertical (fp-y), and/or zoom (fp-z) value, will center the image
     * on those coordinates and crop from there.
     *
     * @return void
     */
    public function enableFocalpoint(): void
    {
        $this->addParam(self::VALUE_FOCALPOINT);
    }

    /**
     * Disable focalpoint cropping.
     *
     * @return void
     */
    public function disableFocalpoint(): void
    {
        $this->removeParam(self::VALUE_FOCALPOINT);
    }

    /**
     *
     * @return bool
     */
    public function isFocalpointEnabled(): bool
    {
        return array_search(self::VALUE_FOCALPOINT, $this->params, true) === false ? false : true;
    }

    /**
     * The edges crop automatically finds and crops to an area of interest
     * by performing edge detection, looking for objects within the image.
     *
     * @return void
     */
    public function enableEdges(): void
    {
        $this->addParam(self::VALUE_EDGES);
    }

    /**
     * Disable edges cropping.
     *
     * @return void
     */
    public function disableEdges(): void
    {
        $this->removeParam(self::VALUE_EDGES);
    }

    /**
     *
     * @return bool
     */
    public function isEdgesEnabled(): bool
    {
        return array_search(self::VALUE_EDGES, $this->params, true) === false ? false : true;
    }

    /**
     * The entropy crop automatically finds and crops to an area of interest
     * by looking for busy sections of the image.
     *
     * @return void
     */
    public function enableEntropy(): void
    {
        $this->addParam(self::VALUE_ENTROPY);
    }

    /**
     * Disable entropy cropping.
     *
     * @return void
     */
    public function disableEntropy(): void
    {
        $this->removeParam(self::VALUE_ENTROPY);
    }

    /**
     *
     * @return bool
     */
    public function isEntropyEnabled(): bool
    {
        return array_search(self::VALUE_ENTROPY, $this->params, true) === false ? false : true;
    }
}
