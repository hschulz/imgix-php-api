<?php

namespace hschulz\imgIx;

use \hschulz\imgix\Adjustment;
use \hschulz\imgix\Automatic;

class UriBuilder
{
    /**
     * @var string
     */
    protected $url = '';

    /**
     * @var Adjustment
     */
    protected $adjustment = null;

    /**
     * @var Automatic
     */
    protected $automatic = null;

    /**
     *
     *
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
        $this->adjustment = null;
        $this->automatic = null;
    }

    public function __toString(): string
    {
        return $this->getQueryString();
    }

    public function getQueryString(): string
    {
        return $this->url;
    }

    public function getAdjustment(): ?Adjustment
    {
        return $this->adjustment;
    }

    public function setAdjustment(Adjustment $adjustment): void
    {
        $this->adjustment = $adjustment;
    }

    public function getAutomatic(): ?Automatic
    {
        return $this->automatic;
    }
}
