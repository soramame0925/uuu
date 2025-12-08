<?php
if ( ! defined( 'ABSPATH' ) ) {
    return;
}

/**
 * Enqueue child theme assets.
 */
function swell_child_enqueue_assets() {
    $child_dir = get_stylesheet_directory();
    $child_uri = get_stylesheet_directory_uri();

    $style_path    = $child_dir . '/style.css';
    $style_version = file_exists( $style_path ) ? filemtime( $style_path ) : null;

    wp_enqueue_style( 'swell-child-style', get_stylesheet_uri(), [], $style_version );

    // トップページテンプレート用スタイル。
    if ( is_page_template( 'page-top.php' ) ) {
        $top_css = $child_dir . '/assets/css/top-page.css';
        wp_enqueue_style(
            'mno-top',
            $child_uri . '/assets/css/top-page.css',
            [],
            file_exists( $top_css ) ? filemtime( $top_css ) : null
        );
    }

    // Discoverページ用スタイルとスクリプト。
    if ( is_page_template( 'page-discover.php' ) ) {
        $discover_css = $child_dir . '/assets/css/discover.css';
        $discover_js  = $child_dir . '/assets/js/discover.js';

        wp_enqueue_style(
            'mno-discover',
            $child_uri . '/assets/css/discover.css',
            [],
            file_exists( $discover_css ) ? filemtime( $discover_css ) : null
        );

        wp_enqueue_script(
            'mno-discover',
            $child_uri . '/assets/js/discover.js',
            [],
            file_exists( $discover_js ) ? filemtime( $discover_js ) : null,
            true
        );
    }

    // シングルページ向けスタイル。
    if ( is_single() ) {
        $single_css = $child_dir . '/assets/css/single.css';
        wp_enqueue_style(
            'mno-single',
            $child_uri . '/assets/css/single.css',
            [],
            file_exists( $single_css ) ? filemtime( $single_css ) : null
        );
    }

    // 画像ズーム防止スクリプト（ギャラリー向け）。
    $no_zoom_js = $child_dir . '/assets/js/no-zoom.js';
    if ( is_singular() && file_exists( $no_zoom_js ) ) {
        wp_enqueue_script(
            'mno-no-zoom',
            $child_uri . '/assets/js/no-zoom.js',
            [],
            filemtime( $no_zoom_js ),
            true
        );
    }
}
add_action( 'wp_enqueue_scripts', 'swell_child_enqueue_assets', 20 );
