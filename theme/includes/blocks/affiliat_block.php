<section class="Affiliate-Page">
    <div class="container">
        <div class="wrapper-main">
            <div class="box-first"></div>
            <div class="box-main">
                <div class="main-heading"><?php echo $block['main-heading'] ?></div>
                <div class="wrapper">
                    <?php foreach($block['content'] as $content){ ?>
                        <div class="content-wrapper">
                            <div class="heading"><?php echo $content['heading'] ?></div>
                            <div class="content"><?php echo $content['text'] ?></div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="box-last"></div>
        </div>
    </div>
</section>