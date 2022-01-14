<section class="Featured-Brand-Block">
    <div class="container">
        <div class="wrapper">
            <div class="heading"><?php echo $block['heading'] ?></div>
            <div class="image-container">
                <?php foreach($block['image_container'] as $image){?>
                    <div class="image">
						<a href="<?php echo $image['link']['url']?>">
                        	<img src="<?php echo $image['image']['url']?>" alt="">
						</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>