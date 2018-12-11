<style>
    .section{
        margin-left: -20px;
        margin-right: -20px;
        font-family: "Raleway",san-serif;
    }
    .section h1{
        text-align: center;
        text-transform: uppercase;
        color: #808a97;
        font-size: 35px;
        font-weight: 700;
        line-height: normal;
        display: inline-block;
        width: 100%;
        margin: 50px 0 0;
    }
    .section:nth-child(even){
        background-color: #fff;
        background-repeat: no-repeat;
        background-position: 85% 75%
    }
    .section:nth-child(odd){
        background-color: #f1f1f1;
        background-repeat: no-repeat;
        background-position: 15% 100%;
    }
    .section:nth-child(2){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/01-bg.png);
    }
    .section:nth-child(3){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/02-bg.png);
    }
    .section:nth-child(4){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/03-bg.png);
    }
    .section:nth-child(5){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/04-bg.png);
    }
    .section:nth-child(6){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/05-bg.png);
    }
    .section:nth-child(7){
        background-image: url(<?php echo YITH_YWEV_ASSETS_URL ?>/images/06-bg.png);
    }
    .section .section-title img{
        display: table-cell;
        vertical-align: middle;
        width: auto;
        margin-right: 15px;
    }
    .section h2,
    .section h3 {
        display: inline-block;
        vertical-align: middle;
        padding: 0;
        font-size: 24px;
        font-weight: 700;
        color: #808a97;
        text-transform: uppercase;
    }

    .section .section-title h2{
        display: table-cell;
        vertical-align: middle;
        line-height: 25px;
    }

    .section-title{
        display: table;
    }

    .section h3 {
        font-size: 14px;
        line-height: 28px;
        margin-bottom: 0;
        display: block;
    }

    .section p{
        font-size: 13px;
        margin: 25px 0;
    }
    .section ul li{
        margin-bottom: 4px;
    }
    .landing-container{
        max-width: 750px;
        margin-left: auto;
        margin-right: auto;
        padding: 50px 0 30px;
    }
    .landing-container:after{
        display: block;
        clear: both;
        content: '';
    }
    .landing-container .col-1,
    .landing-container .col-2{
        float: left;
        box-sizing: border-box;
        padding: 0 15px;
    }
    .landing-container .col-1 img{
        width: 100%;
    }
    .landing-container .col-1{
        width: 55%;
    }
    .landing-container .col-2{
        width: 45%;
    }
    .premium-cta{
        background-color: #808a97;
        color: #fff;
        border-radius: 6px;
        padding: 20px 15px;
    }
    .premium-cta:after{
        content: '';
        display: block;
        clear: both;
    }
    .premium-cta p{
        margin: 7px 0;
        font-size: 15px;
        font-weight: 500;
        display: inline-block;
        width: 60%;
    }
    .premium-cta a.button{
        border-radius: 6px;
        height: 60px;
        float: right;
        background: url(<?php echo YITH_YWEV_URL?>assets/images/upgrade.png) #ff643f no-repeat 13px 13px;
        border-color: #ff643f;
        box-shadow: none;
        outline: none;
        color: #fff;
        position: relative;
        padding: 9px 50px 9px 70px;
    }
    .premium-cta a.button:hover,
    .premium-cta a.button:active,
    .premium-cta a.button:focus{
        color: #fff;
        background: url(<?php echo YITH_YWEV_URL?>assets/images/upgrade.png) #971d00 no-repeat 13px 13px;
        border-color: #971d00;
        box-shadow: none;
        outline: none;
    }
    .premium-cta a.button:focus{
        top: 1px;
    }
    .premium-cta a.button span{
        line-height: 13px;
    }
    .premium-cta a.button .highlight{
        display: block;
        font-size: 20px;
        font-weight: 700;
        line-height: 20px;
    }
    .premium-cta .highlight{
        text-transform: uppercase;
        background: none;
        font-weight: 800;
        color: #fff;
    }

    @media (max-width: 768px) {
        .section{margin: 0}
        .premium-cta p{
            width: 100%;
        }
        .premium-cta{
            text-align: center;
        }
        .premium-cta a.button{
            float: none;
        }
    }

    @media (max-width: 480px){
        .wrap{
            margin-right: 0;
        }
        .section{
            margin: 0;
        }
        .landing-container .col-1,
        .landing-container .col-2{
            width: 100%;
            padding: 0 15px;
        }
        .section-odd .col-1 {
            float: left;
            margin-right: -100%;
        }
        .section-odd .col-2 {
            float: right;
            margin-top: 65%;
        }
    }

    @media (max-width: 320px){
        .premium-cta a.button{
            padding: 9px 20px 9px 70px;
        }

        .section .section-title img{
            display: none;
        }
    }
</style>
<div class="landing">
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce EU VAT%2$s to benefit from all features!','yith-woocommerce-eu-vat'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo YITH_YWEV_Plugin_FW_Loader::get_instance()->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-woocommerce-eu-vat');?></span>
                    <span><?php _e('to the premium version','yith-woocommerce-eu-vat');?></span>
                </a>
            </div>
        </div>
    </div>
    <div class="section section-even clear one">
        <h1><?php _e('Premium Features','yith-woocommerce-eu-vat');?></h1>
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/01.png" />
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/01-icon.png" />
                    <h2><?php _e('The VAT number is now mandatory','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('If you want to %1$sopen the doors of your shop only to customers with VAT numbers%2$s, don\'t hesitate, a new option has been tailored for you! %3$sThanks to this new feature, only VAT owner will be able to complete a purchase.', 'yith-woocommerce-eu-vat'), '<b>', '</b>','<br>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear two">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/02-icon.png" />
                    <h2><?php _e('Extend the VAT check to your shop country','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('By default, the check on the VAT number applies only to the users purchasing from a different country. With the premium version of the plugin, you can change this behavior and %1$sdetract the VAT for those users who purchase from your same country too%2$s.', 'yith-woocommerce-eu-vat'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/02.png" />
            </div>
        </div>
    </div>
    <div class="section section-even clear three">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/03.png"/>
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/03-icon.png" alt="icon 03"/>
                    <h2><?php _e('EU VAT validation','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('The plugin makes you verify the VAT number added by customers and act consequentially depending on the result of the check. With an %1$sinvalid EU VAT%2$s, you can %1$sblock the checkout%2$s or %1$scharge the taxes%2$s of the customer\'s country, according to the new European laws.', 'yith-woocommerce-eu-vat'), '<b>', '</b>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear four">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/04-icon.png" />
                    <h2><?php _e('Geolocalization of the user\'s country','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Geolocalization lets you trace the origin of the customers checking their IP. %3$sYou can choose how to operate if the %1$sgeolocalized country%2$s is different from the one expressed by the users: you can allow the purchase, or you can ask explicitly for a confirmation of their origin.', 'yith-woocommerce-eu-vat'), '<b>', '</b>','<br>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/04.png" />
            </div>
        </div>
    </div>
    <div class="section section-even clear five">
        <div class="landing-container">
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/05.png"/>
            </div>
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/05-icon.png"/>
                    <h2><?php _e('Physical products','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('Not only digital products! One of the biggest news in the plugin is related to the possibility to %1$sapply the VAT discount also to the physical products%2$s, always after the European VAT number check. ', 'yith-woocommerce-eu-vat'), '<b>', '</b>');?>
                </p>
            </div>
        </div>
    </div>
    <div class="section section-odd clear six">
        <div class="landing-container">
            <div class="col-2">
                <div class="section-title">
                    <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/06-icon.png" />
                    <h2><?php _e('Information summary','yith-woocommerce-eu-vat');?></h2>
                </div>
                <p>
                    <?php echo sprintf(__('In the WooCommerce detail page of the order, %1$syou can find a box with all the information about the order%2$s, like the VAT number added by the users, the amount of the subtraction for digital goods and the country from which the purchase request has been made.', 'yith-woocommerce-eu-vat'), '<b>', '</b>');?>
                </p>
            </div>
            <div class="col-1">
                <img src="<?php echo YITH_YWEV_ASSETS_URL ?>/images/06.png" />
            </div>
        </div>
    </div>
    
    <div class="section section-cta section-odd">
        <div class="landing-container">
            <div class="premium-cta">
                <p>
                    <?php echo sprintf( __('Upgrade to %1$spremium version%2$s of %1$sYITH WooCommerce EU VAT%2$s to benefit from all features!','yith-woocommerce-eu-vat'),'<span class="highlight">','</span>' );?>
                </p>
                <a href="<?php echo $this->get_premium_landing_uri() ?>" target="_blank" class="premium-cta-button button btn">
                    <span class="highlight"><?php _e('UPGRADE','yith-woocommerce-eu-vat');?></span>
                    <span><?php _e('to the premium version','yith-woocommerce-eu-vat');?></span>
                </a>
            </div>
        </div>
    </div>
</div>