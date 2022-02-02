<section class="champs-form">
    <div class="container">
        <div class="champs-wrap">
            <div class="img-wrap">
                <img src="<?php echo $block['champs_image']['url'] ?>" alt=""/>
            </div>
            <div class="champs-content">
                <p class="champs-text"><?php echo $block['champs_content'] ?></p>
            </div>
            <div class="champs-form-wrap">
                <?php  
                    if ( is_user_logged_in() ){
                        $current_user = wp_get_current_user();
                        $roles = $current_user->roles;
                        foreach( $roles as $role ){
                            if(in_array('champs', $role)){

                                echo 'do nothing';

                            }else{

                                echo do_shortcode('[gravityforms id="13" ajax=true]');

                            }

                        }

                    }else{

                        // echo '<div class="champs-error"><p class="error-text">It appears that you already have an account with us! <a href="/login/">Sign In</a> and try again.</p></div>';
                        echo do_shortcode('[gravityforms id="12"]');

                    }
                ?>
            </div>
        </div>
    </div>
</section>


<script>

// $(document).change(function(){

// var phone = $('#input_12_155').val();
// var email = $('#input_12_154').val();
// var business = $('#input_12_153').val();
// var fullname = $('#input_12_152').val() + " " + $('#input_12_156').val();
// var firstname = $('#input_12_152').val();

//     $('#input_12_16').val(fullname);
//     $('#input_12_8').val(fullname);
//     $('#input_12_52').val(firstname);
//     $('#input_12_10').val(business);
//     $('#input_12_7').val(business);
//     $('#input_12_53').val(business);
//     $('#input_12_20').val(email);
//     $('#input_12_13').val(phone);

// })


window.setTimeout(function(){
    
    if($("#validation_message_12_154").is(':visible')){
    $("#validation_message_12_154").append('. It appears that you already have an account with us! Please <a href="/login/">Sign In</a> and try again.');
        $("#gform_12_validation_container").hide();
        $("#validation_message_12_150").hide();
    }	
        
    if($("#validation_message_12_150").is(':visible')){
    $("#validation_message_12_150").append('. It appears that you already have an account with us! Please <a href="/login/">Sign In</a> and try again.');
        $("#gform_12_validation_container").hide();
    }		
        
}, 1000);



</script>