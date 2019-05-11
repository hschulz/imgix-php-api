<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * Securing URLs adds a layer of security to your images, by blocking anyone
 * who doesn't have access to your account from altering the URLs.
 * This helps prevent your Sources from being used maliciously—for instance,
 * to produce unwanted renders or as a CDN for a separate site.
 */
class Security extends QueryEmitter
{
    /**
     * Name of the signing key parameter.
     * @var string
     */
    const PARAM_SIGNING_KEY = 's';

    /**
     * Name of the expires parameter.
     * @var string
     */
    const PARAM_EXPIRES = 'expires';

    /**
     * Returns the set signing key or the default value.
     *
     * @return string The set signing key or '' as the default value
     */
    public function getSigningKey(): string
    {
        return $this->params[self::PARAM_SIGNING_KEY] ?? '';
    }

    /**
     * Set the signing key for the request.
     *
     * @link https://docs.imgix.com/setup/securing-images
     * @param string $signingKey The signing key.
     * @return void
     */
    public function setSigningKey(string $signingKey): void
    {
        $this->params[self::PARAM_SIGNING_KEY] = $signingKey;
    }

    /**
     * Unsets the signing key value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetSigningKey(): void
    {
        unset($this->params[self::PARAM_SIGNING_KEY]);
    }

    /**
     * Returns the set expires value or the default value.
     *
     * @return int The set expires value or '0' as the default value
     */
    public function getExpires(): int
    {
        return $this->params[self::PARAM_EXPIRES] ?? 0;
    }

    /**
     * URLs can be given an expiration date via an expires parameter that takes
     * a UNIX timestamp in the query string.
     *
     * Requests made to this URL after that time will output a 404 status code.
     * When the request is made before the expiration date, the Cache-Control
     * header of the image is replaced with the amount of time left until the
     * expiration date, in seconds.
     *
     * @link https://docs.imgix.com/setup/securing-images
     * @param int $expires A unix timestamp
     * @return void
     */
    public function setExpires(int $expires): void
    {
        $this->params[self::PARAM_EXPIRES] = $expires;
    }

    /**
     * Unsets the expires value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetExpires(): void
    {
        unset($this->params[self::PARAM_EXPIRES]);
    }
}
