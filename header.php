<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head();
    global $post;
    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    ?>
    <meta name="description" content="Pogoda Companies provide management and brokerage services to owners of self storage properties.  Their management and acquisition systems set self storage businesses up for success.">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@pogoda">
    <meta name="twitter:title" content="<?php  echo $post->post_title; ?>">
    <meta name="twitter:description" content="<?php echo esc_attr(get_the_excerpt($post->ID)); ?>">
    <meta name="twitter:creator" content="@pogoda">

    <meta name="twitter:image" content="<?php echo $feat_image; ?>">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?php echo $post->post_title; ?>" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?php echo get_the_permalink($post->ID); ?>" />
    <meta property="og:image" content="<?php echo $feat_image; ?>" />
    <meta property="og:description" content="<?php echo esc_attr(get_the_excerpt($post->ID)); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('blogname'); ?>" />
    <script type="text/javascript">
        var url = "<?php echo get_site_url(); ?>";
    </script>


</head>
<body <?php body_class(); ?>>

<?php
// global $post;
// var_dump($post);
if (!is_home()) {
    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    echo "<div class='top-banner clearfix' style='background: url(" . $feat_image . ")'>";
}

?>

<nav class="navbar  navbar-custom" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo get_site_url(); ?>">
                <img src="<?php echo get_template_directory_uri() . '/dist/img/logo.png' ?>" alt="">
            </a>
        </div>
    </div>
    <div class="container menu-holder">
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav navbar-nav',
                'container_class' => 'menu-primary-container'
            ));
            ?>
        </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>
<?php
if (!is_home()) {
    $title = $post->post_title;
    $test = get_field('top_title');
    if($test && $test !== ""){
        $title = $test;
    }

    echo '<h1 class="clearfix">' . $title . '</h1>';
    echo '</div>';
}

$show_menu = get_field("sub_menu");
$subpages_menu = get_field("sub_menu_of_child_pages");
$hide_parent = get_field('hide_parent_in_sub_menu');
if (is_array($show_menu) && !is_array($subpages_menu)) {
    ?>
    <div class="subnav menu-holder clearfix">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'sub',
            'menu_class' => 'nav navbar-nav',
            'container_class' => 'menu-primary-container'
        ));
        ?>
    </div>
<?php
}
if (is_array($subpages_menu)){
$parent = array_reverse(get_post_ancestors($post->ID));
if(empty($parent)){
    if(empty($hide_parent)) {
        $firstli = "<li class='menu-item current-menu-item'>
                <a href='#'>" . $post->post_title . "</a>
            </li>";
    }

// Set up the objects needed
$my_wp_query = new WP_Query();
$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

// Filter through all pages and find Portfolio's children
$portfolio_children = get_page_children( $post->ID, $all_wp_pages );

    $otherli = "";
    foreach($portfolio_children as $c){
        $otherli .= "<li class='menu-item'>
                <a href='".get_the_permalink($c->ID)."'>".$c->post_title."</a>
            </li>";
    }

}else{
   $parent = $parent[0];
if(empty($hide_parent)) {
    $firstli = "<li class='menu-item'>
                <a href='" . get_the_permalink($parent) . "'>" . get_the_title($parent) . "</a>
            </li>";
}

    // Set up the objects needed
    $my_wp_query = new WP_Query();
    $all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

// Filter through all pages and find Portfolio's children
    $portfolio_children = get_page_children( $parent, $all_wp_pages );

    $otherli = "";
    foreach($portfolio_children as $c){
        $otherli .= "<li class='menu-item";
        if($c->ID == $post->ID){
            $otherli .= " current-menu-item";
        }
        $otherli .= "'>
                <a href='".get_The_permalink($c->ID)."'>".$c->post_title."</a>
            </li>";
    }

}
?>
<div class="subnav menu-holder clearfix generated-pages">
    <?php
    ?>
    <div class="menu-primary-container">
        <ul id="menu-sub-menu-1" class="nav navbar-nav">
            <?php echo $firstli; ?>
            <?php echo $otherli; ?>
        </ul>
    </div>
</div>
<?php
}
?>