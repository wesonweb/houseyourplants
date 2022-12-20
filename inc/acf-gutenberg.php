<?php

if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

// register block types

function register_acf_block_types()
{
    acf_register_block_type(
        array(
            'name'              =>  'featured_plant', // slug
            'title'             =>  __('Featured plant intro'),
            'description'       =>  __('Featured plant intro'),
            'render_template'   =>  'template-parts/blocks/featured-plant/intro.php',
            'category'          =>  'layout',
            'icon'              =>  'palmtree',
            'keywords'          =>  array('featured', 'plant'),

        )
    );
}
