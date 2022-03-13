<script>
	function gogo() {
		jQuery("#ppGo").show();
	}

	jQuery(document).ready(function () {
		jQuery('#amountDiv').hide();
		jQuery('input:radio[name=giftType]').click(function () {
			if (jQuery(this).attr("id") === 'chooseMonthly') {
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
			submitHandler: function (form) {
				jQuery.post("https://arsofia.com/paypal.php", jQuery("#contactForm").serialize(),
					function (data, textStatus) {
						if (data == true) {
							form.submit();
							setTimeout(gogo, 1);
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

		jQuery('#email_confirm').change(function () {
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
					<div style="float: left;margin-top:12px;padding-right: 8px;">
						<a href="https://www.paypal.com/" target="_blank">
							<img width="55" height="15" src="<?php echo REL_CHILD_THEME . '/images/paypal_logo.gif'; ?>"
								 alt="Paypal logo">
						</a>
					</div>
					<div class="formDiv" id="oneTimeGiftDiv">
						<input value="10" type="text" id="amount" name="amount" size="4" maxlength="5"
							   class="textFields donate-input state_zip"/>
						<span><?php _e( 'Euro', 'arsofia' ) ?></span>
					</div>
					<div class="formDiv" id="amountDiv">
						<input value="10" type="text" id="a3" name="a3" size="4" maxlength="5"
							   class="textFields donate-input state_zip"/>
						<span><?php _e( 'Euro', 'arsofia' ) ?></span>
					</div>
					<div class="formDiv">
						<input type="radio" name="giftType" value="One Time Gift" id="chooseOneTime" checked="checked"/>
						<?php _e( 'One Time Donation:', 'arsofia' ) ?><br>
						<input type="radio" name="giftType" value="Monthly Gift" id="chooseMonthly"/>
						<?php _e( 'Monthly Donation:', 'arsofia' ) ?>
					</div>
					<input type="hidden" name="business" value="LMCMQQ93CSRZG">
					<input type="hidden" name="lc" value="EUR">
					<input type="hidden" name="item_name"
						   value="<?php _e( 'Donation', 'arsofia' ) ?> >> <?php wp_title( '', true ); ?>">
					<input type="hidden" name="item_number" value="<?php wp_title( '', true ); ?>">
					<input type="hidden" name="no_note" value="1">
					<input type="hidden" name="no_shipping" value="1">
					<input type="hidden" name="rm" value="1">
					<input type="hidden" name="return" value="<?php the_permalink() ?>?donation=thank-you">
					<input type="hidden" name="cancel_return" value="<?php the_permalink() ?>">
					<input type="hidden" name="currency_code" value="EUR">
					<input type="hidden" name="submitted_btn" value="submit">
					<span id="extraDetails"><input type="hidden" name="cmd" value="_donations"></span>
					<input class="pay-button button_blue paypal-button" type="submit" name="submitted_btn"
						   value="<?php _e( 'Donate with PayPal', 'arsofia' ) ?>">
					<span id="ppGo" style="display:none;">
						<img src="<?php echo REL_CHILD_THEME; ?>/images/pay-loader.gif"
							 alt="payer loading icon"/> <?php _e( 'Please wait...', 'arsofia' ) ?>
					</span>
				</form>
			</div>
		</div>

		<div id="right-box" class="fl right-box-donate-box">
			<form action="https://www.epay.bg/" method="post">
				<table class="epay-view">
					<tbody>
					<tr>
						<td class="ep1 epay-view-name">
							<div style="float: left;margin-top: 10px;padding-right: 8px;">
								<a href="https://www.epay.bg/" target="_blank">
									<img width="55" height="15"
										 src="https://arsofia.com/wp-content/uploads/2013/09/epay-logo.png"
										 alt="ePay logo">
								</a>
							</div>
							<input class="fl epay-value-input" name="TOTAL" value="20" size="4" type="text"/> Лева
						</td>
					</tr>
					<tr>
						<td class="ep2 epay-view-name" colspan="2">
							Плащането се осъществява чрез
							<a class="epay" href="https://www.epay.bg/" target="_blank">ePay.bg</a>
						</td>
					</tr>
					<tr>
						<td class="ep3 epay-view-name" colspan="2">
							<input style="margin-top: 6px;" class="epay-button paypal-button" name="BUTTON:EPAYNOW"
								   type="submit" value="ДАРИ С EPAY"/>
						</td>
					</tr>
					<tr></tr>
					</tbody>
				</table>
				<input name="PAGE" type="hidden" value="paylogin"/>
				<input name="MIN" type="hidden" value="2326683315"/>
				<input name="INVOICE" type="hidden"/>
				<input name="DESCR" type="hidden"
					   value="<?php _e( 'Donation', 'arsofia' ) ?> >> <?php wp_title( '', true ); ?>"/>
				<input name="URL_OK" type="hidden" value="<?php the_permalink() ?>?donation=thank-you"/>
				<input name="URL_CANCEL" type="hidden" value="<?php the_permalink() ?>"/>
				<input name="ENCODING" type="hidden" value="utf-8"/>
			</form>
		</div>
	</div>
	<div class="fl fib-1">
		<div class="fl" style="margin-top: 4px;">
			<a href="https://www.fibank.bg/" target="_blank">
				<img width="110" height="30" alt="FIBank logo"
					 src="<?php echo REL_CHILD_THEME . '/images/fbanklogo.png' ?>">
			</a>
		</div>
		<div class="donation-right-box">
			<p class="fib-2">
			<h6>Fibank</h6>
			<?php _e( '37 Dragan Tzankov blvd, Sofia, BG', 'arsofia' ); ?> <br>
			<strong>SWIFT</strong>: FINVBGSF <br>
			<strong>IBAN BGN</strong>: BG07FINV91501215999954 <br>
			<strong>IBAN EUR</strong>: BG50FINV91501215999956 <br>
			<?php _e( '<strong>BENEFICIARY</strong>: A R Sofia Foundation', 'arsofia' ); ?> <br>
			<?php _e( '<strong>ADDRESS</strong>: 23 James Bourchier blvd, Sofia, BG', 'arsofia' ); ?>
			</p>
		</div>
		<div class="dms-mobile-inner">
			<img width="63" height="40" src="<?php echo REL_CHILD_THEME; ?>/images/dms_mobile.jpg" alt="DMS logo">
			<div class="dms-text">
				<p class="dms-embed-number">
					<?php _e( 'Send SMS with body <span class="dms-color">DMS DOG</span> to <span class="dms-color">17 777</span>', 'arsofia' ); ?>
				</p>
				<small class="donation-embed-info">
					<?php _e( '1 lv donation for subscribers of Vivacom, A1, Yettel (no VAT)', 'arsofia' ); ?>
				</small>
			</div>
		</div>
	</div>
</div>
<div class="fix"></div>
<style>
	#archivebox-page-nav {
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
	}

	.epay-button {
		border: solid 1px #FFF;
		color: #FFF;
		background-image: none;
		font-weight: normal;
	}

	.epay {
		text-decoration: none;
		border-bottom: dotted 1px Maroon;
		color: Maroon;
		font-weight: bold;
	}

	.epay:hover {
		text-decoration: none;
		border-bottom: solid 1px Maroon;
		color: Maroon;
		font-weight: bold;
	}

	.epay-view {
		white-space: nowrap;
	}

	.epay-view {
		width: 100%;
		text-align: center;
		background-color: #DDD;
	}

	.epay-view-name {
		font-family: 'Cuprum', sans-serif;
		font-size: 14px;
	}

	.ep1 {
		width: 100%;
		text-align: left;
		font-size: 14px;
		height: auto;
		padding-left: 0px;
		padding-top: 10px;
		padding-bottom: 10px;
		font-family: 'Cuprum', sans-serif;
		line-height: 34px;
		background-color: #eee;
	}

	.ep2 {
		white-space: normal;
		font-size: 11px;
		text-align: left;
		padding: 5px;
		margin: 0;
		height: auto;
	}

	.ep3 {
		padding: 0;
		height: 30px;
		text-align: left;
	}

	.fib-1 {
		width: 100%;
		padding-bottom: 0;
		display: block;
		flex-direction: column;
		padding-top: 15px;
	}

	.fib-2 {
		line-height: 14px;
		font-size: 14px;
		font-family: 'Cuprum', sans-serif;
	}

	.dms-mobile-inner {
		background: #eeeeee;
		display: flex;
		border-radius: 6px;
		padding: 6px;
		width: 100%;
		justify-content: flex-start;
		align-items: center;
	}

	.dms-mobile-inner .dms-embed-number {
		color: #223763;
		display: inline;
		font-family: "Arial Black", Gadget, sans-serif;
		font-size: 22px !important;
		padding-left: 6px;
		line-height: 24px !important;
		font-weight: bold;
	}

	.fl .dms-mobile-inner img {
		display: block;
	}

	.dms-mobile-inner .dms-embed-number > span {
		color: #F57D20;
		white-space: nowrap;
	}

	.dms-mobile-inner small {
		float: left;
		padding-left: 6px;
		text-transform: uppercase;
		font-size: 12px;
		clear: both;
	}

	.epay-view {
		width: 100%;
		background-color: #eee;
	}

	.epay-button {
		border: none;
		background-color: maroon;
		color: #FFF;
		padding: 5px 35px 3px;
		font-size: 18px;
		font-family: 'PT Sans Narrow', sans-serif;
		font-weight: bold;
	}

	.epay-button:hover {
		background-image: none;
		cursor: pointer;
	}

	.donate-left-box {
		padding-bottom: 0;
		margin-top: 0;
		width: 100%;
	}

	.donate-input {
		border: 1px solid #999999;
		text-align: right;
	}

	.right-box-donate-box {
		background: #eee;
		margin-top: 0;
		width: 50%;
		border: 1px solid #fff;
		padding: 10px;
		box-sizing: border-box;
		border-radius: 6px;
		flex-basis: 50%;
		min-width: 300px;
	}

	.fl.epay-value-input {
		width: auto;
	}

	#donate-right h2, #donate-left h2 {
		padding: 10px;
	}

	#donate-left input {
		margin-right: 5px;
		text-transform: uppercase;
		font-size: 18px;
		display: inline-block;
		width: auto;
	}

	.pay-button {
		background: url(<?php echo REL_CHILD_THEME; ?>/images/pay_button.png) no-repeat scroll 0 0;
		border: medium none;
		color: #FFFFFF;
		cursor: pointer;
		font-size: 18px;
		font-weight: bold;
		height: 30px;
		margin-top: 10px;
		padding-bottom: 6px;
		width: 120px;
	}

	.epay-value-input {
		font-size: 18px;
		text-align: right;
		margin-left: 20px
	}


	.banking-details {
		width: 285px;
		padding: 10px;
		margin-top: 15px;
	}

	.banking-details p {
		margin-top: 10px;
	}

	.single-banking-details {
		border-radius: 6px;
		background: #eee;
		margin-top: 0;
		width: 50%;
		box-sizing: border-box;
		border: 1px solid #fff;
		flex-basis: 50%;
		float: none;
		min-width: 320px;
	}

	.banking-details h2 {
		border-bottom: 4px solid #EEEEEE;
		color: #333300;
		font-family: 'Cuprum', sans-serif;
		font-size: 34px;
		padding: 4px;
		text-transform: uppercase;
		text-align: center;
	}

	.epay-button.paypal-button,
	.pay-button.button_blue.paypal-button {
		min-width: 100%;
	}
</style>
