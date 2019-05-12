<?php

namespace hschulz\imgix\Format;

use \hschulz\imgix\QueryEmitter;

/**
 * The chromasub parameter controls the chroma subsampling rate for JPEG and
 * progressive JPEG output formats.
 *
 * @link https://en.wikipedia.org/wiki/Chroma_subsampling
 */
class ChromaSubsampling extends QueryEmitter
{
    /**
     * Name of the chroma subsampling parameter.
     * @var string
     */
    const PARAM_NAME = 'chromasub';

    /**
     * Default value for 4:2:0 sampling.
     * @var int
     */
    const VALUE_420 = 420;

    /**
     * Value for 4:2:2 sampling.
     * @var int
     */
    const VALUE_422 = 422;

    /**
     * Value for 4:4:4 sampling.
     * @var int
     */
    const VALUE_444 = 444;

    /**
     * Sets the chroma subsampling ratio to 4:2:0 which is the default value.
     *
     * @return void
     */
    public function setTo420(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_420;
    }

    /**
     * Sets the chroma subsampling value to 4:2:2.
     *
     * @return void
     */
    public function setTo422(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_422;
    }

    /**
     * Sets the chroma subsampling value to 4:4:4.
     *
     * @return void
     */
    public function setTo444(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_444;
    }

    /**
     * Returns the set chroma subsampling value or the default value.
     *
     * @return int The chroma subsampling value or '420' as the default value
     */
    public function get(): int
    {
        return $this->params[self::PARAM_NAME] ?? self::VALUE_420;
    }

    /**
     * Unsets the chroma subsampling value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unset(): void
    {
        unset($this->params[self::PARAM_NAME]);
    }
}
