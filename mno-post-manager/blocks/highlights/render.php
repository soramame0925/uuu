<?php
/**
 * Server-side rendering for the mno/highlights block.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'mno_pm_render_highlights_block' ) ) {
    /**
     * Extracts the highlights section from the existing single template output.
     *
     * @param array  $attributes Block attributes.
     * @param string $content    Block content.
     * @param WP_Block $block    Parsed block instance.
     *
     * @return string Highlights section HTML.
     */
    function mno_pm_render_highlights_block( $attributes, $content, $block ) {
        if ( ! function_exists( 'mno_pm_render_single_template' ) ) {
            return '';
        }

        $post_id = null;

        if ( is_array( $block->context ) && isset( $block->context['postId'] ) ) {
            $post_id = $block->context['postId'];
        }

        $full_markup = mno_pm_render_single_template( $post_id );

        if ( '' === trim( $full_markup ) ) {
            return '';
        }

        $libxml_previous_state = libxml_use_internal_errors( true );
        $document              = new DOMDocument();
        $loaded                = $document->loadHTML( '<?xml encoding="utf-8" ?>' . $full_markup );
        libxml_use_internal_errors( $libxml_previous_state );

        if ( ! $loaded ) {
            return '';
        }

        $xpath    = new DOMXPath( $document );
        $sections = $xpath->query( "//section[h2[text()='作品のみどころ']]");

        if ( ! $sections || 0 === $sections->length ) {
            return '';
        }

        $section = $sections->item( 0 );

        return $document->saveHTML( $section );
    }
}

return 'mno_pm_render_highlights_block';
