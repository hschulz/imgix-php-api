<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;
use function \array_search;
use function \implode;

/**
 *
 */
class UriBuilder
{
    /**
     * The complete imgix url.
     *
     * @var string
     */
    protected $url = '';

    /**
     * Stores the added query string objects.
     *
     * @var array
     */
    protected $parts = [];

    /**
     * Creates a new query builder for the given imgix url.
     *
     * @param string $url The custom imgix url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->parts = [];
    }

    /**
     * Generates the customized imgix url including all added query parts.
     *
     * @param string $imagePath The requested image file.
     * @return string The built url
     */
    public function getImageUri(string $imagePath): string
    {
        /* Temporary storage for query strings */
        $params = [];

        /* Iterate and convert objects into their query string representation */
        foreach ($this->parts as $object) {
            $params[] = (string) $object;
        }

        /* Build the basic image path url */
        $url = $this->url . $imagePath;

        /* If any parameters are to be added */
        if (count($params) !== 0) {
            $url .= '?' . implode('&', $params);
        }

        return $url;
    }

    /**
     * Adds one of the customisation features to be added to the generated url.
     *
     * @param QueryEmitter $object The object to add
     * @return void
     */
    public function addQueryPart(QueryEmitter $object): void
    {
        $pos = array_search($object, $this->parts, true);

        /* Make sure the object doesn't already exist in the parts */
        if ($pos === false) {
            $this->parts[] = $object;
        }
    }

    /**
     * Removes a previously added query part object.
     *
     * @param QueryEmitter $object The object to be removed.
     * @return void
     */
    public function removeQueryPart(QueryEmitter $object): void
    {
        $pos = array_search($object, $this->parts, true);

        /* Remove object if it was previously added */
        if ($pos !== false) {
            unset($this->parts[$pos]);
        }
    }
}
