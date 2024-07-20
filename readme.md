## WordPress Development Environment (WPDE)

WordPress Development Environment (WPDE) is a fantastic starting point for creating a WordPress template.  
Includes responsive and accessibility design, necessary files, and features for proper template functioning.

![WPDE - Cover](/.github/cover.png)

## Demo

Check out the [WPDE](https://wpde.jindrichrucil.com/) template

## Features

```php
// Display breadcrumbs
<?php WPDE()->breadcrumbs(); ?>
```

```php
// Display pagination
<?php WPDE()->pagination(); ?>
```

```php
// Display a theme toggler
<?php WPDE()->theme(); ?>
```

```php
// Register a custom post type
<?php
WPDE()->register_post_type(
    'events', // Post type key
    __( 'Events', 'wpde' ), // Plural name
    __( 'Event', 'wpde' ) // Singular name
);
?>
```

```php
<?php
// Register a custom taxonomy
WPDE()->register_taxonomy(
    'location', // Taxonomy key
    __( 'Locations', 'wpde' ), // Plural name
    __( 'Location', 'wpde' ), // Singular name
    'events' // Associated post type
);
?>
```

## Libraries

- Bootstrap
- Bootstrap Navbar Walker
- Font Awesome
- Cookie Consent
- Magnific popup

## Development Tools

- SASS
- Webpack
- Prettier

## Commands

```sh
# Bundles the application
npm run start

# Formats the codebase
npm run format

# Deletes the build JavaScript and CSS files
npm run clear
```

## Requirements

-   **WordPress:** 6.0 or higher
-   **PHP:** 7.0 or higher
-   **ACF PRO:** 5.0 or higher

## Installation

### Install from WordPress

1. **Download** "WPDE"
2. **Visit** Appearance > Themes > Add New Theme > Upload Theme > wpde.zip > Install Now > Activate
3. **Click** on the new menu item "Theme Settings" for better control of theme

### Manual Install

1. **Download** "WPDE"
2. **Extract & Upload** "wpde" folder to /wp-content/themes/
3. **Visit** Appearance > Themes > Search for WPDE > Activate
4. **Click** on the new menu item "Theme Settings" for better control of theme

## License

Distributed under the **MIT** License. See [LICENSE](https://github.com/rucilos/wpde/blob/master/LICENSE) for more information.

## Credits

© 2024 Created by [Jindřich Ručil](https://jindrichrucil.com)
