<?php

/**
 * Fansoro Gregwar Image Plugin
 *
 * (c) Romanenko Sergey / Awilum <awilum@msn.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once(__DIR__ . '/vendor/autoload.php');

use Gregwar\Image\Image as GregwarImage;

// Usage in templates:
// {Image::open('themes/default/assets/img/fansoro-logo.png')->resize(100, 100)->png()}
class image extends GregwarImage
{
}

// Shortcode:
// {Image open="themes/default/assets/img/fansoro-logo.png"}
Shortcode::add('Image', function ($attributes) {

    // Extract attributes
    extract($attributes);

    // Open Image
    if (isset($open)) {
        $file = Image::open($open);

        // Resize Image
        if (isset($width) && isset($height)) {
            if (isset($resize_method) && in_array($resize_method, $resize_methods = ['scale', 'force', 'crop', 'zoom'])) {
                switch ($resize_method) {
                    case 'scale':
                        $file->scaleResize($width, $height, (isset($background)) ? $background : 0xffffff);
                    break;
                    case 'force':
                        $file->forceResize($width, $height, (isset($background)) ? $background : 0xffffff);
                    break;
                    case 'crop':
                        $file->cropResize($width, $height, (isset($background)) ? $background : 0xffffff);
                    break;
                    case 'zoom':
                        $file->zoomCrop($width, $height, (isset($background)) ? $background : 0xffffff, (isset($xPos)) ? $xPos : 0, (isset($yPos)) ? $yPos : 0);
                    break;
                }
            } else {
                $file->resize($width, $height, (isset($background)) ? $background : 0xffffff);
            }
        }

        if (isset($contrast)) {
            $file->contrast($contrast);
        }

        if (isset($brighness)) {
            $file->brighness($brighness);
        }

        if (isset($smooth)) {
            $file->smooth($smooth);
        }

        if (isset($negate) && $negate == 'true') {
            $file->negate();
        }

        if (isset($sepia) && $sepia == 'true') {
            $file->sepia();
        }

        if (isset($sharp) && $sharp == 'true') {
            $file->sharp();
        }

        if (isset($edge) && $edge == 'true') {
            $file->edge();
        }

        if (isset($emboss) && $emboss == 'true') {
            $file->emboss();
        }

        if (isset($grayscale) && $grayscale == 'true') {
            $file->grayscale();
        }

        if (isset($colorize) && $colorize == 'true' && isset($red) && isset($green) && isset($blue)) {
            $file->colorize($red, $green, $blue);
        }

        if (isset($color) && isset($x) && isset($y)) {
            $file->fill($color, $x, $y);
        }

        if (isset($angle)) {
            $file->rotate($angle, (isset($background)) ? $background : 0xffffff);
        }

        if (isset($font) && isset($text) && isset($x) && isset($y) && isset($size) && isset($angle) && isset($color) && isset($position)) {
            $file->write($font, $text, $x, $y, $size, $angle, $color, $position);
        }
    } else {
        $file = '';
    }

    return $file;
});
