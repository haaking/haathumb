# haaThumb

haaThumb is a wrapper for timthumb allowing for prettier, SEO friendly URLs.

## Example Usage

With htaccess rewrite:
```html
<img src='thumb/400x300/src/path/to/img.jpg' />
```

Without htaccess rewrite:
```html
<img src='haathumb.php?var=/400x300/src/path/to/img.jpg' />
```

## Query Parameters

<table>
    <tr>
        <th>Key</th>
        <th>Example Value</th>
        <th>Default</th>
        <th>Description</th>
    </tr>
    <tr>
        <td>src</td>
        <td>/path/to/img.jpg</td>
        <td></td>
        <td>Absolute or relative path to the source image, no URLs allowed</td>
    </tr>
    <tr>
        <td>size</td>
        <td>100 | 320x240 | 320x | x240</td>
        <td>100x100</td>
        <td>Width and/or height must be between 1 and 1500</td>
    </tr>
    <tr>
        <td>quality</td>
        <td>/quality/0-100/</td>
        <td>90</td>
        <td>Reduce quality of the image to reduce filesize</td>
    </tr>
    <tr>
        <td>fit</td>
        <td>/fit/</td>
        <td></td>
        <td>Resize to Fit specified dimensions (no cropping)</td>
    </tr>
    <tr>
        <td>cropped</td>
        <td>/cropped/</td>
        <td>(default)</td>
        <td>Crop and resize to best fit the dimensions</td>
    </tr>
    <tr>
        <td>bordered</td>
        <td>/bordered/</td>
        <td></td>
        <td>Resize proportionally to fit entire image into specified dimensions, and add borders if required</td>
    </tr>
    <tr>
        <td>aspect</td>
        <td>/aspect/</td>
        <td></td>
        <td>Resize proportionally adjusting size of scaled image so there are no borders gaps</td>
    </tr>
    <tr>
        <td>align</td>
        <td>center | top | top-left | top-right | bottom | bottom-left | bottom-right | left | right</td>
        <td>/center/</td>
        <td>Alignment of image when cropped</td>
    </tr>
    <tr>
        <td>invert</td>
        <td>/invert/</td>
        <td></td>
        <td>Invert the image with the Negate filter</td>
    </tr>
    <tr>
        <td>grayscale</td>
        <td>/grayscale/</td>
        <td></td>
        <td>Converts image to grayscale</td>
    </tr>
    <tr>
        <td>brightness</td>
        <td>/brightness/-100 - 100/</td>
        <td></td>
        <td>Adjust brightness of image. Requires 1 argument to specify the amount of brightness to add. Values can be negative to make the image darker.</td>
    </tr>
    <tr>
        <td>contrast</td>
        <td>/contrast/-100 - 100/</td>
        <td></td>
        <td>Adjust contrast of image. Requires one argument to specify the amount of contrast to apply.  Positive values will reduce the contrast and negative values will increase the contrast.</td>
    </tr>
    <tr>
        <td>colorize</td>
        <td>/colorize/128.0.0.127/</td>
        <td></td>
        <td>Apply a color wash to the image. The arguments are in RGBA</td>
    </tr>
    <tr>
        <td>edge detect</td>
        <td>/edge-detect/</td>
        <td></td>
        <td>Uses edge detection to highlight the edges in the image.</td>
    </tr>
    <tr>
        <td>emboss</td>
        <td>/emboss/</td>
        <td></td>
        <td>Embosses the image.</td>
    </tr>
    <tr>
        <td>gaussian</td>
        <td>/gaussian/</td>
        <td></td>
        <td>Blurs the image using the Gaussian method.</td>
    </tr>
    <tr>
        <td>selective</td>
        <td>/selective/</td>
        <td></td>
        <td>Blurs the image.</td>
    </tr>
    <tr>
        <td>mean</td>
        <td>/mean/</td>
        <td></td>
        <td>Uses mean removal to achieve a "sketchy" effect.</td>
    </tr>
    <tr>
        <td>smooth</td>
        <td>/smooth/0-100/</td>
        <td></td>
        <td>Makes the image smoother.</td>
    </tr>
    <tr>
        <td>pixelate</td>
        <td>/pixelate/0-?.0-1/</td>
        <td></td>
        <td>Applies pixelation effect to the image, use arg1 to set the block size and arg2 to set the pixelation effect.</td>
    </tr>
    <tr>
        <td>sharpen</td>
        <td>/sharpen/</td>
        <td></td>
        <td>Sharpen the image.</td>
    </tr>
    <tr>
        <td>canvas color</td>
        <td>/canvas-color/ffffff/</td>
        <td>ffffff</td>
        <td>Change background colour. Most used when changing the zoom and crop settings, which in turn can add borders to the image. Arguments in html hex color</td>
    </tr>
    <tr>
        <td>canvas transparent</td>
        <td>/canvas-trans/</td>
        <td></td>
        <td>Use transparency and ignore background colour</td>
    </tr>
</table>

### Version
1.0

### License
GNU General Public License, version 2
http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
