<?php

namespace hschulz\imgix\Format;

use function \array_search;
use \hschulz\imgix\QueryEmitter;

/**
 * Note: ch cannot be set as a Source's default parameter,
 * due to the way it interacts with imgix's caching infrastructure.
 *
 * The ch parameter opts in specific images to use Client Hints,
 * which provide automatic resource selection using browser headers.
 * imgix currently supports three hints, which override or change their
 * respective imgix parameters
 */
class ClientHints extends QueryEmitter
{
    /**
     * Name of the client hint parameter.
     * @var string
     */
    const PARAM_NAME = 'ch';

    /**
     * Value for the client hint width setting.
     * @var string
     */
    const VALUE_WIDTH = 'Width';

    /**
     * Value for the client hint dpr setting.
     * @var string
     */
    const VALUE_DPR = 'DPR';

    /**
     * Name for the client hint save-data setting.
     * @var string
     */
    const VALUE_SAVE_DATA = 'Save-Data';

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
     * Width overrides the imgix w parameter.
     *
     * @return void
     */
    public function enableWidth(): void
    {
        $this->addParam(self::VALUE_WIDTH);
    }

    /**
     * Disables the client hint width auto detection.
     *
     * @return void
     */
    public function disableWidth(): void
    {
        $this->removeParam(self::VALUE_WIDTH);
    }

    /**
     * Returns wether the with param is set.
     *
     * @return bool
     */
    public function isWidthEnabled(): bool
    {
        return array_search(self::VALUE_WIDTH, $this->params, true) === false ? false : true;
    }

    /**
     * Overrides the imgix dpr parameter
     *
     * @return void
     */
    public function enableDpr(): void
    {
        $this->addParam(self::VALUE_DPR);
    }

    /**
     * Disable the client hint dpr auto detection.
     *
     * @return void
     */
    public function disableDpr(): void
    {
        $this->removeParam(self::VALUE_DPR);
    }

    /**
     * Returns wether the dpr param is set.
     *
     * @return bool
     */
    public function isDprEnabled(): bool
    {
        return array_search(self::VALUE_WIDTH, $this->params, true) === false ? false : true;
    }

    /**
     * Reduces image quality to q=45 and may change the output format of the image
     *
     * @return void
     */
    public function enableSaveData(): void
    {
        $this->addParam(self::VALUE_SAVE_DATA);
    }

    /**
     * Disable the client hin save data auto detection.
     *
     * @return void
     */
    public function disableSaveData(): void
    {
        $this->removeParam(self::VALUE_SAVE_DATA);
    }

    /**
     * Returns wether the save data param is set.
     *
     * @return bool
     */
    public function isSaveDataEnabled(): bool
    {
        return array_search(self::VALUE_SAVE_DATA, $this->params, true) === false ? false : true;
    }
}
