## WordPress Development Environment (WPDE)

WordPress Development Environment (WPDE) is a fantastic starting point for creating a WordPress template. It includes responsive and accessibility design, necessary files, and features for proper template functioning, as well as a settings page.

![WPDE - Cover](/.github/cover.png)

## Demo 🌍

Check out the [WPDE](https://wpde.jindrichrucil.com/) template

## Commands 🛠️🔧

```sh
# Bundles the application
npm run start

# Formats the codebase
npm run format

# Deletes the build JavaScript and CSS files
npm run clear
```

## Libraries 📚📖

-   Bootstrap
-   Bootstrap Navbar Walker
-   Font Awesome
-   Cookie Consent
-   Magnific popup

## Development Tools 🖥️💻

-   SASS
-   Webpack
-   Prettier

## Features 🚀⚡

```php
// Display breadcrumbs
WPDE()->breadcrumbs();
```

```php
// Display pagination
WPDE()->pagination();
```

```php
// Display a theme toggler
WPDE()->theme();
```

```php
// Register a custom post type
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
        'menu_icon' => false, // Does not make the taxonomy available in the REST API.
    )
);
```

```php
// Get the custom title
echo WPDE()->get_title(
    __('Title', 'wpde'),  // Title 
    __('Subtitle', 'wpde'),  // Subtitle 
    __('Description', 'wpde'),  // Description 
    array(
        'layout' => 'text-end', // Layout
        'border' => 'Enabled' // 'Enabled' or 'Disabled'
    )
);
```

## Requirements ⚡⚙️

-   **WordPress:** 6.0 or higher
-   **PHP:** 7.0 or higher
-   **ACF PRO:** 5.7.0 or higher

## Installation 💡

### Install from WordPress

1. **Download** `wpde.zip`
2. **Visit** Appearance > Themes > Add New Theme > Upload Theme > `wpde.zip` > Install Now > Activate
3. **Click** on the new menu item `Theme Setting` for better control of theme

### Manual Install

1. **Download** `wpde.zip`
2. **Extract & Upload** `wpde` folder to /wp-content/themes/
3. **Visit** Appearance > Themes > Search for `WPDE` > Activate
4. **Click** on the new menu item `Theme Setting` for better control of theme

## License 📄

Distributed under the **MIT** License. See [LICENSE](https://github.com/rucilos/wpde/blob/master/LICENSE) for more information.

## Credits ✨💼

🎉 Public Release v1.0.0 was launched on Saturday, February 6, 2024.
© 2024 Created by [Jindřich Ručil](https://jindrichrucil.com)
