# Gregwar Image

The Gregwar Image plugin provide a simple object-oriented images handling and caching API with [Gregwar Image Class](https://github.com/Gregwar/Image).

## Installation
See [this instruction](http://morfy.org/documentation/plugins/plugins-installation)

## Usage in page content

```
!(Image)[{Image open="themes/default/assets/img/morfy-logo.png" width=100 height=100}]
```

### Parameters

| name  | description |
|---|---|
| open | Set image file to open |
| width | Set image width |
| height | Set image height |
| resize_method | Set image resize method, accepted values: `scale` `force` `crop` `zoom`  |
| contrast | Set image contrast effect (from -100 to +100) |
| brighness | Set image brighness effect (from -255 to +255) |
| smooth | Set image smooth |
| negate | Set image negate filter, accepted values: `true` |
| sepia | Set image sepia filter, accepted values: `true` |
| sharp | Set image sharp filter, accepted values: `true` |
| edge | Set image edge filter, accepted values: `true` |
| emboss | Set image emboss filter, accepted values: `true` |
| grayscale | Set image grayscale filter, accepted values: `true` |
| colorize | Set image colorize, accepted values: `true` |
| red | Set red color |
| green | Set green color |
| blue | Set blue color |
| x | Set x |
| y | Set y |
| background | Set image background color |
| angle | Set image angle |
| font | Set font name |
| text | Set text |
| size | Set font size |
| position | Set text position |


## Usage in template

In the templates you have a full power of [Gregwar Image Class](https://github.com/Gregwar/Image).

```smarty
<img src="{Image::open('themes/default/assets/img/morfy-logo.png')->resize(100, 100)}" />
```

## Options

| name  | value | description |
|---|---|---|
| enabled | true | or `false` to disable the plugin |

## License
See  [LICENSE](https://github.com/morfy-cms/morfy-plugin-gregwar-image/blob/master/LICENSE)
