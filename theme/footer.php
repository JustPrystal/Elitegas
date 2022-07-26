<?php 
    $footer_top = get_field("footer_top","option");
    $footer = get_field("footer_items","option");
    $footer_b = get_field("footer_bottom","option")
?>
    <div class="footer-top-wrapper is_desktop">
        <div class="container">
            <?php foreach($footer_top as $item){?>
                <div class="footer-top-item">
                    <div class="icon-wrap">
                       <img src="<?php echo $item['icon']['url'] ?>">
                    </div>
                    <div class="text-wrapper">
                        <div class="headline"><?php echo $item['headline']?></div>
                        <div class="description"><?php echo $item['description']?></div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    <div class="footer-top-wrapper is_mobile">
        <div class="container">
            <?php foreach($footer_top as $item){?>
                <div class="footer-top-item mobile-item fade">
                    <div class="icon-wrap">
                       <img src="<?php echo $item['icon']['url'] ?>">
                    </div>
                    <div class="text-wrapper">
                        <div class="headline"><?php echo $item['headline']?></div>
                        <div class="description"><?php echo $item['description']?></div>
                    </div>
                </div>
            <?php }?>
          <div style="text-align:center">
             <span class="dot" onclick="currentSlide(1)"></span> 
              <span class="dot" onclick="currentSlide(2)"></span> 
             <span class="dot" onclick="currentSlide(3)"></span>
             <span class="dot" onclick="currentSlide(4)"></span>  
          </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-top-wrap is_desktop">
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
        <div class="footer-top-wrap is_mobile">
            <div class="container">
                <?php foreach($footer as $footer_item){ ?>
                    <div class="footer-item">
                        <div class="inner-wrap">
                            <div class="heading accordion-footer-head"><?php echo $footer_item['heading']?></div>
                            <?php if($footer_item['choose_type'] == "text"){?>
                                <div class="item-body accordion-footer-panel">
                                    <?php echo $footer_item['text_area'] ?>
                                </div>
                            <?php } elseif($footer_item['choose_type'] == "nav"){ ?>
                                <div class="item-body accordion-footer-panel">
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
                    <!-- (c) 2005, 2022. Authorize.Net is a registered trademark of CyberSource Corporation --> 
                    <div class="AuthorizeNetSeal"> 
                      <script type="text/javascript" language="javascript">var ANS_customer_id="c52dd1ac-4258-43da-8b83-b13a53783eff";</script>
                      <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script> 
                    </div>
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
