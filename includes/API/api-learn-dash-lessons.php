<?php

/* -------------------------------------------------------------------------- */
/*                     REGISTER ROUTES LEARN DASH LESSONS                     */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                                  LIBRARIES                                 */
/* -------------------------------------------------------------------------- */

include(ABSPATH . 'wp-admin/upgrade-functions.php'); // for dbDelta
require_once(ABSPATH . 'wp-admin/includes/upgrade.php'); // for dbDelta

/* -------------------------------------------------------------------------- */
/*                                   ROUTES                                   */
/* -------------------------------------------------------------------------- */
function poly_illuminate_getLessonsCompletedByUser()
{
    register_rest_route(
        "polly-illuminate/v1",
        "lessons-completed-by-user",
        array(
            "methods" => "GET",
            "callback" => "poly_illuminate_getLessonsCompletedByUser_callback"
        )
    );
}

function poly_illuminate_getLessonsCompletedByUser_callback($request)
{

    global $table_prefix, $wpdb, $current_user;
    $learndash_user_activity = $table_prefix . 'learndash_user_activity';
    $learndash_post = $table_prefix . 'posts';

    //Validate user is logged
    $loggedin = is_user_logged_in();

    if (!$loggedin) {

        return new WP_Error(
            "not_logged_in",
            "You must be logged in to access this endpoint",
            array(
                "status" => 403
            )
        );
    }

    //Get info user logged
    wp_get_current_user();

    //Search all lesson completed by user
    $getLessonsCompletedQry = "SELECT A.*, B.post_title FROM $learndash_user_activity A
    LEFT JOIN $learndash_post B
    ON A.post_id = B.ID
    WHERE A.user_id = {$current_user->ID} 
    AND A.activity_completed IS NOT NULL 
    AND A.activity_completed != '0'
    AND A.activity_type = 'lesson'";

    /* -------------------------------------------------------------------------- */
    /*                        Get hostory products matched                        */
    /* -------------------------------------------------------------------------- */

    $lessonsCompleted = $wpdb->get_results($getLessonsCompletedQry);

    return new WP_REST_Response(
        $lessonsCompleted,
        200
    );
}

add_action("rest_api_init", "poly_illuminate_getLessonsCompletedByUser");
