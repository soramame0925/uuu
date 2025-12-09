<?php
/*
Template Name: トップページ（最新一覧）
*/
get_header();

$query = new WP_Query( [
  'post_type'      => 'post',
  'posts_per_page' => 12,
  'orderby'        => 'date',
  'order'          => 'DESC',
] );

if ( $query->have_posts() ) :
  echo '<div class="mno-grid">';
  while ( $query->have_posts() ) :
    $query->the_post();
    get_template_part( 'template-parts/card' );
  endwhile;
  echo '</div>';
  wp_reset_postdata();
endif;

get_footer();
