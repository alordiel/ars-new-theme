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
<div class="ars-donations-embed-wrapper">
<div id="archivebox-page-nav" class="donate-box">
  <div class="banking-details single-banking-details fl">
    <div id="donate-left" class="donate-left-box">
      <form id="contactForm" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <div id="statusMsg"></div>
        <div align="left" style="float: left;margin-top:12px;padding-right: 8px;"><a href="https://www.paypal.com/" target="_blank"><img  width="55" height="15" src="<?php echo bloginfo('template_url'); _e('/images/paypal_logo.gif', 'arsofia'); ?>"></a></div>
        <div class="formDiv" id="oneTimeGiftDiv">
          <input value="10" type="text" id="amount" name="amount" size="4" maxlength="5" class="textFields donate-input state_zip" />
          <span>
          <?php _e('Euro','arsofia') ?>
          </span> </div>
        <div class="formDiv" id="amountDiv">
          <input value="10" type="text" id="a3" name="a3" size="4" maxlength="5" class="textFields donate-input state_zip" />
          <span>
          <?php _e('Euro','arsofia') ?>
          </span> </div>
        <div class="formDiv">
          <input type="radio" name="giftType" value="One Time Gift" id="chooseOneTime" checked="checked" />
          <?php _e('One Time Donation:','arsofia') ?>
          <input type="radio" name="giftType" value="Monthly Gift" id="chooseMonthly" />
          <?php _e('Monthly Donation:','arsofia') ?>
        </div>
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
        <span id="ppGo" style="display:none;"> <img src="<?php bloginfo('template_url'); ?>/images/pay-loader.gif" align="absmiddle" />
        <?php _e('Please wait...','arsofia') ?>
        </span>
      </form>
    </div>
  </div>
  <?php //} ?>
  <div id="right-box" class="fl right-box-donate-box">
    <form action="https://www.epay.bg/" method="post">
      <table class="epay-view" cellspacing="1" cellpadding="4">
        <tbody>
          <tr>
            <td class="ep1 epay-view-name"><div style="float: left;margin-top: 10px;padding-right: 8px;" align="left"><a href="https://www.epay.bg/" target="_blank">
						<img  width="55" height="15" src="https://arsofia.com/wp-content/uploads/2013/09/epay-logo.png"></a></div>
              <input class="fl" style="font-size:18px;text-align: right;" name="TOTAL" value="20" size="4" type="text" />
              &nbsp;&nbsp;Лева </td>
          </tr>
          <tr>
            <td class="ep2 epay-view-name" colspan="2">Плащането се осъществява чрез <a class="epay" href="https://www.epay.bg/" target="_blank">ePay.bg</a></td>
          </tr>
          <tr>
            <td class="ep3 epay-view-name" colspan="2"><input style="margin-top: 6px;" class="epay-button paypal-button" name="BUTTON:EPAYNOW" type="submit" value=" ДАРИ С EPAY" /></td>
          </tr>
          <tr> </tr>
        </tbody>
      </table>
      <input name="PAGE" type="hidden" value="paylogin" />
      <input name="MIN" type="hidden" value="2326683315" />
      <input name="INVOICE" type="hidden" />
      <input name="DESCR" type="hidden" value="<?php _e('Donation','arsofia') ?> >> <?php wp_title('',true); ?>" />
      <input name="URL_OK" type="hidden" value="<?php the_permalink() ?>?donation=thank-you" />
      <input name="URL_CANCEL" type="hidden" value="<?php the_permalink() ?>" />
      <input name="ENCODING" type="hidden" value="utf-8"  />
    </form>
  </div>
  </div>
  <div class="fl fib-1">
    <div class="fl" style="margin-top: 4px;"> <a href="https://www.fibank.bg/" target="_blank"><img  width="110" height="30" src="<?php echo bloginfo('template_url'); _e('/images/fbanklogo.png', 'arsofia'); ?>"> </a> </div>
    <div class="donation-right-box">
      <div class="fib-2">
        <?php _e('FIBank; 37 Dragan Tzankov blvd, Sofia, BG; SWIFT: FINV BG SF', 'arsofia'); ?>
        </strong></div>
      <p class="iban-box">
        <?php _e('IBAN BGN: BG07FINV91501215999954; IBAN EUR: BG50FINV91501215999956', 'arsofia'); ?>
      </p>
      <p class="iban-box-2">
        <?php _e('BENEFICIARY: A R Sofia Foundation; 23 James Bourchier blvd, Sofia, BG', 'arsofia'); ?>
      </p>
    </div>
    <div class="dms-embed-image">
    	<img  width="586" height="52" src="https://arsofia.com/wp-content/uploads/2015/12/dms-embed.png">
    </div>
    <div class="dms-embed-mobile">
    	<div class="dms-mobile-inner">
        <img  width="63" height="40" src="<?php echo bloginfo('template_url'); ?>/images/dms_mobile.jpg">
        <p class="dms-embed-number">SMS <span class="dms-color">DMS DOG</span> НА <span class="dms-color">17 777</span></p>
        <small class="donation-embed-info">1 лев дарение за абонати на vivacom, telenor и m-tel (няма ДДС)</small>
        </div>
    </div>
</div>
</div>
<div class="fix"></div>
