<?php
/**
 * Template Name: About Page
 */
get_header();
while ( have_posts() ) {
    the_post();
    echo '<div class="container about">';
    the_content();
    echo '</div>';
}
get_footer();