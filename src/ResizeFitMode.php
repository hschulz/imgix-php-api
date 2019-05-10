<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * The fit parameter controls how the output image is fit to its target
 * dimensions after resizing, and how any background areas will be filled.
 */
class ResizeFitMode extends QueryEmitter
{
    const PARAM_NAME = 'fit';

    const VALUE_CLAMP = 'clamp';

    const VALUE_CLIP = 'clip';

    const VALUE_CROP = 'crop';

    const VALUE_FACEAREA = 'facearea';

    const VALUE_FILL = 'fill';

    const VALUE_FILLMAX = 'fillmax';

    const VALUE_MAX = 'max';

    const VALUE_MIN = 'min';

    const VALUE_SCALE = 'scale';

    protected $value = '';

    public function __construct()
    {
        parent::__construct();
        $this->value = '';
    }

    public function getQueryString(): string
    {
        if ($this->value !== '') {
            return self::PARAM_NAME . '=' . $this->value;
        }

        return '';
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function unset(): void
    {
        $this->value = '';
    }

    public function setClamp(): void
    {
        $this->value = self::VALUE_CLAMP;
    }

    public function isClamp(): bool
    {
        return $this->value === self::VALUE_CLAMP;
    }

    public function setClip(): void
    {
        $this->value = self::VALUE_CLIP;
    }

    public function isClip(): bool
    {
        return $this->value === self::VALUE_CLIP;
    }

    public function setCrop(): void
    {
        $this->value = self::VALUE_CROP;
    }

    public function isCrop(): bool
    {
        return $this->value === self::VALUE_CROP;
    }

    public function setFacearea(): void
    {
        $this->value = self::VALUE_FACEAREA;
    }

    public function isFacearea(): bool
    {
        return $this->value === self::VALUE_FACEAREA;
    }

    public function setFill(): void
    {
        $this->value = self::VALUE_FILL;
    }

    public function isFill(): bool
    {
        return $this->value === self::VALUE_FILL;
    }

    public function setFillmax(): void
    {
        $this->value = self::VALUE_FILLMAX;
    }

    public function isFillmax(): bool
    {
        return $this->value === self::VALUE_FILLMAX;
    }

    public function setMax(): void
    {
        $this->value = self::VALUE_MAX;
    }

    public function isMax(): bool
    {
        return $this->value === self::VALUE_MAX;
    }

    public function setMin(): void
    {
        $this->value = self::VALUE_MIN;
    }

    public function isMin(): bool
    {
        return $this->value === self::VALUE_MIN;
    }

    public function setScale(): void
    {
        $this->value = self::VALUE_SCALE;
    }

    public function isScale(): bool
    {
        return $this->value === self::VALUE_SCALE;
    }
}
