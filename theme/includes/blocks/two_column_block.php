<section class="two-column-section">
    <div class="container">
        <div class="wrapper">
            <div class="wrapper-content">
                <?php foreach($block['two_column_section'] as $section){ ?>
                        <div class="section-parent <?php if($section['reverse_column'] == 'yes'){ echo 'reversed'; }?>">
                            <div class="img-wrapper">
                                <img src="<?php echo $section['image']['url'] ?>" alt="">
                            </div>
                            <div class="content-parent">
                                <?php if($section['select_heading_tag'] == 'h1'){ ?>
                                    <h1><?php echo $section['h1_title'] ?></h1>
                                <?php } else { ?>
                                    <h2><?php echo $section['title'] ?></h2>
                                <?php } ?>
                                <p><?php echo $section['content'] ?></p>
                            </div>
                        </div>                      
                <?php } ?>
            </div>
        </div>
    </div>
</section>