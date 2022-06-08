<?php

declare(strict_types=1);

namespace Hschulz\Imgix;

/**
 * Contains all methods to build a http query string from the set parameters.
 */
abstract class QueryEmitter
{
    /**
     * Used to store the raw representation of the query parameter key value pairs.
     *
     * @var array
     */
    protected array $params = [];

    /**
     * Initialize the empty object with empty parameters.
     */
    public function __construct()
    {
        $this->params = [];
    }

    /**
     * Returns the query string when object is cast to string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getQueryString();
    }

    /**
     * Retuns the query string representation of the configured parameters.
     *
     * @return string
     */
    public function getQueryString(): string
    {
        return http_build_query($this->params);
    }

    /**
     * Returns the raw array containing all set parameters.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Replaces the parameter array with the given array.
     *
     * @return void
     */
    public function setParams(array $params): void
    {
        $this->params = $params;
    }
}
