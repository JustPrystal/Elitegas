<section class="Faq-Group-Page">
    <div class="container">
        <h1><?php echo $block['main_heading']; ?></h1>
        <div class="wrapper-Accordions-main">
            
            <?php 
                foreach($block['faq_repeater'] as $Faq_Accordion){  ?>
                <div class="wrapper-Accordions">
                    <div class="Accordion-Heading-wrap">
                        <h2><?php echo $Faq_Accordion['heading']; ?></h2>
                    </div>
                    <div class="Accordion-Items">
                    <?php 
                        foreach($Faq_Accordion['faq_items'] as $Faq_items){  ?>
                            <div class="items-wrap">
                                <div class="box-one-wrap">
                                    <div class="item-heading"><?php echo $Faq_items['faq_heading']; ?></div>
                                    <i class="fas"></i>
                                </div>
                                <div class="item-content"><?php echo $Faq_items['faq_text']; ?></div>
                            </div>
                            
                    <?php }
                    ?>
                    </div>
                        </div>
            <?php }
            ?>
        </div>
    </div>
</section>
<script>
    $('.items-wrap').click(function(){
       if(!$(this).hasClass('active')){
        $('.items-wrap').removeClass('active');
        $(this).addClass('active');
        $('.item-content').slideUp();
        $(this).find($(".item-content")).slideDown();
       }
       else{
        $(this).removeClass('active');
       }

    });
</script>