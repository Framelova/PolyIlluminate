<?php
function poly_illuminate_script_select_only_one()
{
    /*wp_register_script(
        "poly_illuminate_script_fetchData",
        plugins_url("../utils/fetchData.js", __FILE__),
        array(),
        POLY_ILLUMINATE_VERSION_SCRIPTS,
        true
    );*/

    wp_register_script(
        "poly-illuminate-select-only-one-script",
        plugins_url("../assets/js/select-only-one.js", __FILE__),
        array(),
        POLY_ILLUMINATE_VERSION_SCRIPTS,
        true
    );
}

add_action("wp_enqueue_scripts", "poly_illuminate_script_select_only_one");


function poly_illuminate_select_only_one()
{
    wp_localize_script(
        'wp-api',
        'wpApiSettings',
        array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        )
    );

    //wp_enqueue_script("poly_illuminate_script_fetchData");
    wp_enqueue_script("poly-illuminate-select-only-one-script");

    return "";
}

add_shortcode("poly_illuminate_select_only_one", "poly_illuminate_select_only_one");
