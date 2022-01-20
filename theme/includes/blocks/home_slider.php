<section class="Home-Page-Slider is_desktop">
    <div class="wrapper">
        <div class="slider-main">
            <?php
                foreach($block['image_container'] as $image){ ?>
                 <a href="<?php echo $image['link']['url'] ?>"> 
                <div class="image-wrapper">
                <?php 
               
                if ($image['choose_type'] == 'image') {?>
                    <img src="<?php echo $image['image']['url'] ?>">
                   
                <?php } else { ?>
                    <video width="100%" height="635" autoplay muted>
                    <source src="<?php echo $image['video']['url']?>" type="video/mp4">
                    </video>

                   <?php  }
              ?>
                    <!-- <img src="<?php echo $image['image']['url'] ?>"> -->
                </div>
                </a>
            <?php
                }
            ?>
        </div>
    </div>
</section>

<section class="Home-Page-Slider is_mobile">
    <div class="wrapper">
        <div class="slider-main">
            <?php 
                foreach($block['mobile_image_container'] as $image){ ?>
                <div class="image-wrapper">
                    <img src="<?php echo $image['mobile_image']['url'] ?>">
                </div>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<script>
    $('.slider-main').slick({
        autoplay:true,
        draggable: false,
        arrows: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        fade: true,
        speed: 500,
        infinite: true,
        cssEase: 'ease-in-out'
    });
</script>