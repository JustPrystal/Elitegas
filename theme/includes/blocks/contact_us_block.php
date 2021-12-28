<section class="Contact-Us-Page">
    <div class="container">
        <div class="wrapper">
            <div class="heading"><?php echo $block['main_heading'] ?></div>
            <div class="section-wrap">
                <div class="form"><h2>Leave your message</h2><?php echo do_shortcode('[wpforms id="69"]');?></div>
                <div class="side-bar">
                    <img src="<?php echo $block['image']['url'] ?>" alt="">
                    <div class="content">
                        <div class="heading"><?php echo $block['heading'] ?></div>
                        <div class="text"><?php echo $block['number'] ?></div>
                    </div>
                    <div class="content">
                        <div class="heading"><?php echo $block['email_heading'] ?></div>
                        <div class="text"><a href="mailto:<?php echo $block['email'] ?>"><?php echo $block['email'] ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>