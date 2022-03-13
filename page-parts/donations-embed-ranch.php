<script type="text/javascript">
function gogo() {
    jQuery("#ppGo").show();
}
jQuery(document).ready(function(){
  jQuery('#amountDiv').hide();
  jQuery('input:radio[name=giftType]').click(function() {
    if (jQuery(this).attr("id")==='chooseMonthly') {
      jQuery("#oneTimeGiftDiv").hide();
      jQuery("#amountDiv").show();
      jQuery("#extraDetails").html('<input type="hidden" name="cmd" value="_xclick-subscriptions"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="src" value="1"><input type="hidden" name="p3" value="1"><input type="hidden" name="t3" value="M"><input type="hidden" name="sra" value="1">');
    } else {
      jQuery("#amountDiv").hide();
      jQuery("#oneTimeGiftDiv").show();
      jQuery("#extraDetails").html('<input type="hidden" name="cmd" value="_donations">');
    }
  });

  jQuery("#contactForm").validate({
    submitHandler: function(form) {
      jQuery.post("https://arsofia.com/paypal.php",jQuery("#contactForm").serialize(), function (data, textStatus) {
        if(data == true){
          form.submit();
		  setTimeout(gogo,1);
        } else {
          jQuery("#statusMsg").html(data);
        }
      }, "json");
     },

    rules: {
      fname: "required",
      lname: "required",
      email: {
        required: true,
        email: true
      },
      email_confirm: {
        required: true,
        equalTo: "#email"
      }
    }
    });

    jQuery('#email_confirm').change(function(){
        jQuery("#contactForm").validate().element('#email_confirm');
    });
  });
</script>
<div id="archivebox-page-nav" class="donate-box donate-box-horses">
    <div class="banking-details single-banking-details fl">
        <div id="donate-left" class="donate-left-box">
       <form id="contactForm" action="https://www.paypal.com/cgi-bin/webscr" method="post">
      <div id="statusMsg"></div>
          <div align="left" style="float: left;margin-top:12px;padding-right: 8px;"><a href="https://www.paypal.com/" target="_blank"><img  width="55" height="15" src="<?php echo bloginfo('template_url'); _e('/images/paypal_logo.gif', 'arsofia'); ?>"></a></div>
      <div class="formDiv" id="oneTimeGiftDiv">
      <input value="10" type="text" id="amount" name="amount" size="4" maxlength="5" class="textFields donate-input state_zip" /><span> <?php _e('Euro','arsofia') ?></span>

      </div>
            <div class="formDiv" id="amountDiv">
        <input value="10" type="text" id="a3" name="a3" size="4" maxlength="5" class="textFields donate-input state_zip" /><span> <?php _e('Euro','arsofia') ?></span>
      </div>
            <div class="formDiv">
        <input type="radio" name="giftType" value="One Time Gift" id="chooseOneTime" checked="checked" /><?php _e('One Time Donation:','arsofia') ?>
        <input type="radio" name="giftType" value="Monthly Gift" id="chooseMonthly" /><?php _e('Monthly Donation:','arsofia') ?></div>
      <input type="hidden" name="business" value="LMCMQQ93CSRZG">
      <input type="hidden" name="lc" value="EUR">
      <input type="hidden" name="item_name" value="<?php _e('Donation','arsofia') ?> >> <?php wp_title('',true); ?>">
      <input type="hidden" name="item_number" value="<?php wp_title('',true); ?>">
      <input type="hidden" name="no_note" value="1">
      <input type="hidden" name="no_shipping" value="1">
      <input type="hidden" name="rm" value="1">
      <input type="hidden" name="return" value="<?php the_permalink() ?>?donation=thank-you">
      <input type="hidden" name="cancel_return" value="<?php the_permalink() ?>">
      <input type="hidden" name="currency_code" value="EUR">
      <input type="hidden" name="submitted_btn" value="submit">
      <span id="extraDetails">
        <input type="hidden" name="cmd" value="_donations">
      </span>
      <input class="pay-button button_blue paypal-button" type="submit" name="submitted_btn" value="<?php _e('Donate with PayPal','arsofia') ?>">
      <span id="ppGo" style="display:none;">
          <img src="<?php bloginfo('template_url'); ?>/images/pay-loader.gif" align="absmiddle" /> <?php _e('Please wait...','arsofia') ?></span>
    </form>
        </div>
    </div>
<?php //} ?>
<div class="fix"></div>
