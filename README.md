# Silverstripe Essential

Provides helpful functions for use in own templates in Silverstripe CMS.
Extends Silverstripe link module by a "Theme" dropdown for own button styles (Bootstrap naming by default).


## Requirements

* Silverstripe CMS 5.2 or higher
* [Silverstripe link module](https://github.com/silverstripe/silverstripe-linkfield)


## Installation

Install using Composer:

```sh
composer require minimalic/silverstripe-essential
```

Run from terminal:
`vendor/bin/sake dev/build "flush=all"`

Or, use your base URL with:
`/dev/build?flush=all`


## Basic usage

### link module

Use `$Theme` keyword inside your template.


## Configuration

### Custom theme options for the link module

Replace default theme dropdown options with custom options inside local `mysite.yml`:

```yaml
minimalic\Essential\Extensions\LinkExtension:
  theme_options:
    basic: Basic
    green: 'Green Theme'
```

To add more options to the default ones use `theme_options_additional`:

```yaml
minimalic\Essential\Extensions\LinkExtension:
  theme_options_additional:
    basic: Basic
    green: 'Green Theme'
```

The key (e.g. `green`) will be used inside the template. The value (e.g. `Green Theme`) is only for display purpose inside dropdown field.


## License

See [License](LICENSE)

Copyright (c) 2024, minimalic.com - Sebastian Finke
All rights reserved.
