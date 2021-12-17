<?php get_header(); ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <div class="carousel-inner" role="listbox">
            <?php
            $slider = get_option_tree('slider','',false,true);
            $count = count($slider);
            $i = 0;
            foreach($slider as $slide){
                ?>
                <div class="item <?php if($i == 0){ echo 'active';} ?>" style="background:url('<?php echo $slide['image'] ?>');">
                    <div class="container text-center">
                        <?php echo do_shortcode($slide['description']); ?>
                    </div>
                </div>

                <?php
                $i++;
            }
            ?>
        </div>
        <ol class="carousel-indicators">
            <?php
            for($i=0;$i < $count;$i++){
                ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" <?php if($i==0){ echo 'class="active"';} ?> ></li>
            <?php
            }
            ?>
        </ol>
    </div>
<?php
/*// Start the loop.
while ( have_posts() ) : the_post();

    the_content();

    // End the loop.
endwhile;
*/?>
<?php get_footer(); ?>