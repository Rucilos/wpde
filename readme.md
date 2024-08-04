## 🎨 WordPress Development Environment (WPDE)

WordPress Development Environment (WPDE) is a fantastic starting point for creating a WordPress template. It includes responsive and accessibility design, necessary files, and features for proper template functioning, as well as a settings page.

![WPDE - Cover](https://cdn.df-barber.cz/wpde/cover.png)

## 🔍 Demo

Check out the [WPDE](https://github.com/rucilos/wpde/) template

## 🔧 Commands

Install NPM dependencies 
```sh
npm install
```

Install Composer dependencies 
```sh
composer install
npm run composer-install-docker # For Docker Container
```

Webpack
```sh
npm run start
```

Prettier
```sh
npm run format
```

PHP CS Fixer
```sh
npm run format-php
npm run format-php-docker # For Docker Container
```

ESLint
```sh
npm run lint
```

## 🧪 Libraries

-   Bootstrap
-   Bootstrap Navbar Walker
-   Cookie Consent
-   Font Awesome
-   Magnific Popup

## 🖥️ Development Tools
-   Composer
-   ESLint
-   Node.js
-   PHP CS Fixer
-   Prettier
-   SASS
-   Webpack

## ⚡ Features

Display breadcrumbs
```php
WPDE()->breadcrumbs();
```

Display pagination
```php
WPDE()->pagination();
```

Display a theme toggler
```php
WPDE()->theme();
```

Display the custom title
```php
WPDE()->the_title(
    __('Title', 'wpde'),  // Title
    __('Subtitle', 'wpde'),  // Subtitle
    __('Description', 'wpde'),  // Description
    array(
        'layout' => 'text-end', // Layout
        'border' => 'Enabled' // 'Enabled' or 'Disabled'
    )
);
```

Register a custom post type
```php
WPDE()->register_post_type(
    'events', // Post type key
    __( 'Events', 'wpde' ), // Plural name
    __( 'Event', 'wpde' ), // Singular name
    __( 'Custom post type "Events"', 'wpde' ), // Description
    array(
        'menu_icon' => 'dashicons-location', // Change the menu icon
    )
);
```

Register a custom taxonomy
```php
WPDE()->register_taxonomy(
    'location', // Taxonomy key
    __( 'Locations', 'wpde' ), // Plural name
    __( 'Location', 'wpde' ), // Singular name
    'events', // Associated post type
    array(
        'show_in_rest' => false, // Does not make the taxonomy available in the REST API.
    )
);
```

## 🎯 Requirements

### Production
-   **WordPress:** 6.0 or higher
-   **PHP:** 7.4 or higher
-   **ACF PRO:** 5.7.0 or higher

### Development
-   **Node.js** 18.x or higher
-   **Composer** 1.0 or higher

## 💡 Installation 

### Install from WordPress

1. **Download** `wpde.zip`
2. **Visit** Appearance > Themes > Add New Theme > Upload Theme > `wpde.zip` > Install Now > Activate
3. **Click** on the new menu item `WPDE` for better control of theme

### Manual Install

1. **Download** `wpde.zip`
2. **Extract & Upload** `wpde` folder to /wp-content/themes/
3. **Visit** Appearance > Themes > Search for `WPDE` > Activate
4. **Click** on the new menu item `WPDE` for better control of theme

## 🏷️ License

Distributed under the **MIT** License. See [LICENSE](https://github.com/rucilos/wpde/blob/master/LICENSE) for more information.

## 🎉 Credits

© 2024 - present Created by Jindřich Ručil and launched this project on Tuesday, February 6, 2024.