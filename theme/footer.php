<?php 

    $footer = get_field("footer_items","option");
    $footer_b = get_field("footer_bottom","option")
?>
    <div class="footer">
        <div class="footer-top-wrap">
            <div class="container">
                <?php foreach($footer as $footer_item){ ?>
                    <div class="footer-item">
                        <div class="inner-wrap">
                            <div class="heading"><?php echo $footer_item['heading']?></div>
                            <?php if($footer_item['choose_type'] == "text"){?>
                                <div class="item-body">
                                    <?php echo $footer_item['text_area'] ?>
                                </div>
                            <?php } elseif($footer_item['choose_type'] == "nav"){ ?>
                                <div class="item-body">
                                   <?php foreach($footer_item['navigation'] as $nav){?>
                                        <div class="footer-link-item">
                                            <a href="<?php echo $nav['link']['url'] ?>"><?php echo $nav['link']['title'] ?></a>
                                        </div>
                                   <?php }?>
                                </div>    
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?> 
            </div>
        </div>
        <div class="footer-bottom-wrap">
            <div class="container">
              <div class="copyright-wrap">
                  <?php echo $footer_b['copyright']?>
              </div>
              <div class="payments-wrap">
                  <?php if($footer_b['supported_payments']){?>
                    <div class="heading">We accept</div>
                    <div class="payments">
                        <?php foreach($footer_b['supported_payments'] as $pay){?>
                            <div class="payment-item">
                                <img src="<?php echo $pay['image']['url']?>" alt="<?php echo $pay['image']['alt']?>">
                            </div>
                        <?php }?>
                    </div>
                  <?php }?>
              </div>
            </div>
        </div>
    </div>
        
    </div><!-- closing all div -->
    

    <?php wp_footer(); ?>
    <script><?php echo $script_includes?></script>    
    
	</body>
</html>
