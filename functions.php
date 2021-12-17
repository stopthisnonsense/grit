<?php

add_theme_support( 'post-thumbnails' );
add_filter('show_admin_bar', '__return_false');
function grit_scripts() {
// Load our main stylesheet.
    wp_enqueue_style( 'grit-style-font', get_stylesheet_directory_uri().'/fonts/font.css' );
    wp_enqueue_style( 'grit-style-font-aweson', get_stylesheet_directory_uri().'/fonts/font-awesome.min.css' );
    wp_enqueue_style( 'grit-style', get_stylesheet_uri() );
    wp_enqueue_style( 'grit-style-bootstrap', get_stylesheet_directory_uri().'/dist/css/bootstrap.css',array(),time(),'all' );
    wp_enqueue_style( 'theme', get_stylesheet_directory_uri().'/dist/css/theme.css', array(),time(), 'all'  );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.8.3.min.js', array(), '20141010', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array( 'jquery-core-js' ), '20141010', true);
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/dist/js/ekko-lightbox.min.js', array( 'jquery-core-js' ), '20141010', true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array( 'jquery-core-js' ), '20141010', true );
}
add_action( 'wp_enqueue_scripts', 'grit_scripts' );


// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'grit' ),
    'sub' => __( 'Sub Menu', 'grit' ),
    'listings' => __( 'Sub Listings Menu', 'grit' )
) );
add_theme_support( 'title-tag' );


function do_section($atts,$cont){
    $atts = shortcode_atts(
        array(
            'id' => '',
            'title' => '',
            'sub-title' => '',
            'under-title' => '',
            'size' => 'normal'
        ), $atts );

    $return = "<section ";
    if($atts['id'] !== ""){
        $return .= "id='".$atts['id']."'";
    }
    $return .= ">
    <div class='container'>";

    if($atts['title'] !== "") {
        $return .= "
        <div class='text-center'>
            <h2>" . $atts['title'] . "<div>" . $atts['sub-title'] . "</div></h2>
            ";
        if ($atts['under-title'] !== "") {
            $return .= "<h3>" . $atts['under-title'] . '</h3>';
        }
        $return .= "</div>";
    }
    if($atts['size'] == "small"){
        $return .= "<div class='col-xs-10 col-xs-push-1'>";
    }
    $return .= do_shortcode($cont);
    if($atts['size'] == "small"){
        $return .= "</div>";
    }

    $return .= " </div>
</section>";

    return $return;

}


add_shortcode('section','do_section');


function do_separator($atts,$cont){
    return '<div class="clr"></div><div class="content-separator "></div>';
}
add_shortcode('separator','do_separator');

function do_circleimg($atts,$cont){
    $atts = shortcode_atts(
        array(
            'url' => '',
            'text' => ''
        ), $atts );
    $return = '<div class="align-left circleimg" style="background: url('.$atts['url'].')"></div><div class="circleimg-p-holder"><div class="circle-img-p">'.$atts['text'].'</div></div>';
    return $return;
}
add_shortcode('circleimg','do_circleimg');


function do_submenu($atts,$cont){

    $return = '</div></div><div class="subnav listings-menu menu-holder clearfix"><div class="container"><div class="row">';
    $return .= wp_nav_menu(array(
        'theme_location' => 'listings',
        'menu_class' => 'nav navbar-nav',
        'container_class' => 'menu-primary-container',
        'echo' => false
    ));
   $return .= '</div></div></div><div class="container"><div class="content">';
return $return;

}
add_shortcode('sub-menu','do_submenu');


function do_slider($atts,$cont){

    global $post;


    $images = explode(';',$cont);
    $return = "<div id='myCarousel' class='smaller-carousel carousel slide' data-ride='carousel'> <div class='carousel-inner' role='listbox'>";
            $i = 0;
            foreach($images as $img){

                    $return .= "<a href='".$img."' data-toggle='lightbox' data-gallery='multiimages' data-title='".$post->post_title."' class='item ";

                    if ($i == 0) {
                        $return .= "active";
                    }

                    $return .= "' style='background:url(" . $img . ");'></a>";
                    $i++;
            }



$return .= "</div>";

    $return .= "<div class='bottom-of-carousel'>
  <a class='view-all' href='".get_site_url()."/self-storage-brokerage/listings/'>View All Properties</a>
  <a class='left carousel-control' href='#myCarousel' role='button' data-slide='prev'>
    <i class='glyphicon glyphicon-triangle-left'></i>
  </a>
  <a class='right carousel-control' href='#myCarousel' role='button' data-slide='next'>
    <i class='glyphicon glyphicon-triangle-right'></i>
  </a>


  </div>";
    $return .="</div>";

    return $return;
}

add_shortcode('slider','do_slider');


remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

add_filter( 'the_content', 'wpse_wpautop_nobr' );
add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );



// if you want both logged in and anonymous users to get the emails, use both hooks above

function mycustomtheme_send_mail_before_submit(){
    check_ajax_referer('my_email_ajax_nonce');
    if ( isset($_POST['action']) && $_POST['action'] == "mail_before_submit" ){
        add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
        //send email  wp_mail( $to, $subject, $message, $headers, $attachments ); ex:
        $datacont = 'Name: '.$_POST['name'].'<br/>';
        if($_POST['phone'] !== "") {
            $datacont .= 'Phone: ' . $_POST['phone'] . '<br/>';
        }
        if($_POST['email'] !== "") {
            $datacont .= 'Email: ' . $_POST['email'] . '<br/>';
        }

        $datacont .= 'Link to Listing:<a target="_blank" href="'.$_POST['regarding'].'">Link</a>';
        wp_mail($_POST['toemail'],'Contact from the website',$datacont);
        remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
        echo 'email sent';
        die();
    }
    echo 'error';
    die();
}

// if you want none logged in users to access this function use this hook
add_action('wp_ajax_nopriv_mail_before_submit', 'mycustomtheme_send_mail_before_submit');
add_action('wp_ajax_mail_before_submit', 'mycustomtheme_send_mail_before_submit');

function do_team($atts,$content){
    $my_wp_query = new WP_Query();
    $team = $my_wp_query->query(array('post_type'=>'team','posts_per_page'=>-1));

    $return = "";
    $i = 0;
    global $post;
    foreach($team as $person){
        setup_postdata( $person );
        $post->ID = $person->ID;
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($person->ID));
        $content = get_the_content();
        $content = apply_filters('the_content', $content);
        $return .= '<div class="one-person"><div class="col-xs-12 col-md-12"><div class="title">'.$person->post_title.'</div></div>';
        if($i%2 == 0) {
            $return .= '<div class="col-xs-12 col-md-4"><img src="' . $feat_image . '"/></div>';
            $return .= '<div class="col-xs-12 col-md-8">' . $content . '</div>';
        }else{
            $return .= '<div class="visible-xs col-xs-12 col-md-4"><img src="' . $feat_image . '"/></div>';
            $return .= '<div class="col-xs-12 col-md-8">' . $content . '</div>';
            $return .= '<div class="hidden-xs col-xs-12 col-md-4"><img src="' . $feat_image . '"/></div>';
        }
        $return .= "</div>";
        $i++;
    }
    return $return;


}
add_shortcode('team','do_team');

function remove_more_link_scroll( $link ) {
    $link = preg_replace( '|#more-[0-9]+|', '', $link );
    return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

function modify_read_more_link() {
    global $post;
    return '<a class="more-link" href="' . get_permalink($post->ID) . '">Learn More</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


function do_news($atts,$cont){

$args = array('posts_per_page' => -1,	'meta_key'			=> 'date',
    'orderby'			=> 'meta_value_num',
    'order'				=> 'DESC');
    query_posts( $args );

// The Loop
    $return = "<div class='posts-holder'>";

    while ( have_posts() ) : the_post();
        $return .= '<div class="one-post">';
        $target = '';
        $pdf = get_field('pdf');
        if($pdf !== false){
            $link = $pdf['url'];
            $content = '<img src="'.get_template_directory_uri().'/dist/img/pdf.png"/>';
        }else{
            $link = get_the_permalink();
            $content = 'Read More';
        }
        $newtab = get_field('open_in_new_tab');
        if(!empty($newtab)){
            $target=' target="_blank"';
        }
        $date = get_field('date', false, false);
        $date = new DateTime($date);

        $return .= do_shortcode('[bs_row class="row"][bs_col class="col-xs-2 text-center date-holder"]<div>'.$date->format('j M Y').'</div>[/bs_col][bs_col class="col-xs-7"]<a href="'.$link.'" '.$target.'>'.get_the_title().'</a><div>'.get_the_content( '', TRUE ).'</div>[/bs_col][bs_col class="col-xs-3 text-center"]<a href="'.$link.'" '.$target.'><div>'.$content.'</div></a>[/bs_col][/bs_row]');
    $return .= '</div>';
    endwhile;


// Reset Query

    wp_reset_query();

    $return .= "</div>";
    return $return;

}
add_shortcode('news','do_news');