## WordPress Development Environment (WPDE)

WordPress Development Environment (WPDE) is a fantastic starting point for creating a WordPress template. It includes responsive and accessibility design, necessary files, and features for proper template functioning, as well as a settings page.

![WPDE - Cover](/.github/cover.png)

## 🌍 Demo

Check out the [WPDE](https://wpde.jindrichrucil.com/) template

## 🔧 Commands

Install dependencies 
```sh
npm install
composer install
```

*Run Webpack*
```sh
npm run start
```

Run Prettier
```sh
npm run format
```

Run PHP CS Fixer
```sh
npm run phpformat
```

## 📚 Libraries

-   Cookie Consent
-   Bootstrap
-   Bootstrap Navbar Walker
-   Font Awesome
-   Magnific popup
-   Swiper

## 🖥️ Development Tools
-   Composer
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

```php
// Register a custom taxonomy
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

## ⚙️ Requirements

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

## 📄 License

Distributed under the **MIT** License. See [LICENSE](https://github.com/rucilos/wpde/blob/master/LICENSE) for more information.

## 🎉 Credits

© 2024 Created by [Jindřich Ručil](https://jindrichrucil.com). Public Release v1.0.0 was launched on Tuesday, February 6, 2024.
