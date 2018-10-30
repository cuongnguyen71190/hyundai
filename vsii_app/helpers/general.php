<?php
if(!function_exists('vsii_get_sidebar_ids'))
{
    function vsii_get_sidebar_ids($for_optiontree=false)
    {
        global $wp_registered_sidebars;
        $r=array();
        $r[]=esc_html__('--Select--',"vsii-template");
        if(!empty($wp_registered_sidebars)){
            foreach($wp_registered_sidebars as $key=>$value)
            {

                if($for_optiontree){
                    $r[]=array(
                        'value'=>$value['id'],
                        'label'=>$value['name']
                    );
                }else{
                    $r[$value['id']]=$value['name'];
                }
            }

        }
        return $r;
    }
}

if(!function_exists('vsii_comment_nav'))
{
    function vsii_comment_nav()
    {
        // Are there comments to navigate through?
        if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
            ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', "vsii-template" ); ?></h2>
                <div class="nav-links">
                    <?php
                    if ( $prev_link = get_previous_comments_link(esc_html__( 'Older Comments', "vsii-template" ) ) ) :
                        printf( '<div class="nav-previous">%s</div>', $prev_link );
                    endif;

                    if ( $next_link = get_next_comments_link(esc_html__( 'Newer Comments', "vsii-template" ) ) ) :
                        printf( '<div class="nav-next">%s</div>', $next_link );
                    endif;
                    ?>
                </div><!-- .nav-links -->
            </nav><!-- .comment-navigation -->
            <?php
        endif;
    }
}

if (!function_exists('vsii_get_sidebar'))
{
    function vsii_get_sidebar()
    {
        $default = array(
            'position' => 'right',
            'id'       => 'blog-sidebar'
        );

        return apply_filters('vsii_get_sidebar', $default);
    }
}
if (!function_exists('vsii_breadcrumb'))
{
    function vsii_breadcrumb()
    {
        if (!is_home()) {
            echo "<ol class=\"breadcrumb\">";
            echo '<li><a href="';
            echo esc_url(home_url());
            echo '">';
            echo esc_html__('Home',"vsii-template");
            echo "</a></li>  ";
            if(is_archive()){
            }elseif(is_single() or is_page())
            {
                echo "<li class='active'><a>".get_the_title()."</a></li>";
            }elseif(is_404()){
                echo "<li class='active'>".esc_html__('404 Page',"vsii-template")."</li>";
            }
            echo "</ul>";
        }else{
            echo "<ul class='breadcrumb'>";
            echo '<li><a href="';
            echo esc_url(home_url());
            echo '">';
            echo esc_html__('Home',"vsii-template");
            echo "</a></li><li class='active'><a>".esc_html__('Blog',"vsii-template")."</a></li>  ";
            echo "</ol>";
        }
    }
}

if(!function_exists('vsii_comment_list'))
{
    function vsii_comment_list($comment, $args, $depth)
    {
        echo VsiiTemplate::load_view('comment-list',null,array('comment'=>$comment,'args'=>$args,'depth'=>$depth));
    }
}
if(!function_exists('vsii_get_order_list'))
{
    function vsii_get_order_list($current=false,$extra=array(),$return='array')
    {
        $default=array(
            'none'=>esc_html__('None',"vsii-template"),
            'ID'=>esc_html__('Post ID',"vsii-template"),
            'author'=>esc_html__('Author',"vsii-template"),
            'title'=>esc_html__('Post Title',"vsii-template"),
            'name'=>esc_html__('Post Name',"vsii-template"),
            'date'=>esc_html__('Post Date',"vsii-template"),
            'modified'=>esc_html__('Last Modified Date',"vsii-template"),
            'parent'=>esc_html__('Post Parent',"vsii-template"),
            'rand'=>esc_html__('Random',"vsii-template"),
            'comment_count'=>esc_html__('Comment Count',"vsii-template"),
        );
        if(!empty($extra) and is_array($extra))
        {
            $default=array_merge($default,$extra);
        }
        if($return=="array")
        {
            return $default;
        }elseif($return=='option')
        {
            $html='';
            if(!empty($default)){
                foreach($default as $key=>$value){
                    $selected=selected($key,$current,false);
                    $html.="<option {$selected} value='{$key}'>{$value}</option>";
                }
            }
            return $html;
        }
    }
}


if(!function_exists('vsii_vc_get_order_list'))
{
    function vsii_vc_get_order_list($current=false,$extra=array())
    {
        $list=vsii_get_order_list($current,$extra);
        $r=array();
        $r[esc_html__('--Select--',"vsii-template")]='';
        if(!empty($list) and is_array($list))
        {
            foreach($list as $key=>$value)
            {
                $r[$value]=$key;
            }
        }
        return $r;
    }
}



if(!function_exists('vsii_get_list_taxonomy_id'))
{
    function vsii_get_list_taxonomy_id($tax = 'category', $array = array())
    {
        $taxonomies = get_terms($tax, $array);
        $r = array();
        $r[esc_html__('All Categories', "vsii-template")] = 0;
        if (!is_wp_error($taxonomies)) {
            foreach ($taxonomies as $key => $value) {
                # code...
                $r[$value->name] = $value->term_id;
            }
        }
        return $r;
    }
}

if(!function_exists('vsii_is_https'))
{
    function vsii_is_https()
    {
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
            // no SSL request
            return false;
        }
        return true;
    }
}
if(!function_exists('vsii_paginate_links')){
    function vsii_paginate_links( $args = '' ,$key='paged') {
        global $wp_query, $wp_rewrite;

        // Setting up default values based on the current URL.
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $url_parts    = explode( '?', $pagenum_link );

        // Get max pages and current page out of the current query, if available.
        $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
        $current = get_query_var( $key ) ? intval( get_query_var( $key ) ) : 1;
        $current = !empty($_GET[$key]) ? intval( $_GET[$key] ) : $current;

        // Append the format placeholder to the base URL.
        $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

        // URL base depends on permalink settings.
        $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

        $defaults = array(
            'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
            'format' => $format, // ?page=%#% : %#% is replaced by the page number
            'total' => $total,
            'current' => $current,
            'show_all' => false,
            'prev_next' => true,
            'prev_text' =>'<i class="fa fa-long-arrow-left"></i> '.esc_html__("Newer Posts","vsii-template"),
            'next_text' =>esc_html__("Older Posts","vsii-template").' <i class="fa fa-long-arrow-right"></i> ',
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'plain',
            'add_args' => array(), // array of query args to add
            'add_fragment' => '',
            'before_page_number' => '',
            'after_page_number' => ''
        );

        $args = wp_parse_args( $args, $defaults );

        if ( ! is_array( $args['add_args'] ) ) {
            $args['add_args'] = array();
        }

        // Merge additional query vars found in the original URL into 'add_args' array.
        if ( isset( $url_parts[1] ) ) {
            // Find the format argument.
            $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
            $format_query = isset( $format[1] ) ? $format[1] : '';
            wp_parse_str( $format_query, $format_args );

            // Find the query args of the requested URL.
            wp_parse_str( $url_parts[1], $url_query_args );

            // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
            foreach ( $format_args as $format_arg => $format_arg_value ) {
                unset( $url_query_args[ $format_arg ] );
            }

            $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
        }

        // Who knows what else people pass in $args
        $total = (int) $args['total'];
        if ( $total < 2 ) {
            return;
        }
        $current  = (int) $args['current'];
        $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
        if ( $end_size < 1 ) {
            $end_size = 1;
        }
        $mid_size = (int) $args['mid_size'];
        if ( $mid_size < 0 ) {
            $mid_size = 2;
        }
        $add_args = $args['add_args'];
        $r = '';
        $page_links = array();
        $dots = false;

        if ( $args['prev_next'] && $current && 1 < $current ) :
            $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
            $link = str_replace( '%#%', $current - 1, $link );
            if ( $add_args )
                $link = add_query_arg( $add_args, $link );
            $link .= $args['add_fragment'];

            /**
             * Filter the paginated links for the given archive pages.
             *
             * @since 3.0.0
             *
             * @param string $link The paginated link URL.
             */
            $page_links[] = '<li><a class="" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . ($args['prev_text']) . '</a></li>';
        endif;
        for ( $n = 1; $n <= $total; $n++ ) :
            if ( $n == $current ) :
                $page_links[] = "<li><span class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span></li>";
                $dots = true;
            else :
                if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                    $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                    $link = str_replace( '%#%', $n, $link );
                    if ( $add_args )
                        $link = add_query_arg( $add_args, $link );
                    $link .= $args['add_fragment'];
                    $page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a></li>";
                    $dots = true;
                elseif ( $dots && ! $args['show_all'] ) :
                    $page_links[] = '<li><span class="page-numbers dots">' .esc_html__( '&hellip;',"vsii-template" ) . '</span></li>';
                    $dots = false;
                endif;
            endif;
        endfor;
        if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
            $link = str_replace( '%_%', $args['format'], $args['base'] );
            $link = str_replace( '%#%', $current + 1, $link );
            if ( $add_args )
                $link = add_query_arg( $add_args, $link );
            $link .= $args['add_fragment'];

            /** This filter is documented in wp-includes/general-template.php */
            $page_links[] = '<li><a href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . ($args['next_text']) . '</a></li>';
        endif;
        switch ( $args['type'] ) {
            case 'array' :
                return $page_links;

            case 'list' :
                $r .= "<ul class='page-numbers'>\n\t<li>";
                $r .= join("</li>\n\t<li>", $page_links);
                $r .= "</li>\n</ul>\n";
                break;

            default :
                $r = join("\n", $page_links);

                $r = '
                            <div class="info-pagination">
                                <ul class="pagination pagination-lg">
                                        '.join("\n", $page_links).'

                                </ul>
                            </div>';
                break;
        }
        return $r;
    }
}
if(!function_exists('vsii_hex2rgb')) {
    function vsii_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

        if(strlen($hex) == 3) {
            $r = hexdec(substr($hex,0,1).substr($hex,0,1));
            $g = hexdec(substr($hex,1,1).substr($hex,1,1));
            $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
            $r = hexdec(substr($hex,0,2));
            $g = hexdec(substr($hex,2,2));
            $b = hexdec(substr($hex,4,2));
        }
        $rgb = array($r, $g, $b);
        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }
}
