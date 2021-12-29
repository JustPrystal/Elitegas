<?php
  function get_blocks() {
    global $post;

    $fields = get_fields($post->ID);
    loop_blocks($fields);
  }

  function loop_blocks($blocks) {
    if (isset($blocks['blocks'])){
      if ($blocks['blocks']){
        foreach ($blocks['blocks'] as $key => $block) {
          switch ($block['acf_fc_layout']) {
            case 'global_block':
              if ($block['global_block']){
                $blocks = get_fields($block['global_block'][0]);
                loop_blocks($blocks);
              }
              break;
            case 'fullwidth_text':
              include 'blocks/fullwidth_text.php';
              break;
            case 'faq_block':
                include 'blocks/faq_block.php';
                break;
            case 'about_block':
                include 'blocks/about_block.php';
                break;
            case 'affiliat':
              include 'blocks/affiliat_block.php';
              break;
            case 'contact_us':
              include 'blocks/contact_us_block.php';
              break;
            case 'home_slider':
              include 'blocks/home_slider.php';
              break;
            case 'subscription_block':
              include 'blocks/subscription_block.php';
              break;
            case 'feature_brand_block':
              include 'blocks/feature_brand_block.php';
              break;
            case 'featured_product_block':
              include 'blocks/featured_product_block.php';
              break;
            case 'request_quote':
              include 'blocks/request_quote_block.php';
              break;
              case 'order_tracking':
                include 'blocks/order_track.php';
                break;     
          }
        }
      }
    }
  }

?>