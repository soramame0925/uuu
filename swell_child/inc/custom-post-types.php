<?php
if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * ショート動画専用のカスタム投稿タイプを追加。
 */
function swell_child_register_short_videos() {
    register_post_type(
        'short_videos',
        [
            'label'        => 'ショート動画',
            'public'       => true,
            'menu_position'=> 5,
            'menu_icon'    => 'dashicons-video-alt3',
            'supports'     => [ 'title', 'thumbnail' ],
            'has_archive'  => true,
            'show_in_rest' => true,
            'rewrite'      => [ 'slug' => 'shorts' ],
        ]
    );
}
add_action( 'init', 'swell_child_register_short_videos' );
