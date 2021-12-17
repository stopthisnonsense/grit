<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php wp_head(); ?>
    <meta name="description" content="Pogoda Companies provide management and brokerage services to owners of self storage properties.  Their management and acquisition systems set self storage businesses up for success.">

</head>
<body <?php body_class(); ?>>

<?php
global $post;

$feat_image = get_option_tree('top_background_for_single_page','',false);
echo "<div class='top-banner clearfix' style='background: url(" . $feat_image . ")'>";

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

    echo '<h1 class="clearfix">' . $title . '</h1>';
    echo '</div>';
}

