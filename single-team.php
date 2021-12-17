<?php

get_header('alt');
global $post;
?>
<div class="container">
<?php
$breadcrumb_text = get_field("breadcrumb_text");
$haveparent = "";
$parent = array_reverse(get_post_ancestors($post->ID));
if(isset($parent[0])) {
    $parent = $parent[0];
}
if($parent !== 0 && !empty($parent)){
    $haveparent = '<a href="'.get_permalink($parent).'">'.get_field('breadcrumb_text',$parent).'</a>  > ';

}
?>
<div class="breadcrumbs">
    <a href="<?php echo site_url(); ?>">Home</a> > <a href="<?php echo site_url().'/our-story/' ?>">Our Story</a> >  <span><?php echo $post->post_title;  ?></span>
</div>
<div class="content">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

        echo '<div class="col-xs-12 col-md-4 full-width">';
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($person->ID));
        echo '<img src="'.$feat_image.'"/>';
        echo '</div>';

        echo '<div class="col-xs-12 col-md-8">';
        the_content();
        echo "</div>";

        // End the loop.
    endwhile;
    ?>
</div>
</div>


<?php get_footer(); ?>
