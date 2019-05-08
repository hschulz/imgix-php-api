<?php

namespace hschulz\imgix;

/**
 * This interface contains all http query parameters available
 * for image adjustment in the imgix api.
 */
interface AdjustmentParameters
{
    /**
     * Adjusts the overall brightness of the image.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const BRIGHTNESS = 'bri';

    /**
     * Adjusts the contrast of the image.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const CONTRAST = 'con';

    /**
     * Adjusts the exposure setting for an image, similar to changing the F-stop on a camera.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const EXPOSURE = 'exp';

    /**
     * Adjusts gamma and midtone brightness.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const GAMMA = 'gam';

    /**
     * Adjusts the highlight tonal mapping of an image while preserving detail in highlighted areas.
     * Valid values are in the range -100 – 0. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const HIGHLIGHT = 'high';

    /**
     * Changes the hue, or tint, of each pixel in the image.
     * The value is an angle along a hue color wheel, with the pixel's starting color at 0.
     * Valid values are in the range 0 – 359. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const HUE_SHIFT = 'hue';

    /**
     * Inverts all pixel colors and brightness values within the image, producing a negative of the image.
     * Valid values are 0/false and 1/true.
     * @var string
     */
    const INVERT = 'invert';

    /**
     * Adjusts the saturation of the image.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * A value of -100 will convert the image to grayscale.
     * @var string
     */
    const SATURATION = 'sat';

    /**
     * Adjusts the shadow tonal mapping of an image while preserving detail in shadowed areas.
     * Valid values are in the range 0 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const SHADOW = 'shad';

    /**
     * Sharpens the image using luminance (which only affects the black and white values),
     * providing crisp detail with minimal color artifacts.
     * Valid values are in the range 0 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const SHARPEN = 'sharp';

    /**
     * Sharpens the image details using an unsharp mask (a blurred, inverted copy of the image).
     * Valid values are any floating point number. The default value is 0, which leaves the image unchanged.
     * This parameter should be used in conjunction with usmrad.
     * For images with general noise, we suggest using the sharp parameter instead.
     * Unsharp mask and radius are better for thumbnails and fine-tuned sharpening.
     * @var string
     */
    const UNSHARP_MASK = 'usm';

    /**
     * Determines how many pixels should be included to enhance the contrast when using the unsharp mask parameter.
     * Valid values are positive numbers, and the default is 2.5.
     * This parameter will have no effect on the image if usm is not set.
     * For images with general noise, we suggest using the sharp parameter instead.
     * Unsharp mask and radius are better for thumbnails and fine-tuned sharpening.
     * @var string
     */
    const UNSHARP_MASK_RADIUS = 'usmrad';

    /**
     * Adjusts the color saturation of an image while keeping pleasing skin tones.
     * Valid values are in the range -100 – 100. The default value is 0, which leaves the image unchanged.
     * @var string
     */
    const VIBRANCE = 'vib';
}
