<?php

namespace hschulz\imgix;

/**
 * Extracts a color palette from your image, which you can use to dynamically
 * define other design elements in your layout.
 *
 * Palettes can be returned as CSS or JSON, and you can specify the number
 * of colors in the palette as well as a class name prefix for CSS output.
 */
class ColorPalette extends QueryEmitter
{
    /**
     * @var string
     */
    const PARAM_CSS_PREFIX = 'prefix';

    /**
     * @var string
     */
    const PARAM_COLOR_PALETTE_EXTRATCTION = 'palette';

    /**
     * @var string
     */
    const VALUE_PALETTE_CSS = 'css';

    /**
     * @var string
     */
    const VALUE_PALETTE_JSON = 'json';

    /**
     * @var string
     */
    const PARAM_PALETTE_COLOR_COUNT = 'colors';

    /**
     *
     * @return string
     */
    public function getCssPrefix(): string
    {
        return $this->params[self::PARAM_CSS_PREFIX] ?? '';
    }

    /**
     *
     * @param string $prefix
     * @return void
     */
    public function setCssPrefix(string $prefix): void
    {
        $this->params[self::PARAM_CSS_PREFIX] = $prefix;
    }

    /**
     *
     * @return void
     */
    public function unsetCssPrefix(): void
    {
        unset($this->params[self::PARAM_CSS_PREFIX]);
    }

    /**
     *
     * @return string
     */
    public function getPaletteOutput(): string
    {
        return $this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION] ?? '';
    }

    /**
     *
     * @return void
     */
    public function setPaletteOutputCss(): void
    {
        $this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION] = self::VALUE_PALETTE_CSS;
    }

    /**
     *
     * @return void
     */
    public function setPaletteOutputJson(): void
    {
        $this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION] = self::VALUE_PALETTE_JSON;
    }

    /**
     *
     * @return void
     */
    public function unsetPaletteOutput(): void
    {
        unset($this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION]);
    }

    /**
     *
     * @return bool
     */
    public function isPaletteOutputCss(): bool
    {
        return ($this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION] ?? '') === self::VALUE_PALETTE_CSS;
    }

    /**
     *
     * @return bool
     */
    public function isPaletteOutputJson(): bool
    {
        return ($this->params[self::PARAM_COLOR_PALETTE_EXTRATCTION] ?? '') === self::VALUE_PALETTE_JSON;
    }

    /**
     *
     * @return int
     */
    public function getColorCount(): int
    {
        return $this->params[self::PARAM_PALETTE_COLOR_COUNT] ?? 6;
    }

    /**
     *
     * @param int $count
     * @return void
     */
    public function setColorCount(int $count): void
    {
        $this->params[self::PARAM_PALETTE_COLOR_COUNT] = $count;
    }

    /**
     *
     * @return void
     */
    public function unsetColorCount(): void
    {
        unset($this->params[self::PARAM_PALETTE_COLOR_COUNT]);
    }
}
