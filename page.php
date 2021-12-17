<?php

get_header();
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
    <?php if($haveparent !== ""){ ?>
    <a href="<?php echo site_url(); ?>">Home</a> > <?php echo $haveparent; ?><span><?php echo $breadcrumb_text;  ?></span>
    <?php } ?>
</div>
<div class="content">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

        the_content();

        // End the loop.
    endwhile;
    ?>
</div>
</div>


<?php get_footer(); ?>
