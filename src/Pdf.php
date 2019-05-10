<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * Outputs individual pages or vector assets from PDF or
 * Adobe® Illustrator® files (.ai, .eps) as images.
 *
 * Vectors will scale before rasterizing, which is ideal for scaling up icons
 * and graphic marks. You can use page to simply convert to another format,
 * or additionally apply other parameters to manipulate the output further.
 */
class Pdf extends QueryEmitter
{
    /**
     * Name of the pdf argument.
     * @var string
     */
    const PARAM_NAME = 'page';

    /**
     * Returns the set page value or the default value.
     *
     * @return float The page value or '1' as the default value
     */
    public function get(): int
    {
        return $this->params[self::PARAM_NAME] ?? 1;
    }

    /**
     * For PDF files, page references the absolute page number of the document;
     * for Illustrator files it references the artboard number,
     * starting from the top artboard.
     *
     * @param int $value A page or artboard number
     * @return void
     */
    public function set(int $value): void
    {
        $this->params[self::PARAM_NAME] = $value;
    }

    /**
     * Unsets the page value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unset(): void
    {
        unset($this->params[self::PARAM_NAME]);
    }
}
