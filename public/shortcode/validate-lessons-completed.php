<?php
function poly_illuminate_script_validate_lesson_completed()
{
    wp_register_script(
        "poly_illuminate_script_fetchData",
        plugins_url("../utils/fetchData.js", __FILE__),
        array(),
        POLY_ILLUMINATE_VERSION_SCRIPTS,
        true
    );

    wp_register_script(
        "poly-illuminate-validate-lessons-script",
        plugins_url("../assets/js/validate-lessons-completed.js", __FILE__),
        array(),
        POLY_ILLUMINATE_VERSION_SCRIPTS,
        true
    );
}

add_action("wp_enqueue_scripts", "poly_illuminate_script_validate_lesson_completed");


function poly_illuminate_validate_lessons_completed()
{
    wp_localize_script(
        'wp-api',
        'wpApiSettings',
        array(
            'root' => esc_url_raw(rest_url()),
            'nonce' => wp_create_nonce('wp_rest')
        )
    );

    wp_enqueue_script("poly_illuminate_script_fetchData");
    wp_enqueue_script("poly-illuminate-validate-lessons-script");

    return "";
}

add_shortcode("poly_illuminate_validator", "poly_illuminate_validate_lessons_completed");
