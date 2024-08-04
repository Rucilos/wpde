## 🎨 WordPress Development Environment (WPDE)

WordPress Development Environment (WPDE) is a fantastic starting point for creating a WordPress template. It includes responsive and accessibility design, necessary files, and features for proper template functioning, as well as a settings page.

![WPDE - Cover](https://cdn.df-barber.cz/wpde/cover.png)

## 🔍 Demo

Check out the [WPDE](https://github.com/rucilos/wpde/) template

## 🔧 Commands

| #  | Command                                                    | Description                                                |
|----|------------------------------------------------------------|------------------------------------------------------------|
| 1  | `npm install`                                              | Install NPM dependencies.                                  |
| 2  | `composer install`                                         | Install Composer dependencies.                             |
|    | `docker-compose run --rm composer install`                 | Install Composer dependencies inside a Docker container.   |
| 3  | `npm run start`                                            | Start the Webpack development server.                      |
| 4  | `npm run format`                                           | Run Prettier to format the code.                           |
| 5  | `npm run format-php`                                       | Run PHP CS Fixer to format PHP code.                       |
|    | `npm run format-php:docker`                                | Run PHP CS Fixer inside a Docker container.                |     
| 6  | `npm run lint-scripts`                                     | Run ESLint to lint JavaScript files.                       |
| 7  | `npm run lint-styles`                                      | Run Stylelint to lint CSS/SCSS/SASS files.                 |

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
-   Stylelint
-   Webpack

## ⚡ Features

### Front-end

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

Get current user info
```php
WPDE()->get_user($user_id);
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

### Back-end

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

Return `true` if the current page is the WPDE options page
```php
WPDE()->is_wpde();
```

Return `true` if the ACF plugin is activated
```php
WPDE()->is_acf();
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

## 🛡️  Security

Our application aims to ensure the highest level of security for user data and protect it against various types of attacks, including XSS (Cross-Site Scripting). To achieve this level of security, we implement the following measures:

- `WPDE`**Input Escaping**: All user inputs are thoroughly escaped to prevent the insertion of malicious code. This includes converting special characters, such as `<`, `>`, `&`, and others, into their HTML entities.

- `WPDE`**Use of Content Security Policy (CSP)**: We implement CSP, which serves as an additional security layer that helps detect and mitigate certain types of attacks, including XSS and data injection.

- `WPDE`**Input Validation and Sanitization**: All user inputs are validated and sanitized to ensure they meet expected formats and do not contain any malicious code.

- `Secure Libraries and Frameworks`: We use verified libraries and frameworks that have built-in protections against XSS and other security threats.

- `Regular Audits and Updates` 
We conduct regular security audits and updates of our code and dependencies to ensure we are protected against new and emerging threats.

## 🔑 License

Distributed under the **MIT** License. See [LICENSE](https://github.com/rucilos/wpde/blob/master/LICENSE) for more information.

## 🎉 Credits

© 2024 - present. Created and launched this project on Tuesday, February 6, 2024, by Jindřich Ručil.
