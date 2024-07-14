<?php
/*
Plugin Name: Resource Filter
Description: A plugin to create and filter Resources.
Version: 1.0
Author: Your Name Aashutosh
*/

// Register Custom Post Type

add_action('init', function() {
	register_post_type('Resource', [
		'label' => __('Resources', 'txtdomain'),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-book',
		'supports' => ['title', 'editor', 'thumbnail', 'author', 'revisions', 'comments'],
		'show_in_rest' => true,
		'exclude_from_search'   => true,
		'rewrite' => ['slug' => 'resource'],
		'taxonomies' => ['feature','test'],
		'labels' => [
			'singular_name' => __('Resource', 'txtdomain'),
			'add_new_item' => __('Add new resource', 'txtdomain'),
			'new_item' => __('New resource', 'txtdomain'),
			'view_item' => __('View resource', 'txtdomain'),
			'not_found' => __('No resources found', 'txtdomain'),
			'not_found_in_trash' => __('No resources found in trash', 'txtdomain'),
			'all_items' => __('All resources', 'txtdomain'),
			'insert_into_item' => __('Insert into resource', 'txtdomain')
		],		
	]);
    register_taxonomy('resource_type', ['resource'], [
		'label' => __('Resource Types', 'txtdomain'),
		'hierarchical' => true,
		'rewrite' => ['slug' => 'resource type'],
		'show_admin_column' => true,
		'labels' => [
			'singular_name' => __('Resource', 'txtdomain'),
			'all_items' => __('All Resources', 'txtdomain'),
			'edit_item' => __('Edit Resource', 'txtdomain'),
			'view_item' => __('View Resource', 'txtdomain'),
			'update_item' => __('Update Resource', 'txtdomain'),
			'add_new_item' => __('Add New Resource', 'txtdomain'),
			'new_item_name' => __('New Resource Name', 'txtdomain'),
			'search_items' => __('Search Resources', 'txtdomain'),
			'popular_items' => __('Popular Resources', 'txtdomain'),
			'separate_items_with_commas' => __('Separate Resources with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used Resources', 'txtdomain'),
			'not_found' => __('No Resources found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('resource type', 'resource');

    register_taxonomy('resource_topic', ['resource'], [
		'label' => __('Resource Topic', 'txtdomain'),
		'hierarchical' => true,
		'rewrite' => ['slug' => 'resource topic'],
		'show_admin_column' => true,
		'labels' => [
			'singular_name' => __('Resource', 'txtdomain'),
			'all_items' => __('All Resources', 'txtdomain'),
			'edit_item' => __('Edit Resource', 'txtdomain'),
			'view_item' => __('View Resource', 'txtdomain'),
			'update_item' => __('Update Resource', 'txtdomain'),
			'add_new_item' => __('Add New Resource', 'txtdomain'),
			'new_item_name' => __('New Resource Name', 'txtdomain'),
			'search_items' => __('Search Resources', 'txtdomain'),
			'popular_items' => __('Popular Resources', 'txtdomain'),
			'separate_items_with_commas' => __('Separate Resources with comma', 'txtdomain'),
			'choose_from_most_used' => __('Choose from most used Resources', 'txtdomain'),
			'not_found' => __('No Resources found', 'txtdomain'),
		]
	]);
	register_taxonomy_for_object_type('resource topic', 'resource');
});

function resource_filter_scripts() {
    wp_enqueue_script('resource-filter', plugin_dir_url(__FILE__) . 'js/resource-filter.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'resource_filter_scripts');

function my_filter_function() {
    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );

    if (isset($_POST['resource_type']) && $_POST['resource_type'] != '') {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_type',
            'field' => 'id',
            'terms' => $_POST['resource_type'],
        );
    }

    if (isset($_POST['resource_topic']) && $_POST['resource_topic'] != '') {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_topic',
            'field' => 'id',
            'terms' => $_POST['resource_topic'],
        );
    }

    if (isset($_POST['keyword']) && $_POST['keyword'] != '') {
        $args['s'] = sanitize_text_field($_POST['keyword']);
    }
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Resource Name</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = new WP_Query($args);

            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div>       
                    <tr>
                        <td><?php the_title(); ?></td>
                    </tr>
                </div>
            <?php endwhile; else : ?>
                <p><?php _e('No resources found'); ?></p>
            <?php endif;

            die();
        ?>
        </tbody>
    </table>
    <?php }

add_action('wp_ajax_myfilter', 'my_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'my_filter_function');

?>
