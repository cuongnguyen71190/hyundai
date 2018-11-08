<?php
/**
 *
 * List all theme options fields
 *
 * @see VsiiOptiontree::_add_themeoptions();
 *
 *
 * */
$config['theme_options'] = array(
	'sections' => array(
		array(
			'id'    => 'option_general',
			'title' => esc_html__('General Options', "vsii-template")
		),
        array(
            'id'    => 'option_style',
            'title' => esc_html__('Styling Options', "vsii-template")
        ),
		array(
			'id'    => 'option_post',
			'title' => esc_html__('Posts Options', "vsii-template")
		),

	),
	'settings' => array(
		/*----------------Begin General --------------------*/
		array(
			'id'      => 'logo',
			'label'   => esc_html__('Logo', "vsii-template"),
			'desc'    => esc_html__('This allow you to change logo', "vsii-template"),
			'type'    => 'upload',
			'section' => 'option_general',
			'std'     => VsiiAssets::url() . 'images/front/logo.png'
		),
		array(
			'id'      => 'logo_retina',
			'label'   => esc_html__('Logo Retina', "vsii-template"),
			'desc'    => esc_html__('Note: You MUST re-name Logo Retina to logo-name@2x.ext-name. Example:<br>
                                    Logo is: <em>my-logo.jpg</em><br>Logo Retina must be: <em>my-logo@2x.jpg</em>  ', "vsii-template"),
			'type'    => 'upload',
			'section' => 'option_general',
		),
        array(
            'id'        => 'footer_template',
            'label'     => esc_html__('Footer Template', "vsii-template"),
            'type'      => 'page-select',
            'section'   => 'option_general',
        ),
        array(
            'id'        => 'footer_copyright',
            'label'     => esc_html__('Footer Copy Right', "vsii-template"),
            'type'      => 'textarea_simple',
            'section'   => 'option_general',
            'rows'=>2,
			'std'=>'&copy; 2017 by Vsii. Made with <span class="color"><i class="fa fa-heart"></i></span> by VsiiTheme.'
        ),

		/*----------------End General ----------------------*/
		/*----------------Begin  Styling ----------------------*/
        //preloader
		array(
			'id'      => 'main_color',
			'label'   => esc_html__('Main Color', "vsii-template"),
			'desc'    => esc_html__('Choose your own main color', "vsii-template"),
			'type'    => 'colorpicker',
			'section' => 'option_style',
			'std'     => '#f4bc16'
		),
		array(
			'id'      => 'google_fonts',
			'label'   => esc_html__('Google Fonts', "vsii-template"),
			'desc'    => esc_html__('Google Fonts', "vsii-template"),
			'type'    => 'google-fonts',
			'section' => 'option_style'
		),
		array(
			'id'      => 'body_font',
			'label'   => esc_html__("Typography", "vsii-template"),
			'desc'    => esc_html__("Typography", "vsii-template"),
			'type'    => 'typography',
			'section' => 'option_style',
			'output'  => 'body,p'
		),
		array(
			'id'      => 'heading_font',
			'label'   => esc_html__("Heading Font", "vsii-template"),
			'desc'    => esc_html__("Heading Font", "vsii-template"),
			'type'    => 'typography',
			'section' => 'option_style',
			'output'  => 'h1,h2,h3,h4,h5,.section-subbanner .caption,.tt02, .tt03, .tt04, .tt05,.post-date .inner .post-day, .post-date .inner .post-month,.txtlabel,.pagination-lg > li > a, .pagination-lg > li > span,#mainnav > ul > li > a,.header-middle .info .info-description .ptext,.btn-yellow, .btn-transfer, .btn-gray,.filter li a,.testimonial-meta .testimonial-author strong,.article-ourwork-single .list-group-info li b,.sect-header,.wg-post-comments .btn-yellow,.product-title,.btn-simple,.single-product-details .summary .summary-offer'
		),
		array(
			'id'      => 'style_custom_css',
			'label'   => esc_html__('Custom CSS', "vsii-template"),
			'desc'    => esc_html__('Custom CSS', "vsii-template"),
			'type'    => 'css',
			'section' => 'option_style',
		),
		/*----------------End Styling ----------------------*/
		/*----------------Begin Posts Options ----------------------*/
		array(
			'id'      => 'post_blog_tab',
			'label'   => esc_html__('Blog Options', "vsii-template"),
			'type'    => 'tab',
			'section' => 'option_post'
		),
		array(
			'id'      => 'page_sidebar_pos',
			'label'   => esc_html__("Sidebar Position", "vsii-template"),
			'type'    => 'select',
			'section' => 'option_post',
			'choices' => array(
				array(
					'value' => 'no',
					'label' => esc_html__("No Sidebar", "vsii-template")
				),
				array(
					'value' => 'left',
					'label' => esc_html__("Sidebar Left", "vsii-template")
				),
				array(
					'value' => 'right',
					'label' => esc_html__("Sidebar Right", "vsii-template")
				),
			),

			'std'=>'right'
		),
		array(
			'id'      => 'page_sidebar_id',
			'label'   => esc_html__("Widget Area Selection", "vsii-template"),
			'type'    => 'sidebar-select',
			'section' => 'option_post',
			'std'     => 'blog-sidebar'
		),
		/*----------------End Posts Options ----------------------*/
		array(
            'id'        => 'address',
            'label'     => esc_html__('Address', "vsii-template"),
            'type'      => 'textarea_simple',
            'section'   => 'option_general',
            'rows'		=> 3,
			'std'		=> '<h2>Công ty Cổ phần Đầu tư Ôtô Đông Nam (AUTO ĐÔNG NAM)</h2> <br/>
                                    <i class="fa fa-map-marker"></i> <strong>Địa chỉ: </strong>Chân cầu vượt Thanh Trì giao QL5, Long Biên, Hà Nội<br/>
                                    <i class="fa fa-phone"></i> <strong>HOTLINE: </strong> 0356.299.182 <br/>
                                    <i class="fa fa-envelope"></i> <strong>Email: </strong><a href="mailto:autodongnam.lb@gmail.com"> autodongnam.lb@gmail.com</a>'
        )
	)
);
