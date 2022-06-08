<?php

declare(strict_types=1);

namespace Hschulz\Imgix\Format;

use Hschulz\Imgix\QueryEmitter;

/**
 * The output format to convert the image to.
 * Valid options are gif, jp2, jpg, json, jxr, pjpg, mp4, png, png8, png32, webm,
 * and webp.
 */
class OutputFormat extends QueryEmitter
{
    /**
     * Name for the format parameter.
     * @var string
     */
    public const PARAM_NAME = 'fm';

    /**
     * Value for gif format.
     * @var string
     */
    public const VALUE_GIF = 'gif';

    /**
     * Value for jp2 format.
     * @var string
     */
    public const VALUE_JP2 = 'jp2';

    /**
     * Value for jpg format.
     * @var string
     */
    public const VALUE_JPG = 'jpg';

    /**
     * Value for json format.
     * @var string
     */
    public const VALUE_JSON = 'json';

    /**
     * Value for jxr format.
     * @var string
     */
    public const VALUE_JXR = 'jxr';

    /**
     * Value for pjpg format.
     * @var string
     */
    public const VALUE_PJPG = 'pjpg';

    /**
     * Value for mp4 format.
     * @var string
     */
    public const VALUE_MP4 = 'mp4';

    /**
     * Value for png format.
     * @var string
     */
    public const VALUE_PNG = 'png';

    /**
     * Value for png8 format.
     * @var string
     */
    public const VALUE_PNG8 = 'png8';

    /**
     * Value for png32 format.
     * @var string
     */
    public const VALUE_PNG32 = 'png32';

    /**
     * Value for webm format.
     * @var string
     */
    public const VALUE_WEBM = 'webm';

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
     * Sets the output format to gif.
     *
     * @return void
     */
    public function setGif(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_GIF;
    }

    /**
     * Returns wether the set output format is gif.
     *
     * @return bool
     */
    public function isGif(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_GIF;
    }

    /**
     * Sets the output format to jp2.
     *
     * @return void
     */
    public function setJp2(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_JP2;
    }

    /**
     * Returns wether the set output format is jp2.
     *
     * @return bool
     */
    public function isJp2(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_JP2;
    }

    /**
     * Sets the output format to jpg.
     *
     * @return void
     */
    public function setJpg(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_JPG;
    }

    /**
     * Returns wether the set output format is jpg.
     *
     * @return bool
     */
    public function isJpg(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_JPG;
    }

    /**
     * Sets the output format to json.
     *
     * @return void
     */
    public function setJson(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_JSON;
    }

    /**
     * Returns wether the set output format is json.
     *
     * @return bool
     */
    public function isJson(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_JSON;
    }

    /**
     * Sets the output format to jxr.
     *
     * @return void
     */
    public function setJxr(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_JXR;
    }

    /**
     * Returns wether the set output format is jxr.
     *
     * @return bool
     */
    public function isJxr(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_JXR;
    }

    /**
     * Sets the output format to pjpg.
     *
     * @return void
     */
    public function setPjpg(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_PJPG;
    }

    /**
     * Returns wether the set output format is pjpg.
     *
     * @return bool
     */
    public function isPjpg(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_PJPG;
    }

    /**
     * Sets the output format to mp4.
     *
     * @return void
     */
    public function setMp4(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_MP4;
    }

    /**
     * Returns wether the set output format is mp4.
     *
     * @return bool
     */
    public function isMp4(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_MP4;
    }

    /**
     * Sets the output format to png.
     *
     * @return void
     */
    public function setPng(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_PNG;
    }

    /**
     * Returns wether the set output format is png.
     *
     * @return bool
     */
    public function isPng(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_PNG;
    }

    /**
     * Sets the output format to png8.
     *
     * @return void
     */
    public function setPng8(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_PNG8;
    }

    /**
     * Returns wether the set output format is png8.
     *
     * @return bool
     */
    public function isPng8(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_PNG8;
    }

    /**
     * Sets the output format to png32.
     *
     * @return void
     */
    public function setPng32(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_PNG32;
    }

    /**
     * Returns wether the set output format is png32.
     *
     * @return bool
     */
    public function isPng32(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_PNG32;
    }

    /**
     * Sets the output format to webm.
     *
     * @return void
     */
    public function setWebm(): void
    {
        $this->params[self::PARAM_NAME] = self::VALUE_WEBM;
    }

    /**
     * Returns wether the set output format is webm.
     *
     * @return bool
     */
    public function isWebm(): bool
    {
        return $this->params[self::PARAM_NAME] === self::VALUE_WEBM;
    }
}
