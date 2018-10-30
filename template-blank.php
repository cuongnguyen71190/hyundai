<?php
/**
 * Template Name: Blank Page
 */
get_header();
while ( have_posts() ) {
    the_post();
    echo '<div class="container">';
    the_content();
    echo '</div>';
}
get_footer();