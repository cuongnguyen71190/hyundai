<?php
/**
 * List all required plugins for themes
 *
 * @see VsiiRequiredPlugins::register_required_plugins();
 *
 *
 * */
$config['required_plugins'] = array(
    array(
        'name'     => 'Option Tree', // The plugin name.
        'slug'     => 'option-tree', // The plugin slug (typically the folder name).
        'required' => true, // If false, the plugin is only 'recommended' instead of required.
    ),
    array(
        'name'     => 'Contact Form 7',
        'slug'     => 'contact-form-7',
        'required' => true,
    ),
    array(
        'name'     => 'Visual Composer',
        'slug'     => 'js_composer',
        'required' => true,
        'source'   =>  'http://premiumbluethemes.com/WordPress/wp_smarty/files/js_composer.zip'
    ),
    array(
        'name'     => 'Vsii Toolkit',
        'slug'     => 'vsii-toolkit',
        'required' => true,
        'source'   => ''
    ),
);