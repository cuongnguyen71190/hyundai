<?php
if(!function_exists('vsii_paging'))
{
    function vsii_paging($query=false,$key='paged',$link=false)
    {
        global $wp_query;
        if(!$query) $query=$wp_query;
        $page=get_query_var($key);
        if($key!='paged'){
            $page=@$_REQUEST[$key];
        }

        if(!$page) $page=1;
        $limit=get_query_var('posts_per_page');
        $found_posts=$query->found_posts;

        $from=($page-1)*$limit+1;

        $to=($page)*$limit;

        if($to>$found_posts){
            $to=$found_posts;
        }

        $args = array(
            'total'              => $query->max_num_pages,
            'format'              => '?'.esc_attr($key).'=%#%',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'=>'list'
        );


        ?>
        <div class="pagination-full">
            <?php if($page>1){
                $prev=get_previous_posts_page_link();
                if($key!='paged'){
                    $prev=esc_url(add_query_arg(array($key=>$page-1),$link));
                }
                printf('<a class="pagination-prev" href="%s">%s</a>',$prev,esc_html__('Previous Page',"vsii-template"));
            }?>
            <?php echo vsii_paginate_links($args,$key)?>
            <?php if($page<$query->max_num_pages and $next=get_next_posts_page_link()){

                if($key!='paged'){
                    $next=esc_url(add_query_arg(array($key=>$page+1),$link));
                }
                printf('<a class="pagination-next" href="%s">%s</a>',$next,esc_html__('Next Page',"vsii-template"));
            }?>
        </div>
        <?php
    }
}

if(!function_exists('vsii_default_thumbnail'))
{
    function vsii_default_thumbnail()
    {
        $alt=esc_html__('Image Alt',"vsii-template");
        if($title=get_the_title())
        {
            $alt=$title;
        }
        $src=VsiiAssets::url('images/default.png');

        return "<img class='' alt='{$alt}' src='{$src}'>";
    }
}

if(!function_exists('vsii_get_list_taxonomy'))
{
    function vsii_get_list_taxonomy($tax,$array=array())
    {
        $taxonomies = get_terms($tax,$array);

        $r=array();

        $r[esc_html__('All Categories',"vsii-template")]="_0_";

        if(!is_wp_error($taxonomies))
        {

            foreach ($taxonomies as $key => $value) {
                # code...
                $r[$value->name]=$value->slug;

            }
        }

        return $r;
    }
}
