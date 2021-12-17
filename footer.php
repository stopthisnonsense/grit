<footer>
    <div class="container text-center">
        <?php
        $twitter = get_option_tree('twitter','',false);
        $facebook = get_option_tree('facebook','',false);
        $google_plus = get_option_tree('google_plus','',false);
        $linkedin = get_option_tree('linkedin','',false);
        $insta = get_option_tree('instagram','',false);
        ?>
    <div class="social">
        <?php if($twitter !== "" && $twitter !== NULL){ ?>
            <a href="<?php echo $twitter ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri().'/dist/img/twitter.jpg' ?>"/>
            </a>
        <?php } ?>
        <?php if($facebook !== "" && $facebook !== NULL){ ?>
            <a href="https://www.facebook.com/PogodaCompanies" target="_blank">
                <img src="<?php echo get_template_directory_uri().'/dist/img/facebook.jpg' ?>"/>
            </a>
        <?php } ?>
        <?php if($google_plus !== "" && $google_plus !== NULL){ ?>
            <a href="https://plus.google.com/114237172487937524455" target="_blank">
                <img src="<?php echo get_template_directory_uri().'/dist/img/google-plus.jpg' ?>"/>
            </a>
        <?php } ?>
        <?php if($linkedin !== "" && $linkedin !== NULL){ ?>
            <a href="https://www.linkedin.com/company/pogoda-companies" target="_blank">
                <img src="<?php echo get_template_directory_uri().'/dist/img/linkedin.jpg' ?>"/>
            </a>
        <?php } ?>
        <?php if($insta !== "" && $insta !== NULL){ ?>
            <a href="<?php echo $insta; ?>" target="_blank">
                <img src="<?php echo get_template_directory_uri().'/dist/img/instagram.jpg' ?>"/>
            </a>
        <?php } ?>
    </div>
  
    <div class="bottom-nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'nav navbar-nav',
            'container_class' => 'menu-primary-container'
        ));
        ?>
    </div>
    </div>
    <div class="container clearfix">

    <div class="text-center">
        <img class="footer-logo" src="<?php echo get_template_directory_uri() . '/dist/img/logo.png' ?>" alt="">
    </div>


        <div class="text-center copyright">
<a href=“mailto:info@pogodaco.com”>info@pogodaco.com</a>&nbsp&nbsp&nbsp&nbsp<a href="tel:248-855-9676">248-855-9676</a>
</div>


    </div>
    <div class="container">
        <div class="text-center copyright">
            <?php get_option_tree('copyright','',true,false); ?>
        </div>
    </div>

</footer>
<span id="my_email_ajax_nonce" data-nonce="<?php echo wp_create_nonce( 'my_email_ajax_nonce' ); ?>"></span>
<div class="popup">
    <div class="popup-inner">
        <script charset="utf-8" type="text/javascript">var switchTo5x=true;</script>
        <script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script charset="utf-8" type="text/javascript">stLight.options({"publisher":"6f503be8-75be-4cc7-bcfd-edd24191c2d0"});var st_type="wordpress4.6";</script>
        <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span st_via='@pogoda' st_username='pogoda' class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_linkedin_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_email_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_sharethis_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_fblike_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_plusone_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
        <span class='st_pinterest_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
