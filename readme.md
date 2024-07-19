## WordPress Development Environment ("WPDE")

WordPress Development Environment ("WPDE") is a fantastic starting point for creating a WordPress template.  
Includes responsive and accessibility design, necessary files, and features for proper template functioning.

![WPDE - Cover](/.github/cover.png)

## Demo

Check out the [WPDE](https://wpde.jindrichrucil.com/) template

## Features
-   Breadcrumbs 
```php 
// Show breadcrumbs
<?php WPDE()->breadcrumbs(); ?>
```
-   Bootstrap 5 Pagination
```php 
// Show pagination
<?php WPDE()->pagination(); ?>
```
-   Light/Dark mode toggler
```php 
// Show theme toggler
<?php WPDE()->theme(); ?>
```

## Libraries

-   [Bootstrap](https://getbootstrap.com/)
-   [Bootstrap Navbar Walker](https://github.com/AlexWebLab/bootstrap-5-wordpress-navbar-walker)
-   [Font Awesome](https://fontawesome.com/)
-   [Cookie Consent](https://github.com/orestbida/cookieconsent)
-   [Magnific popup](https://dimsemenov.com/plugins/magnific-popup/)

## Development Tools

-   [SASS](https://sass-lang.com/)
-   [Webpack](https://webpack.js.org/)
-   [Prettier](https://prettier.io/)

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

## Changelog

See [CHANGELOG](https://github.com/rucilos/wpde/blob/master/changelog.md) for more information.

## Screenshots

### Light

Front Page
![WPDE - Screenshot 1](/.github/light/screen-1.png)

Blog page
![WPDE - Screenshot 2](/.github/light/screen-2.png)

404 Error page
![WPDE - Screenshot 3](/.github/light/screen-3.png)

Search page
![WPDE - Screenshot 4](/.github/light/screen-4.png)

Contacts page
![WPDE - Screenshot 5](/.github/light/screen-5.png)

### Dark

Front Page
![WPDE - Screenshot 1](/.github/dark/screen-1.png)

Blog page
![WPDE - Screenshot 2](/.github/dark/screen-2.png)

404 Error page
![WPDE - Screenshot 3](/.github/dark/screen-3.png)

Search page
![WPDE - Screenshot 4](/.github/dark/screen-4.png)

Contacts page
![WPDE - Screenshot 5](/.github/dark/screen-5.png)
