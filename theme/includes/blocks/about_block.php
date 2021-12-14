<section class="About-Page">
    <div class="container">
        <div class="wrapper">
            <div class="heading"><?php echo $block['main_heading'] ?></div>
            <div class="wrapper-content">
                <?php foreach($block['about_section_repeater'] as $section){ ?>
                    <div class="section-parent">
                        <img src="<?php echo $section['image']['url'] ?>" alt="">
                        <div class="content-parent">
                            <h2><?php echo $section['heading'] ?></h2>
                            <p><?php echo $section['text'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>