<?php

/**
 * Plugin Name:       Poly Illuminate  
 * Plugin URI:        https://github.com/Framelova/PolyIlluminate
 * Description:       Combina el comportamiento de LearnDash con Image Map Pro para iluminar svg cuando una leccion fue terminada
 * Version:           1.0
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * Author:            Framelova <contacto@framelova.com>
 * Author URI:        https://github.com/Framelova
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       framelova
 */

/* -------------------------------------------------------------------------- */
/*                                    CONST                                   */
/* -------------------------------------------------------------------------- */
define("POLY_ILLUMINATE_VERSION_SCRIPTS", "1.8.0");

/* -------------------------------------------------------------------------- */
/*                                  API REST                                  */
/* -------------------------------------------------------------------------- */

require_once plugin_dir_path(__FILE__) . "/includes/API/api-learn-dash-lessons.php";

/* -------------------------------------------------------------------------- */
/*                                 Shortcodes                                 */
/* -------------------------------------------------------------------------- */

require_once plugin_dir_path(__FILE__) . "/public/shortcode/validate-lessons-completed.php";
require_once plugin_dir_path(__FILE__) . "/public/shortcode/select-only-one.php";

/* -------------------------------------------------------------------------- */
/*                                    Hooks                                   */
/* -------------------------------------------------------------------------- */

function poly_illuminate_plugin_activate()
{
}

function poly_illuminate_plugin_desactivate()
{
}

register_activation_hook(__FILE__, "poly_illuminate_plugin_activate");
register_deactivation_hook(__FILE__, "poly_illuminate_plugin_desactivate");
