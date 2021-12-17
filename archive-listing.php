<?php
/**
 * The Default Template for displaying all Easy Property Listings archive/loop posts with WordPress Themes
 *
 * @package EPL
 * @subpackage Templates/Themes/Default
 * @since 1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
    <div class="container">
    <div class="breadcrumbs">
        <a href="<?php echo site_url(); ?>">Home</a> > <a href="<?php echo site_url().'/self-storage-brokerage/'; ?>">Brokerage</a> > <span>Listings</span>
    </div>
    <div class="content">
<section id="primary" class="site-content content epl-archive-default <?php echo epl_get_active_theme_name(); ?>">
	<div align="center">
		<div class="main-content">
			<?php
			if ( have_posts() ) : ?>
				<div class="loop pad">
					<header class="archive-header entry-header loop-header">
						<h4 class="archive-title loop-title">
							<?php do_action( 'epl_the_archive_title' ); ?>
						</h4>
					</header>

					<div class="entry-content loop-content properties">
					
						<?php while ( have_posts() ) : // The Loop
								the_post();
								do_action('epl_property_blog');
							endwhile; // end of one post
						?>
					
					</div>

					<div class="loop-footer">
						<!-- Previous/Next page navigation -->
						<div class="loop-utility clearfix">
							<?php do_action('epl_pagination'); ?>
						</div>
					</div>
				</div>
			<?php
			else :
				?><div class="hentry">
					<div class="entry-header clearfix">
						<h3 class="entry-title"><?php apply_filters( 'epl_property_search_not_found_title' , _e('Listing not Found', 'easy-property-listings') ); ?></h3>
					</div>

					<div class="entry-content clearfix">
						<p><?php apply_filters( 'epl_property_search_not_found_message' , _e('Listing not found, expand your search criteria and try again.', 'easy-property-listings') ); ?></p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
    </div>
    </div>
<?php
get_footer();
