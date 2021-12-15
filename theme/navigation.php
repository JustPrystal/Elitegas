<?php 
    $logo = get_field("header_logo","option");
    $nav =  get_field("navigation","option");
?>
<header class="header">
    <div class="inner-wrap-top ">
        <div class="container">
            <div class="header-left ">
                <a href="<?php echo get_site_url(); ?>"><div class="logo"><img src="<?php echo $logo['url'] ?>"> </div></a>
                <div class="search-wrap">
                    <?php echo do_shortcode('[searchandfilter id="48"]'); ?>
                </div>
            </div>
            <div class="header-right">
                <div class="user-detail-wrap <?php if(!is_user_logged_in()){ echo "logged-out";}?>">
                    <div class="login-signup">
                        <?php
                        if ( is_user_logged_in() ) { ?>
                            <div class="name"><strong><?php $current_user = wp_get_current_user();
                                printf( 'Hello %s!', esc_html( $current_user->user_firstname ) );?></strong></div>
                            <a href="<?php echo home_url( '/' ); ?>my-account">My Account</a>
                        <?php } else { ?>
                            <p><a class="sign-in" href="<?php echo home_url( '/' ); ?>login/">Sign In</a> / <a class="join-in" href="<?php echo home_url( '/' ); ?>membership-account/membership-checkout/?level=1">Join Elite Gas</a></p>
                        <?php }	?>
                    </div>
                    <div class="profile-img">
                    <?php				
                        $badge = get_field('user_profile_image', 'user_'.get_current_user_id());
                        $img_swap = get_field('default_profile_pictures',9);			
                        if($badge == 'a'){ ?> 	
                        <img class="online-indicator" src="<?php echo $img_swap[0]['image']['url']; ?>" alt="<?php echo $img_swap[0]['image']['alt']; ?>" /> 
                        <?php } else if($badge == 'b'){ ?> 
                        <img class="online-indicator" src="<?php echo $img_swap[1]['image']['url']; ?>" alt="<?php echo $img_swap[1]['image']['alt']; ?>" /> 
                        <?php } else if($badge == 'c'){ ?> 
                        <img class="online-indicator" src="<?php echo $img_swap[2]['image']['url']; ?>" alt="<?php echo $img_swap[2]['image']['alt']; ?>" />
                        <?php } else if($badge == 'd'){ ?> 
                        <img class="online-indicator" src="<?php echo $img_swap[3]['image']['url']; ?>" alt="<?php echo $img_swap[3]['image']['alt']; ?>" /> 
                        <?php } else if($badge == 'e'){ ?>
                        <img class="online-indicator" src="<?php echo $img_swap[4]['image']['url']; ?>" alt="<?php echo $img_swap[4]['image']['alt']; ?>" /> 
                        <?php } else { ?>
                        <img class="online-indicator" src="/wp-content/uploads/2021/12/Default_Avatar-1.png" alt="" />				
                        <?php }?>	
                    </div>
                </div>
                <div class="cart-icon">
                <a class="header__action-item-link header__cart-toggle cart-contents" href="/cart/" >
				    <div class="header__action-item-content">
                        <div class="header__cart-icon icon-state" aria-expanded="false">
                            <span class="icon-state__primary"><svg focusable="false" class="icon icon--cart" viewBox="0 0 27 24" role="presentation">
                                <g transform="translate(0 1)" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
                                    <circle stroke-linecap="square" cx="11" cy="20" r="2"></circle>
                                    <circle stroke-linecap="square" cx="22" cy="20" r="2"></circle>
                                    <path d="M7.31 5h18.27l-1.44 10H9.78L6.22 0H0"></path>
                                </g>
                                </svg><span class="header__cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </span>
                        </div>
					    <span class="hidden-pocket hidden-lap">Cart</span>
				    </div>
			    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="inner-wrap-bottom">
        <div class="container">
            <?php foreach($nav as $nav_item){?>
                <div class="nav-link">
                    <a href="<?php echo $nav_item['link']['url'] ?>"><?php echo $nav_item['link']['title'] ?></a>
                </div>
            <?php }?>
        </div>
    </div>
</header>