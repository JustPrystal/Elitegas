<section class="champs-form">
    <div class="container">
        <div class="champs-wrap">
            <div class="img-wrap">
                <img src="<?php echo $block['champs_image']['url'] ?>" alt=""/>
            </div>
            <div class="champs-form-wrap">
                <?php echo do_shortcode('[gravityforms id="12"]'); ?>
            </div>
        </div>
    </div>
</section>
