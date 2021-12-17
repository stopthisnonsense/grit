<?php
/**
 * The Default Template for displaying all Easy Property Listings single posts with WordPress Themes
 *
 * @package EPL
 * @subpackage Templates/Themes/Default
 * @since 1.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

get_header(); ?>
<?php
$breadcrumb_text = get_the_title();
?>
<div class="container">

<div class="breadcrumbs">
    <a href="<?php echo site_url(); ?>">Home</a> > <a href="<?php echo site_url(); ?>/self-storage-brokerage/">Brokerage</a>  > <span><a href="<?php echo site_url(); ?>/self-storage-brokerage/listings">Listings</a></span> > <span><?php echo $breadcrumb_text; ?></span>
    <br/>
    <br/>
    <a href="<?php echo site_url(); ?>/self-storage-brokerage/listings"> <i class="glyphicon glyphicon-triangle-left"></i> Back</a>
</div>

<div class="content">
        <div id="primary"
             class="site-content epl-single-default <?php echo epl_get_active_theme_name(); ?>">
            <section class="content">
                <div id="content" class="pad" role="main">
                    <?php
                    if (have_posts()) : ?>
                        <div class="loop">
                            <div class="loop-content">
                                <?php
                                while (have_posts()) : // The Loop
                                    the_post();
                                    do_action('epl_property_single');
                                endwhile; // end of one post
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_footer(); ?>
