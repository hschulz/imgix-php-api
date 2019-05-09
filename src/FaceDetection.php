<?php

namespace hschulz\imgix;

use \hschulz\imgix\QueryEmitter;

/**
 * These parameters modify fit=facearea mode when sizing an image to zoom in and
 * center on any faces within an image. They make it easy to auto-generate
 * cropped avatars or profile photos.
 */
class FaceDetection extends QueryEmitter
{
    /**
     * @var string
     */
    const PARAM_FACE_INDEX = 'faceindex';

    /**
     * @var string
     */
    const PARAM_FACE_PADDING = 'facepad';

    /**
     * @var string
     */
    const PARAM_FACES = 'faces';

    /**
     * Returns the set value for face index or the default value.
     *
     * @return int The set value or '1' as the default value
     */
    public function getFaceIndex(): int
    {
        return $this->params[self::PARAM_FACE_INDEX] ?? 1;
    }

    /**
     * The faceindex parameter selects a face on which to center an image
     * when fit=facearea.
     *
     * The faceindex parameter must be an integer. It can be set to any value
     * from 1 to N, where N is the total number of detected faces in the image.
     * You can use faces parameter along with the fm=json parameter to determine
     * how many faces are in the image.
     *
     * @param int $index 1 to N  where N is the total number of detected faces
     * @return void
     */
    public function setFaceIndex(int $index): void
    {
        $this->params[self::PARAM_FACE_INDEX] = $index;
    }

    /**
     * Unsets the face index value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFaceIndex(): void
    {
        unset($this->params[self::PARAM_FACE_INDEX]);
    }

    /**
     * Returns the set value for face padding or the default value
     *
     * @return float The set value or '1.0' as the default value
     */
    public function getFacePadding(): float
    {
        return $this->params[self::PARAM_FACE_PADDING] ?? 1.0;
    }

    /**
     * The facepad parameter defines how much padding to allow for each
     * face when fit=facearea.
     *
     * The value of facepad must be a positive float. The value defines
     * the padding ratio based on the pixel dimensions of the face, up to
     * the limit of the image's dimensions. A larger value yields more padding.
     * The default value is 1.0.
     *
     * @param float $padding The value of facepad must be a positive float
     * @return void
     */
    public function setFacePadding(float $padding): void
    {
        $this->params[self::PARAM_FACE_PADDING] = $padding;
    }

    /**
     * Unsets the face padding value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFacePadding(): void
    {
        unset($this->params[self::PARAM_FACE_PADDING]);
    }

    /**
     * Returns the set value for returning face data or the default value.
     *
     * @return bool The set value or false as default value
     */
    public function getFaceData(): bool
    {
        return (bool) $this->params[self::PARAM_FACES] ?? false;
    }

    /**
     * The faces parameter is a flag that forces the fm=json parameter
     * to include face data.
     *
     * When faces=1, coordinate data for the bounds, mouth, left eye,
     * and right eye of each face will be added to the JSON output.
     * The coordinates start on the top left corner of the image.
     *
     * @param bool $isEnabled Enable or disable output of face data
     * @return void
     */
    public function setFaceData(bool $isEnabled): void
    {
        $this->params[self::PARAM_FACES] = (int) $isEnabled;
    }

    /**
     * Unsets the face data value entirely and therefore removes it
     * from the query string.
     *
     * @return void
     */
    public function unsetFaceData(): void
    {
        unset($this->params[self::PARAM_FACES]);
    }

    /**
     * Convinience method for getting the face data value.
     *
     * @return bool
     */
    public function isFaceDataEnabled(): bool
    {
        return $this->getFaceData();
    }

    /**
     * Shortcut method to enable face data.
     *
     * @return void
     */
    public function enableFaceData(): void
    {
        $this->params[self::PARAM_FACES] = 1;
    }

    /**
     * Shortcut method to disable face data.
     *
     * @return void
     */
    public function disableFaceData(): void
    {
        $this->params[self::PARAM_FACES] = 0;
    }
}
