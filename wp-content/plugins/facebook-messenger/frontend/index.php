<?php
if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
include_once FACEBOOK_MESSENGER_PLUGIN_DIR ."frontend/shortcode.php";
/*
* Add css
*/
add_action( 'wp_print_styles', 'facebook_messenger_chat_add_styles' );
function facebook_messenger_chat_add_styles() {
   wp_enqueue_style( 'popup-messenger',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/css/popup.css",array(),"1.0.0" );
   if( facebook_messenger_chek_page() ){
        wp_enqueue_style( 'messenger',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/css/messenger.css",array(),"1.0.1" );
   }
}
/*
* Add scripts
*/
add_action( 'wp_enqueue_scripts', 'facebook_messenger_add_scripts' );
function facebook_messenger_add_scripts() {
   wp_enqueue_script('jquery');
   wp_enqueue_script('popup-messenger',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/js/popup.js",array(),false,true);
   if( facebook_messenger_chek_page() ){
        wp_enqueue_script('move',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/js/jquery.event.move.js",array(),false,true);
        wp_enqueue_script('rebound',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/js/rebound.min.js",array(),false,true);
        if( get_option("facebook_messenger_postion") == "1" ) {
            wp_enqueue_script('index-messenger',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/js/index-left.js",array(),false,true);
        }else{
            wp_enqueue_script('index-messenger1',FACEBOOK_MESSENGER_PLUGIN_URL."frontend/js/index.js",array(),false,true);
        }

   }
}
/*
* Add box chat bottom
*/
add_action("wp_footer","facebook_messenger_add_box_chat");
function facebook_messenger_add_box_chat() {
    $lang = get_option("facebook_messenger_lang");
    if ( !$lang ) {
        $lang = "en_US";
    }
    ?>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/<?php echo $lang ?>/sdk.js#xfbml=1&version=v2.5";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php
}
/*
*
*/
add_action("wp_footer","facebook_mesenger_set_footer_page");
function facebook_mesenger_set_footer_page(){
    if( facebook_messenger_chek_page() ){
        $facebook_messenger_display = get_option("facebook_messenger_display");
        $img = get_option("facebook_messenger_text_img");
        if( is_numeric($img)) {
            $img_arr = wp_get_attachment_image_src($img,"full");
           $img = $img_arr[0];
        }
    ?>
        <div class="drag-wrapper <?php echo (get_option("facebook_messenger_postion")== 1)?"drag-wrapper-left":'drag-wrapper-right'; ?>">
    		<div data-drag="data-drag" class="thing">
    			<div class="circle facebook-messenger-avatar facebook-messenger-avatar-type<?php echo get_option("facebook_messenger_type") ?>">
    				<img class="facebook-messenger-avatar" src="<?php echo $img ?>" />
    			</div>
    			<div class="content">
    				<div class="inside">
    					<div class="fb-page" data-width="310" data-height="310" data-href="<?php echo get_option("facebook_messenger_user") ?>" data-tabs="messages" data-small-header="<?php echo ($facebook_messenger_display==2 )?"true":"false" ?>"  data-hide-cover="<?php echo ($facebook_messenger_display==0)?"true":"false" ?>" data-show-facepile="true" data-adapt-container-width="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?php echo get_option("facebook_messenger_user") ?>"><a href="<?php echo get_option("facebook_messenger_user") ?>">Loading...</a></blockquote></div></div>
     				</div>
                    <?php if( wp_is_mobile() && get_option("facebook_messenger_app") == 1 ) : ?>
                    <div class="send-app">
                        <?php  $ms = explode("https://www.facebook.com/",get_option("facebook_messenger_user")  );
                        ?>
                        <a href="https://www.messenger.com/t/<?php echo $ms[1] ?>"><?php echo get_option("facebook_messenger_app_text") ?></a>
                    </div>
                    <?php endif; ?>
    			</div>
    		</div>
    		<div class="magnet-zone">
    			<div class="magnet"></div>
    		</div>
    	</div>
    <?php
    }
}
/*
* Set background
*/
add_action("wp_head","facebook_messenger_setting_head");
function facebook_messenger_setting_head(){
    ?>
    <style type="text/css">

        .chatHead{
            background: <?php echo get_option("facebook_messenger_backgroud") ?> url(<?php echo get_option("facebook_messenger_text_img") ?>) center center no-repeat;
            background-size: 50% auto;
        }
        .drag-wrapper .thing .circle {
            background: <?php echo get_option("facebook_messenger_backgroud") ?>;
        }
        .nj-facebook-messenger {
            background: <?php echo get_option("facebook_messenger_backgroud") ?> url(<?php echo get_option("facebook_messenger_text_img") ?>) 15px center no-repeat;
            background-size: auto 55%;
            padding: 8px 15px;
            color: #fff !important;
            border-radius: 3px;
            padding-left: 40px;
            display: inline-block;
            margin-top: 5px;
        }
        .send-app a {
            background: <?php echo get_option("facebook_messenger_backgroud") ?>
        }
        .nj-facebook-messenger:hover {
            opacity: 0.8;
        }

    </style>
    <?php
}
function facebook_messenger_chek_page(){
     global $wp_query;
    $show = false;
    $post_id = $wp_query->post->ID;
    $type = get_option("facebook_messenger_hide_display");
    if( $type == "1" ) {
        /*
        * Display for pages...
        */
        $all_page = get_option("facebook_messenger_show_page");
        if( is_array( $all_page ) ) {
            if ( is_page() && in_array($post_id,$all_page) ) {
               $show = true;
            }
        }
    }else{
        $all_page = get_option("facebook_messenger_hide_page");
        if( is_array($all_page) ){
            if ( is_page() && in_array($post_id,$all_page) ) {
               $show = false;
            }else{
                $show =true;
            }
        }else{
            $show = true;
        }
    }
    return $show;
}