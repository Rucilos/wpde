<?php
/**
 * The main class of WPDE.
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit();
}

class WPDE {
    /**
     * The single instance of WordPress Development Environment ("WPDE").
     *
     * @var     object
     * @access  private
     * @since   1.0.0
     */
    private static $_instance = null; //phpcs:ignore

    /**
     * The version number.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_version; //phpcs:ignore

    /**
     * The token.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $_token; //phpcs:ignore

    /**
     * The main plugin file.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $file;

    /**
     * The theme dist URL.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $dist_url;

    /**
     * Suffix for scripts and styles.
     *
     * @var     string
     * @access  public
     * @since   1.0.0
     */
    public $script_suffix;

    /**
     * Lang domain.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $text_domain;

    /**
     * Lang folder.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $lang;

    /**
     * Style onload.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $onload;

    /**
     * Script async
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $async;

    /**
     * Script defer.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $defer;

    /**
     * Settings URL.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $settings_url;

    /**
     * The cdn.
     * @var string
     * @access public
     * @since 1.0.0
     */
    public $cdn;

    /**
     * Constructor
     *
     * Initializes the theme object with the specified file and version.
     * This constructor sets up various properties and hooks for the theme.
     * 
     * @param  string $file    File constructor
     * @param  string $version Theme version
     * @access public
     * @since 1.0.0
     */
    public function __construct($file = '', $version = '1.0.0') {
        $this->_version = $version;
        $this->_token = 'wpde';
        $this->text_domain = 'wpde';
        $this->lang = get_template_directory() . '/lang';

        $this->async = '-async';
        $this->defer = '-defer';
        $this->onload = '-onload';

        $this->file = $file;
        $this->dist_url = get_template_directory_uri() . '/dist/';
        $this->settings_url = admin_url() . 'themes.php?page=' . $this->_token;

        $this->cdn = 'https://cdn.jsdelivr.net/npm/';

        $this->script_suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

        register_activation_hook($this->file, [$this, 'install']);

        // Load async or defer
        add_filter('script_loader_tag', [$this, 'add_asyncdefer_attr'], 10, 2);
        add_filter('style_loader_tag', [$this, 'add_defer_attr'], 10, 2);

        // Load frontend CSS | JS
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles'], 10);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'], 10);

        // Load admin CSS | JS
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_scripts'], 10, 1);
        add_action('admin_enqueue_scripts', [$this, 'admin_enqueue_styles'], 10, 1);

        // Load login CSS | JS
        add_action('login_enqueue_scripts', [$this, 'login_enqueue_scripts'], 10, 1);
        add_action('login_enqueue_scripts', [$this, 'login_enqueue_styles'], 10, 1);

        // Initialize setup
        add_action('after_setup_theme', [$this, 'theme_setup']);

        // Load body classes
        add_filter('body_class', [$this, 'public_body_classes']);
        add_filter('admin_body_class', [$this, 'admin_body_classes']);
        add_filter('login_body_class', [$this, 'login_body_classes']);

        // Load admin components
        add_action('admin_menu', [$this, 'add_options_page']);
        add_action('wp_before_admin_bar_render', [$this, 'add_adminbar_tabs'], 999);
        add_action('admin_head', [$this, 'add_help_tabs']);
        if($this->is_acf()) {
            add_action('wp_dashboard_setup', [$this, 'add_dashboard_metabox']);
        }
        add_action('dashboard_glance_items', [$this, 'post_types_metaboxes']);
        add_action('pre_user_query', [$this, 'exclude_users']);
    } // END __construct()

    /**
     * Add async or defer attributes to script enqueues.
     *
     * This method adds async or defer attributes to script enqueues based on their handle.
     * If the handle contains 'async', it adds the async attribute.
     * If the handle contains 'defer', it adds the defer attribute.
     * If neither 'async' nor 'defer' is found in the handle, it returns the original HTML output.
     *
     * @param  string $html   The HTML output for the enqueued script.
     * @param  string $handle The script's registered handle.
     * @return string        The modified HTML output.
     * @access public
     * @since  1.0.0
     */
    public function add_asyncdefer_attr($html, $handle) {
        if (strpos($handle, 'async') !== false) {
            return str_replace('<script ', '<script async ', $html);
        } elseif (strpos($handle, 'defer') !== false) {
            return str_replace('<script ', '<script defer ', $html);
        } else {
            return $html;
        }
    } // END add_asyncdefer_attr()

    /**
     * Add defer attribute to style enqueues.
     *
     * This method adds the defer attribute to style enqueues with 'onload' in their handle.
     * It modifies the HTML output to include the defer attribute for such styles.
     *
     * @param  string $html   The HTML output for the enqueued style.
     * @param  string $handle The style's registered handle.
     * @return string        The modified HTML output.
     * @access public
     * @since  1.0.0
     */
    public function add_defer_attr($html, $handle) {
        if (strpos($handle, 'onload') !== false) {
            return str_replace('media=\'all\'', 'media="print" onload="this.media=\'all\'"', $html);
        }
        return $html;
    } // END add_defer_attr()

    /**
     * Load frontend stylesheets.
     *
     * This method loads necessary styles for the frontend of the website.
     *
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function enqueue_styles() {
        wp_register_style($this->_token . 'public', esc_url($this->dist_url) . 'css/public_styles' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . 'public');

        wp_register_style($this->_token . '-mfp' . $this->onload, esc_url($this->cdn) . 'magnific-popup@1.1.0/dist/' . 'magnific-popup' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . '-mfp' . $this->onload);

        wp_register_style($this->_token . '-c' . $this->onload, esc_url($this->cdn) . 'vanilla-cookieconsent@3.0.1/dist/' . 'cookieconsent' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . '-c' . $this->onload);

        wp_register_style($this->_token . '-icons' . $this->onload, esc_url($this->cdn) . 'bootstrap-icons@1.11.3/font/' . 'bootstrap-icons' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . '-icons' . $this->onload);
    } // END enqueue_styles ()

    /**
     * Load frontend Javascript.
     *
     * This method registers and enqueues scripts specifically for the front-end of the website.
     * It also localizes scripts for passing data from PHP to JavaScript.
     *
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function enqueue_scripts() {
        wp_register_script($this->_token . '-bs' . $this->defer, esc_url($this->cdn) . 'bootstrap@5.3.3/dist/js/' . 'bootstrap.bundle' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . '-bs' . $this->defer);

        wp_register_script($this->_token . '-c' . $this->defer, esc_url($this->cdn) . 'vanilla-cookieconsent@3.0.1/dist/' . 'cookieconsent.umd' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . '-c' . $this->defer);

        wp_register_script($this->_token . '-mfp' . $this->defer, esc_url($this->cdn) . 'magnific-popup@1.1.0/dist/' . 'jquery.magnific-popup' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . '-mfp' . $this->defer);

        wp_register_script($this->_token . $this->defer, esc_url($this->dist_url) . 'js/public' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . $this->defer);

        wp_register_script($this->_token . '-cc' . $this->defer, esc_url($this->dist_url) . 'js/cc' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . $this->defer);

        wp_localize_script($this->_token . $this->defer, $this->_token, [
            'dir' => get_template_directory_uri() . '/',
            'home_url' => home_url(),
        ]);
    } // END enqueue_scripts()

    /**
     * Load admin stylesheets.
     *
     * This method registers and enqueues stylesheets specifically for WordPress admin pages.
     *
     * @param  string $hook Hook parameter.
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function admin_enqueue_styles($hook = '') {
        wp_register_style($this->_token . '-admin', esc_url($this->dist_url) . 'css/admin_styles' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . '-admin');
    } // END admin_enqueue_styles()

    /**
     * Load admin Javascript.
     *
     * This method registers and enqueues scripts specifically for WordPress admin pages.
     * It also localizes scripts for passing data from PHP to JavaScript.
     *
     * @param  string $hook Hook parameter
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function admin_enqueue_scripts($hook = '') {
        wp_register_script($this->_token . '-admin', esc_url($this->dist_url) . 'js/admin' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . '-admin');

        wp_localize_script($this->_token . '-admin', $this->_token, []);
    } // END admin_enqueue_scripts()

    /**
     * Load login stylesheets.
     *
     * This method registers and enqueues stylesheets specifically for the WordPress login page.
     *
     * @param  string $hook Hook parameter.
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function login_enqueue_styles($hook = '') {
        wp_register_style($this->_token . '-login', esc_url($this->dist_url) . 'css/login_styles' . $this->script_suffix . '.css', [], $this->_version);
        wp_enqueue_style($this->_token . '-login');
    } // END login_enqueue_styles()

    /**
     * Login enqueue scripts.
     *
     * This method registers and enqueues scripts specifically for the WordPress login page.
     * It also localizes scripts for passing data from PHP to JavaScript.
     *
     * @param  string $hook Hook parameter
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function login_enqueue_scripts($hook = '') {
        wp_register_script($this->_token . '-login', esc_url($this->dist_url) . 'js/login' . $this->script_suffix . '.js', ['jquery'], $this->_version, true);
        wp_enqueue_script($this->_token . '-login');

        wp_localize_script($this->_token . '-login', $this->_token, []);
    } // END login_enqueue_scripts ()

    /**
     * Load front body classes.
     *
     * This method adds custom classes to the body tag on the front-end of the website.
     * These classes help in styling the front-end uniquely.
     *
     * @param  string $classes Classes body tag
     * @return string $classes
     * @access public
     * @since 1.0.0
     */
    public function public_body_classes($classes) {
        $classes[] = $this->_token . '-public';
        return $classes;
    } // END public_body_class()

    /**
     * Load admin body classes.
     *
     * This method adds custom classes to the body tag on WordPress admin pages.
     * These classes help in styling the admin area uniquely.
     *
     * @param string $classes The Class
     * @return string
     * @access public
     * @since 1.0.0
     */
    public function admin_body_classes($classes) {
        $this->is_wpde() ? ($css = $this->_token . '-settings ' . $this->_token . '-admin') : ($css = $this->_token . '-admin');
        $class = $css . ' ' . $classes;
        return $class;
    } // END admin_body_class()

    /**
     * Load login body classes.
     *
     * This method adds custom classes to the body tag on the WordPress login page.
     * These classes help in styling the login page uniquely.
     *
     * @param  string $classes Classes body tag
     * @access public
     * @since  1.0.0
     */
    public function login_body_classes($classes) {
        $classes[] = $this->_token . '-login';
        return $classes;
    } // END login_body_class()

    /**
     * Theme setup.
     *
     * This method initializes various theme supports and features, 
     * which are essential components for the proper functioning of the theme.
     * 
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function theme_setup() {
        load_theme_textdomain($this->text_domain, $this->lang);

        $post_formats = ['aside', 'image', 'gallery', 'video', 'audio', 'link', 'quote', 'status', 'chat', 'code', 'review', 'recipe', 'event', 'poll', 'tutorial', 'faq'];
        add_theme_support('post-formats', $post_formats);

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
        add_theme_support('wp-block-styles');
        add_theme_support('responsive-embeds');

        add_theme_support('woocommerce');

        add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

        add_theme_support('editor-styles');
        add_post_type_support('page', 'excerpt');

        register_nav_menus([
            'menu-1' => esc_html__('Navbar', 'wpde'),
            'menu-2' => esc_html__('Footer 1', 'wpde'),
            'menu-3' => esc_html__('Footer 2', 'wpde'),
            'menu-4' => esc_html__('Footer 3', 'wpde'),
            'menu-5' => esc_html__('Footer 4', 'wpde'),
        ]);

        // Register bootstrap navwalker
        require_once get_template_directory() . '/inc/class-bootstrap-navwalker.php';
    } // END theme_setup()

    /**
     * Adds admin options page.
     *
     * This method adds an admin options page to the WordPress admin area.
     * If the Advanced Custom Fields plugin is available, it creates a options page for theme options.
     *
     * @access  public
     * @since   1.0.0
     * @return  void
     */
    public function add_options_page() {
        if($this->is_acf()) {
            $parent = acf_add_options_page([
                'page_title' => 'WordPress - Development Environment ("WPDE")' . ' - ' . __('Theme Settings', 'wpde'),
                'menu_title' => __('Theme Settings', 'wpde'),
                'menu_slug' => $this->_token,
                'capability' => 'manage_options',
                'icon_url' => 'dashicons-admin-settings',
                'position' => 9999,
            ]);
        }
    }

    /**
     * Adds admin bar tabs.
     *
     * This method adds custom tabs to the WordPress admin bar.
     * It includes a link to the template settings.
     * Additionally, if not in the admin area, it adds tabs displaying the current template file name and post type.
     *
     * @param  object  $wp_admin_bar The WordPress admin bar object.
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function add_adminbar_tabs($wp_admin_bar) {
        global $wp_admin_bar;
        global $template;

        if($this->is_acf()) {
            $wp_admin_bar->add_node([
                'id' => $this->_token,
                'title' => "<span class='ab-icon'></span><span class='ab-label'>" . __("Theme Settings", "wpde") . "</span>",
                'href' => $this->settings_url,
            ]);
        } elseif(!$this->is_acf() && !is_admin()) {
            $wp_admin_bar->add_node([
                'id' => $this->_token,
                'title' => "<span class='ab-icon'></span><span class='ab-label'>WPDE</span>",
                'href' => false,
            ]);
        } 

        if (!is_admin()) {
            $wp_admin_bar->add_node([
                'id' => $this->_token . '-template',
                'parent' => $this->_token,
                'title' => __('Template:', 'wpde') . ' ' . basename($template),
                'href' => false,
            ]);
            $wp_admin_bar->add_node([
                'id' => $this->_token . '-post-type',
                'parent' => $this->_token,
                'title' => __('Post Type:', 'wpde') . ' ' . get_post_type(),
                'href' => false,
            ]);
        }
    } // END add_adminbar_tabs()

    /**
     * Adds admin help tabs.
     *
     * This method adds custom help tabs to the current screen in the WordPress admin area.
     * It provides information about the WordPress Development Environment ("WPDE").
     *
     * @access public
     * @return array Empty array.
     * @since 1.0.0
     */
    public function add_help_tabs() {
        $screen = get_current_screen();

        $content  = '<p><strong>WordPress - Development Environment ("WPDE") v' . esc_html($this->_version) . '</strong></p>';
        $content .= '<p>';
            $content .= '<a href="' . esc_url($this->settings_url) . '" class="apiru-link">' . __('Theme Settings', 'wpde') . '</a>';
            $content .= ' &#8212; ';
            $content .= '<a href="' . esc_url($this->settings_url) . '" class="apiru-link">' . __('GitHub', 'wpde') . '</a>';
        $content .= '</p>';
        $content .= '<p>' . __("WordPress - Development Environment (\"WPDE\") is a fantastic starting point for creating a WordPress template. Includes necessary files and features for proper template functioning.", 'wpde') . '</p>';

        $screen->add_help_tab([
            'id' => $this->_token,
            'title' => 'WPDE',
            'content' => $content,
            'callback' => '',
            'priority' => 999,
        ]);
    } // END add_help_tabs()

    /**
     * Adds or remove metaboxes to the admin dashboard.
     *
     * This method adds a custom metabox to the WordPress dashboard.
     * It includes a link to a document specified in the theme options.
     *
     * @return string Empty string.
     * @access public
     * @since  1.0.0
     */
    public function add_dashboard_metabox() {
        
        add_meta_box($this->_token . '-dashboard-metabox', __('Documentation', 'wpde'), 'wpde_dashoard_metabox', 'dashboard', 'side', 'high');
        
        function wpde_dashoard_metabox() {

            $html = '<div class="main">';
            
            $file = get_field('docs', 'option');
            if ($file) {
                $html .= '<a href="' . esc_url($file['url']) . '">' . esc_html($file['filename']) . '</a>';
            }

            $html .= '</div>';

            echo $html;
        } // END wpde_dashoard_metabox()

    } // END add_dashboard_metabox()

    /**
     * Removes metaboxes from specified post types.
     *
     * This method removes the metaboxes from all public post types.
     * It is typically used to customize the editing interface by removing unnecessary metaboxes.
     *
     * @return string Empty string.
     * @access public
     * @since  1.0.0
     */
    public function post_types_metaboxes() {
        $post_types = get_post_types(['public' => true], 'names');
        foreach ($post_types as $post_type) {
            remove_meta_box('aam-access-manager', $post_type, 'advanced');
        }
    }

    /**
     * Exclude certain users from a search query.
     *
     * This function modifies the search query to exclude a user with a specific username,
     * typically used to hide the user from search results.
     * 
     * @param  $user_search The WP_User_Query object representing the user search.
     * @return void
     * @access public
     * @since  1.0.0
     */
    public function exclude_users($user_search) {
        if (!current_user_can('administrator')) {
            global $current_user;
            $username = $current_user->user_login;

            if ($username != 'admin') {
                global $wpdb;
                $user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login != 'admin'", $user_search->query_where);
            }
        }
    }

    /**
     * Checks the activation of the ACF plugin.
     *
     * This method checks if the required plugin is active.
     * If it's active, it returns true; otherwise, it returns false.
     *
     * @param bool $pro Whether to check for ACF PRO version.
     *                  If true, it checks for ACF_PRO class existence; otherwise, it checks for any ACF class existence.
     *
     * @access public
     * @return bool
     * @since  1.0.0
     */
    public function is_acf() {
        return class_exists('ACF_PRO');
    }

    /**
     * Checks if the current page is a WPDE (WordPress Development Environment) page.
     *
     * This function determines whether the current page is part of the WordPress Development Environment (WPDE)
     * based on the presence of a specific token in the page URL. It is typically used within the admin area.
     *
     * @return boolean True if the current page is a WPDE page, false otherwise.
     * @access public
     * @since  1.0.0
     */
    public function is_wpde() {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $token = $this->_token;
            if (is_admin() && strpos($page, $token) !== false) {
                return true;
            }
        }
    } // END is_wpde()

    /**
     * Load pagination with Bootstrap 5 styles.
     *
     * This function generates pagination links with Bootstrap 5 styles.
     * It extends the default WordPress pagination and displays the pagination links along with information 
     * about the number of results being shown on the current page out of total results.
     *
     * @param   array $args {
     *     Optional. Array of arguments for customizing the pagination output.
     *
     *     @type int    $mid_size   How many numbers to either side of the current page.
     *     @type string $prev_text  Text to display for the previous page link.
     *     @type string $next_text  Text to display for the next page link.
     *     @type string $type       Controls format of the returned value. Possible values are 'array', 'list', or 'echo'.
     * }
     * @return  string HTML output of the paginated links with Bootstrap 5 styles.
     * @access  public
     * @since   1.0.0
     */
    public function pagination($args = []) {
        $defaults = [
            'mid_size' => 2,
            'prev_text' => __('Předchozí', 'wpde'),
            'next_text' => __('Následující', 'wpde'),
            'type' => 'array',
        ];

        $args = wp_parse_args($args, $defaults);
        $links = paginate_links($args);

        if ($links) {
            global $wp_query;
            $total_posts = $wp_query->found_posts;
            $posts_per_page = get_query_var('posts_per_page');
            $current_page = max(1, get_query_var('paged'));

            $start = ($current_page - 1) * $posts_per_page + 1;
            $end = min($total_posts, $current_page * $posts_per_page);


            $html = '<div class="d-flex justify-content-between my-4 pt-3 border-top">';
                $html .= '<p class="text-muted">Showing ' . $start . ' to ' . $end . ' of ' . $total_posts . ' results</p>'; 
                $html .= '<nav aria-label="Pagination">';
                    $html .= '<ul class="pagination">';

                        foreach ($links as $link) {
                            if (strpos($link, 'current') !== false) {
                                $html .= "<li class='page-item active' aria-current='page'>" . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            } else {
                                $html .= "<li class='page-item'>" . str_replace('page-numbers', 'page-link', $link) . '</li>';
                            }
                        }

                    $html .= '</ul>';
                $html .= '</nav>';
            $html .= '</div>';

            echo $html;
        }
    }

    /**
     * Load breadcrumbs for navigation.
     *
     * This function generates breadcrumb navigation for pages and posts, providing users with a trail
     * of links to navigate back to parent pages, categories, archives, or search results.
     *
     * @return string HTML output of the breadcrumb navigation.
     * @access public
     */
    public function breadcrumbs() {
        if (is_front_page()) {
            return;
        }

        global $post;
        $custom_taxonomy = '';

        $defaults = [
            'home' => '<i class="fa-solid fa-house"></i>' . esc_html(__('Úvod', 'wpde')),
            'id' => $this->_token . '-breadcrumbs',
        ];

        // Start breadcrumb with a link to your homepage
        echo '<nav id="' . $defaults['id'] . '" aria-label="breadcrumb" class="container">';
        echo '<ol class="breadcrumb mb-0 mt-3">';
        echo '<small class="d-flex">';

        // Creating home link
        echo "<li class='breadcrumb-item'><a href='" . get_home_url() . "'>" . $defaults['home'] . '</a></li>';

        // Single
        if (is_single()) {
            $post_type = get_post_type();

            // If post type is not 'post'
            if ($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_link = get_post_type_archive_link($post_type);
                echo "<li class='breadcrumb-item'><a href='" . $post_type_link . "'>" . $post_type_object->labels->name . '</a></li>';
            }

            // Get categories
            $category = get_the_category($post->ID);

            // If category not empty
            if (!empty($category)) {
                // Arrange category parent to child
                $category_values = array_values($category);
                $get_last_category = end($category_values);
                $get_parent_category = rtrim(get_category_parents($get_last_category->term_id, true, ','), ',');
                $cat_parent = explode(',', $get_parent_category);

                // Store category in $display_category
                $display_category = '';
                foreach ($cat_parent as $p) {
                    $display_category .= "<li class='breadcrumb-item'>" . $p . '</li>';
                }
            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);

            if (empty($get_last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                $taxonomy_terms = get_the_terms($post->ID, $custom_taxonomy);
                $cat_id = $taxonomy_terms[0]->term_id;
                $cat_link = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name = $taxonomy_terms[0]->name;
            }

            // Check if the post is in a category
            if (!empty($get_last_category)) {
                echo $display_category;
                echo "<li class='breadcrumb-item'>" . get_the_title() . '</li>';
            } elseif (!empty($cat_id)) {
                echo "<li class='breadcrumb-item'><a href='" . $cat_link . "'>" . $cat_name . '</a></li>';
                echo "<li class='breadcrumb-item'>" . get_the_title() . '</li>';
            } else {
                echo '<li>' . get_the_title() . '</li>';
            }

            // Archive product
        } elseif (is_post_type_archive('product')) {
            $post_type = get_post_type();
            $post_type_object = get_post_type_object($post_type);
            echo "<li class='breadcrumb-item'>" . $post_type_object->labels->name . '</li>';

            // Archive
        } elseif (is_archive()) {
            // Taxonomy
            if (is_tax()) {
                $post_type = get_post_type();

                // If post type is not post
                if ($post_type != 'post') {
                    $post_type_object = get_post_type_object($post_type);
                    $post_type_link = get_post_type_archive_link($post_type);
                    echo "<li class='breadcrumb-item'><a href='" . $post_type_link . "'>" . $post_type_object->labels->name . '</a></li>';
                }

                $custom_tax_name = get_queried_object()->name;
                echo "<li class='breadcrumb-item'>" . $custom_tax_name . '</li>';

                // Category
            } elseif (is_category()) {
                $parent = get_queried_object()->category_parent;
                if ($parent !== 0) {
                    $parent_category = get_category($parent);
                    $category_link = get_category_link($parent);
                    echo "<li class='breadcrumb-item'><a href='" . esc_url($category_link) . "'>" . $parent_category->name . '</a></li>';
                }
                echo "<li class='breadcrumb-item'>" . single_cat_title('', false) . '</li>';

                // Tag
            } elseif (is_tag()) {
                // Get tag information
                $term_id = get_query_var('tag_id');
                $taxonomy = 'post_tag';
                $args = 'include=' . $term_id;
                $terms = get_terms($taxonomy, $args);
                $get_term_name = $terms[0]->name;

                // Display the tag name
                echo "<li class='breadcrumb-item'>" . $get_term_name . '</li>';
            } elseif (is_day()) {
                // Day archive
                // Year link
                echo "<li><a href='" . get_year_link(get_the_time('Y')) . "'>" . get_the_time('Y') . ' Archiv</a></li>';
                // Month link
                echo "<li><a href='" . get_month_link(get_the_time('Y'), get_the_time('m')) . "'>" . get_the_time('M') . ' Archiv</a></li>';
                // Day display
                echo "<li class='breadcrumb-item'>" . get_the_time('jS') . ' ' . get_the_time('M') . ' Archiv</li>';
            } elseif (is_month()) {
                // Month archive
                // Year link
                echo "<li class='breadcrumb-item'><a href='" . get_year_link(get_the_time('Y')) . "'>" . get_the_time('Y') . ' Archiv</a></li>';
                // Month Display
                echo "<li class='breadcrumb-item'>" . get_the_time('M') . ' Archiv</li>';
            } elseif (is_year()) {
                // Year Display
                echo "<li class='breadcrumb-item'>" . get_the_time('Y') . ' Archiv</li>';
            } elseif (is_author()) {
                // Auhor archive
                // Get the author information
                global $author;
                $userdata = get_userdata($author);
                // Display author name
                echo "<li class='breadcrumb-item'>" . 'Autor: ' . $userdata->display_name . '</li>';
            } else {
                echo "<li class='breadcrumb-item'>" . post_type_archive_title() . '</li>';
            }

            // Page
        } elseif (is_page()) {
            // Standard page
            if ($post->post_parent) {
                // If child page, get parents
                $anc = get_post_ancestors($post->ID);

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loopfa-2x
                if (!isset($parents)) {
                    $parents = null;
                }
                foreach ($anc as $ancestor) {
                    $parents .= "<li class='breadcrumb-item'><a href='" . get_permalink($ancestor) . "'>" . get_the_title($ancestor) . '</a></li>';
                }
                // Display parent pages
                echo $parents;

                // Current page
                echo "<li class='breadcrumb-item'>" . get_the_title() . '</li>';
            } else {
                // Just display current page if not parents
                echo "<li class='breadcrumb-item'>" . get_the_title() . '</li>';
            }

            // Search
        } elseif (is_search()) {
            echo "<li class='breadcrumb-item'>Výsledky vyhledávání pro: <strong>" . get_search_query() . '</strong></li>';
            // 404
        } elseif (is_404()) {
            echo "<li class='breadcrumb-item'>" . 'Error 404' . '</li>';
        }

        // End breadcrumbs
        echo '</small>';
        echo '</ol>';
        echo '</nav>';
    }

    /**
     * Main WPDE Instance.
     *
     * Ensures that only one instance of WPDE is loaded or can be loaded.
     * This method is responsible for creating and returning the singleton instance of the WPDE class.
     *
     * @param  string $version The version parameter.
     * @access public
     * @static
     * @return Object|WPDE The WPDE instance.
     * @see    WPDE()
     * @since  1.0.0
     */
    public static function instance($version = '1.0.0') {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($version);
        }

        return self::$_instance;
    } // END instance()

    /**
     * Prevents cloning of the WPDE instance.
     *
     * This magic method is invoked when an attempt is made to clone the WPDE instance,
     * and it throws an error indicating that cloning of the WPDE instance is forbidden.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function __clone() {
        _doing_it_wrong(__FUNCTION__, esc_html(__('Cloning of WPDE is forbidden')), esc_attr($this->_version));
    } // END __clone()

    /**
     * Prevents unserializing instances of the WPDE class.
     *
     * This magic method is invoked when an attempt is made to unserialize an instance of the WPDE class,
     * and it throws an error indicating that unserializing instances of the WPDE class is forbidden.
     *
     * @access public
     * @return void
     * @since 1.0.0
     */
    public function __wakeup() {
        _doing_it_wrong(__FUNCTION__, esc_html(__('Unserializing instances of WPDE is forbidden')), esc_attr($this->_version));
    } // END __wakeup()

    /**
     * Installation method, runs on activation.
     *
     * This method is called during plugin or theme activation to perform installation tasks.
     * It typically includes actions like logging the version number.
     *
     * @access public
     * @return void
     * @since  1.0.0
     */
    public function install() {
        $this->_log_version_number();
    } // END install()

    /**
     * Log the theme version number.
     *
     * This method updates the theme version number in the WordPress options table.
     * It is intended to be called internally within the theme or plugin code.
     *
     * @access private
     * @return void
     * @since  1.0.0
     */
    private function _log_version_number() {
        //phpcs:ignore
        update_option($this->_token . '_version', $this->_version);
    } // END _log_version_number()
} // END Apiru::

