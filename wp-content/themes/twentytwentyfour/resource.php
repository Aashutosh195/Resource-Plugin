<?php
/**
 * Template Name: Resource
 */ 
get_header();
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<form id="filter" action="<?php echo site_url('/wp-admin/admin-ajax.php'); ?>" method="POST">
    <select name="resource_type" style="margin-left:25px;">
        <option value="">Select Resource Type</option>
        <?php 
        $terms = get_terms(array(
            'taxonomy' => 'resource_type',
            'hide_empty' => false,
        ));
        foreach ($terms as $term) {
            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
        }
        ?>
    </select>

    <select name="resource_topic" style="margin-left:25px;">
        <option value="">Select Resource Topic</option>
        <?php 
        $terms = get_terms(array(
            'taxonomy' => 'resource_topic',
            'hide_empty' => false,
        ));
        foreach ($terms as $term) {
            echo '<option value="' . $term->term_id . '">' . $term->name . '</option>';
        }
        ?>
    </select>

    <input type="text" name="keyword" placeholder="Keyword" style="margin-left:25px;">
    
    <button class="btn btn-info" style="margin-left:10px;">Apply filter</button>
    <input type="hidden" name="action" value="myfilter">
</form>
<br>

<div id="response">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Resource Name</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $args = array(
            'post_type' => 'resource',
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <tr>
                <td><?php the_title(); ?></td>
            </tr>
        <?php endwhile; wp_reset_postdata(); else : ?>
        <p><?php _e('No resources found'); ?></p>
    <?php endif; ?>
  </tbody>
</table>
</div>

<?php
get_footer();
?>
