<?php 
    $logo = get_field("header_logo","option");
    $nav =  get_field("navigation","option");
?>
<header class="header is_desktop">
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
                <a class="header__action-item-link header__cart-toggle cart-contents" href="<?php echo get_site_url();?>zee/cart/" >
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
                <?php if($nav_item['choose_type'] == "normal"){?>
                    <div class="nav-link">
                        <a href="<?php echo $nav_item['link']['url'] ?>"><?php echo $nav_item['link']['title'] ?></a>
                    </div>

                <?php }?>
                <?php if($nav_item['choose_type'] == "dropdown"){?>
                    <div class="nav-link dropdown">
                        <a href="<?php echo $nav_item['link']['url'] ?>"><?php echo $nav_item['link']['title'] ?></a>
                        <div class="dropdown_wrapper">
                            <?php foreach($nav_item['sublinks'] as $sub){?>
                                <div class="child-link">
                                    <a href="<?php echo $sub['sublink']['url'] ?>"><?php echo $sub['sublink']['title'] ?></a>
                                </div>
                            <?php }?>
                        </div>
                    </div>

                <?php }?>
            <?php }?>
        </div>
    </div>
</header>


<!-- Mobile header -->


<header class="header is_mobile">
    <div class="inner-wrap-top ">
        <div class="container">
            <div class="logo-ham-wrap">
                <div class="hamburger-menu">
                    <span class="btn hamburger-open" style="font-size:30px;cursor:pointer">&#9776;</span>
                    <span class="btn hamburger-close" style="font-size:30px;cursor:pointer">&#9747;</span>
                </div>
                <div class="logo-wrap">
                   <a href="<?php echo get_site_url(); ?>"><div class="logo"><img src="<?php echo $logo['url'] ?>"> </div></a>
                </div>
            </div>
            <div class="header-item-wrap">
                <div class="user-detail-wrap <?php if(!is_user_logged_in()){ echo "logged-out";}?>">
                    <a href="/my-account/">
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
                    </a>
                </div>
                <div class="search-wrap">
                    <svg focusable="false" class="icon icon--search" viewBox="0 0 21 21" role="presentation">
                        <g stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
                            <path d="M19 19l-5-5" stroke-linecap="square"></path>
                            <circle cx="8.5" cy="8.5" r="7.5"></circle>
                        </g>
		            </svg> 
                </div>
                <div class="cart-icon">
                    <a class="header__action-item-link header__cart-toggle cart-contents" href="<?php echo get_site_url();?>zee/cart/" >
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
				        </div>
			        </a>
                </div>
            </div>
        </div>
        <div class="search-drop">
               <?php echo do_shortcode('[searchandfilter id="48"]'); ?>
        </div>
    </div>
    <div class="inner-wrap-bottom hide-before Header-nav">
        <div class="mobile-menu-wrap">
            <?php foreach($nav as $nav_item){?>
                <div class="nav-link">
                    <a href="<?php echo $nav_item['link']['url'] ?>"><?php echo $nav_item['link']['title'] ?></a>
                </div>
            <?php }?>
        </div>
        <div class="header-contact-container">
            <div class="inner-contact-container">
                <h2>Need help?</h2>
                <span class="header-icon-contact">
                    <svg focusable="false" class="icon icon--bi-phone" viewBox="0 0 24 24" role="presentation">
                        <g stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
                            <path d="M17 15l-3 3-8-8 3-3-5-5-3 3c0 9.941 8.059 18 18 18l3-3-5-5z" stroke="#4b4b4b"></path>
                            <path d="M14 1c4.971 0 9 4.029 9 9m-9-5c2.761 0 5 2.239 5 5" stroke="#df7800"></path>
                        </g>
                    </svg>
                    <p>Call us <a href="tel:(800) 901-0403">(800) 901-0403</a></p>
                </span>
                <span class="header-icon-contact">
                    <svg focusable="false" class="icon icon--bi-email" viewBox="0 0 22 22" role="presentation">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#df7800" d="M.916667 10.08333367l3.66666667-2.65833334v4.65849997zm20.1666667 0L17.416667 7.42500033v4.65849997z"></path>
                            <path stroke="#4b4b4b" stroke-width="2" d="M4.58333367 7.42500033L.916667 10.08333367V21.0833337h20.1666667V10.08333367L17.416667 7.42500033"></path>
                            <path stroke="#4b4b4b" stroke-width="2" d="M4.58333367 12.1000003V.916667H17.416667v11.1833333m-16.5-2.01666663L21.0833337 21.0833337m0-11.00000003L11.0000003 15.5833337"></path>
                            <path d="M8.25000033 5.50000033h5.49999997M8.25000033 9.166667h5.49999997" stroke="#df7800" stroke-width="2" stroke-linecap="square"></path>
                        </g>
                    </svg>
                    <p>Call us <a href="mailto:support@elitegas.com">support@elitegas.com</a></p>
                </span>
            </div>
        </div>
    </div>
</header>