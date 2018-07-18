<?php //do
?>
<script>
    function ds_insert_shortcode(){

        var ds_type = jQuery("#ds_type").val();
        if( ds_type === "" ) {
            alert("Please select a type");
            return;
        }

        var ds_amount = jQuery("#ds_amount").val();
        if( ds_type === "payment" && ds_amount === "" || ds_type === "subscription" && ds_amount === "" ){
            alert("Please select an amount for payment type or plan ID for subscription type");
            return;
        }

        var ds_button_id = jQuery("#ds_button_id").val();
        var ds_name = jQuery("#ds_name").val();
        var ds_description = jQuery("#ds_description").val();
        var ds_label = jQuery("#ds_label").val();
        var ds_panellabel = jQuery("#ds_panellabel").val();
        var ds_coupon = jQuery("#ds_coupon").val();
        var ds_setup_fee = jQuery("#ds_setup_fee").val();
        var ds_capture = jQuery("#ds_capture").val();
        var ds_billing = jQuery("#ds_billing").val();
        var ds_shipping = jQuery("#ds_shipping").val();
        var ds_tc = jQuery("#ds_tc").val();
        var ds_rememberme = jQuery("#ds_rememberme").val();
        var ds_display_amount = jQuery("#ds_display_amount").val();
        var ds_currency = jQuery("#ds_currency").val();
        var ds_custom_role = jQuery("#ds_custom_role").val();
        var ds_success_query = jQuery("#ds_success_query").val();
        var ds_error_query = jQuery("#ds_error_query").val();
        var ds_success_url = jQuery("#ds_success_url").val();
        var ds_error_url = jQuery("#ds_error_url").val();
        var ds_zero_decimal = jQuery("#ds_zero_decimal").val();
        

        var ds_button_shortcode = '[direct-stripe type="' + ds_type + '"';
        if( ds_amount !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' amount="' + ds_amount + '"';
        }
        if( ds_button_id !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' button_id="' + ds_button_id + '"';
        }
        if( ds_name !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' name="' + ds_name + '"';
        }
        if( ds_description !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' description="' + ds_description + '"';
        }
        if( ds_label !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' label="' + ds_label + '"';
        }
        if( ds_panellabel !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' panellabel="' + ds_panellabel + '"';
        }
        if( ds_coupon !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' coupon="' + ds_coupon + '"';
        }
        if( ds_setup_fee !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' setup_fee="' + ds_setup_fee + '"';
        }
        if( ds_zero_decimal !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' zero_decimal="' + ds_zero_decimal + '"';
        }
        if( ds_capture !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' capture="' + ds_capture + '"';
        }
        if( ds_billing !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' billing="' + ds_billing + '"';
        }
        if( ds_shipping !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' shipping="' + ds_shipping + '"';
        }
        if( ds_tc !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' tc="' + ds_tc + '"';
        }
        if( ds_rememberme !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' rememberme="' + ds_rememberme + '"';
        }
        if( ds_display_amount !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' display_amount="' + ds_display_amount + '"';
        }
        if( ds_currency !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' currency="' + ds_currency + '"';
        }
        if( ds_custom_role !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' custom_role="' + ds_custom_role + '"';
        }
        if( ds_success_query !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' success_query="' + ds_success_query + '"';
        }
        if( ds_error_query !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' error_query="' + ds_error_query + '"';
        }
        if( ds_success_url !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' success_url="' + ds_success_url + '"';
        }
        if( ds_error_url !== "" ) {
            ds_button_shortcode = ds_button_shortcode + ' error_url="' + ds_error_url + '"';
        }

        ds_button_shortcode = ds_button_shortcode  + ']';

        window.send_to_editor(ds_button_shortcode);

    }
</script>
<div id="ds_add_button" style="display:none;">
  <div class="ds-row">
      <h4><?php _e('Main Button Options','direct-stripe');?></h4>
      <p><?php _e('The button type is required, the amount is required for "payments" and "subscriptions" type buttons.', 'direct-stripe'); ?> </p>
  </div><br/><br/>

    <div class="ds-row ds-flex">
        <label class="ds-one-third" for="ds_type"><?php _e('Button Type','direct-stripe');?></label>
        <div class="ds-one-third">
            <label for="ds_amount"><?php _e('Button Amount field','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos">
                    <?php _e('Payments type amount should be entered without commas and with decimals, Ex: 500 means 5.00 . For subscriptions, enter the plan ID( preferably letters), previously created in Stripe admin panel.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <label class="ds-one-third" for="ds_button_id"><?php _e('Button ID','direct-stripe');?></label>
    </div>
      <div class="ds-row ds-flex">
        <select class="ds-one-third" id="ds_type" required>
              <option value=""><?php _e('Choose button type', 'direct-stripe'); ?></option>
              <option value="payment"><?php _e('Payment', 'direct-stripe'); ?></option>
              <option value="subscription"><?php _e('Subscription', 'direct-stripe'); ?></option>
              <option value="donation"><?php _e('Donation', 'direct-stripe'); ?></option>
        </select>
        <input class="ds-one-third" id="ds_amount" type="text" class="ds-shortcode-amount-field" name="ds_amount">
        <input class="ds-one-third" id="ds_button_id" type="text" class="ds-shortcode-button-id" name="ds_button_id" />
      </div>
        <hr/>
        <div class="ds-row">
            <h4><?php _e('Override general Options','direct-stripe');?></h4>
            <p><?php _e('Set a shop name and product/service description. The label is the text of the button, the panel label is the text of the text of the modal form button', 'direct-stripe'); ?> </p>
        </div>
        <div class="ds-row ds-flex">
            <label class="ds-one-third" for="ds_name"><?php _e('Name','direct-stripe');?></label>
            <label class="ds-one-third" for="ds_label"><?php _e('Label','direct-stripe');?></label>
            <label class="ds-one-third" for="ds_panellabel"><?php _e('Panel Label','direct-stripe');?></label>
        </div>
      <div class="ds-row ds-flex">
        <input class="ds-one-third" id="ds_name" type="text" class="ds-shortcode-name" name="ds_name">
        <input class="ds-one-third" id="ds_label" type="text" class="ds-shortcode-label" name="ds_label">
        <input class="ds-one-third" id="ds_panellabel" type="text" class="ds-shortcode-panellabel" name="ds_panellabel">
      </div>
  
      <div class="ds-row">
        <div class="ds-only-one">
            <label for="ds_description"><?php _e('Description','direct-stripe');?></label><br />
            <textarea id="ds_description" type="text" class="ds-shortcode-description" name="ds_description" rows="3" cols="50"></textarea>
        </div>
      </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-third">
            <label for="ds_currency"><?php _e('Currency','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos">
                    <?php _e('Override the currency set under Direct Stripe -> setup , and use currency per button.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <div class="ds-one-third">
            <label for="ds_tc"><?php _e('Ask for terms and conditions acceptation','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos ds_right"><?php _e('Ask for terms and conditions acceptation. T&C Text and link is editable under styles tab in Direct Stripe options page.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
    </div>
      <div class="ds-row ds-flex">
          <div class="ds-one-third">
            <input id="ds_currency" type="text" class="ds-shortcode-currency" name="ds_currency">
          </div>
          <div class="ds-one-third">
              <select class="ds-one-third" id="ds_tc">
                  <option value=""></option>
                  <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                  <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
              </select>
          </div>
      </div>
  
    <div class="ds-row ds-flex">
      <div class="ds-one-third">
          <label for="ds_billing"><?php _e('Ask for Billing data','direct-stripe');?></label>
          <div class="ds_infos dashicons dashicons-editor-help">
              <span class="ds_button_infos"><?php _e('Ask for further billing information.', 'direct-stripe'); ?>
              </span>
          </div>
      </div>
      <div class="ds-one-third">
          <label for="ds_shipping"><?php _e('Ask for shipping informations','direct-stripe');?></label>
          <div class="ds_infos dashicons dashicons-editor-help">
              <span class="ds_button_infos"><?php _e('Ask for Shipping Data ( It always enable billing data fields)', 'direct-stripe'); ?>
              </span>
          </div>
      </div>
      <div class="ds-one-third">
          <label for="ds_rememberme"><?php _e('Allow remember me option','direct-stripe');?></label>
          <div class="ds_infos dashicons dashicons-editor-help">
              <span class="ds_button_infos ds_right"><?php _e('Allow Stripe to ask user if he wants his email address to be remembered', 'direct-stripe'); ?>
              </span>
          </div>
      </div>
    </div>
    <div class="ds-row ds-flex">
      <div class="ds-one-third">
          <select id="ds_billing">
              <option value=""></option>
              <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
              <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
          </select>
      </div>
      <div class="ds-one-third">
            <select id="ds_shipping">
                <option value=""></option>
                <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
            </select>
      </div>
      <div class="ds-one-third">
              <select id="ds_rememberme">
                  <option value=""></option>
                  <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                  <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
              </select>
      </div>
    </div>
    <hr/>
    <div class="ds-row">
        <h4><?php _e('Options for subscriptions','direct-stripe');?></h4>
    </div>
    
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <label for="ds_coupon"><?php _e('Coupon','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos"><?php _e('Coupon are to be previously created in Stripe admin panel and allows you to create a discount/promotion, enter the coupon ID.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <div class="ds-one-half">
            <label for="ds_setup_fee"><?php _e('Setup Fee','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos ds_right"><?php _e('Setup Fee allows you to charge a one time fee on plan subscription activation. Enter the amount use it and charge, 500 means 5.00', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <input id="ds_coupon" type="text" class="ds-shortcode-coupon" name="ds_coupon">
        </div>
        <div class="ds-one-half">
            <input id="ds_setup_fee" type="text" class="ds-shortcode-setup-fee" name="ds_setup_fee">
        </div>
    </div>

    <hr/>
    <div class="ds-row">
        <h4><?php _e('Options for donations','direct-stripe');?></h4>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-third">
            <label for="ds_zero_decimal"><?php _e('Zero-decimal currencies','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos"><?php _e('Set to "Yes" to let users input Zero decimal currencies values.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-third">
            <select id="ds_zero_decimal">
                <option value=""></option>
                <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
            </select>
        </div>
    </div>
        
    <hr/>
    <div class="ds-row">
        <h4><?php _e('Extra options','direct-stripe');?></h4>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-third">
            <label for="ds_capture"><?php _e('Capture','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos"><?php _e('Set capture to "No" to manually create the charge from your Stripe admin panel within the next 7 days.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <div class="ds-one-third">
            <label for="ds_display_amount"><?php _e('Display amount','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos"><?php _e('Set to "No" to hide the amount in modal form button.', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <div class="ds-one-third">
            <label for="ds_custom_role"><?php _e('Custom Role','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos ds_right"><?php _e('Add a per button custom role to user', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-third">
            <select id="ds_capture">
                <option value=""></option>
                <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
            </select>
        </div>
        <div class="ds-one-third">
            <select id="ds_display_amount">
                <option value=""></option>
                <option value="true"><?php _e('Yes', 'direct-stripe'); ?></option>
                <option value="false"><?php _e('No', 'direct-stripe'); ?></option>
            </select>
        </div>
        <div class="ds-one-third">
            <input id="ds_custom_role" type="text" class="ds-shortcode-custom-role" name="ds_custom_role">
        </div>     
    </div>

    <hr/>

    <div class="ds-row">
        <h4><?php _e('Extra query arguments','direct-stripe');?></h4>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <label for="ds_success_query"><?php _e('Success query arguments','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos"><?php _e('Pass arguments after success button action. Format: myarg1:myvalue1,myarg2:myvalue2', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
        <div class="ds-one-half">
            <label for="ds_error_query"><?php _e('Error query arguments','direct-stripe');?></label>
            <div class="ds_infos dashicons dashicons-editor-help">
                <span class="ds_button_infos ds_right"><?php _e('Pass arguments after error button action. Format: myarg1:myvalue1,myarg2:myvalue2', 'direct-stripe'); ?>
                </span>
            </div>
        </div>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <input id="ds_success_query" type="text" class="ds-shortcode-success-query" name="ds_success_query">
        </div>
        <div class="ds-one-half">
            <input id="ds_error_query" type="text" class="ds-shortcode-error-query" name="ds_error_query">
        </div>
    </div>
    <hr/>

    <div class="ds-row">
        <h4><?php _e('Per button success/error redirections','direct-stripe');?></h4>
        <p><?php _e('Enter the entire http address "http://domain.ext/success-or-error-page" ; this will override redirections globally set.','direct-stripe');?></p>
    </div>
    
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <label for="ds_success_url"><?php _e('Success url','direct-stripe');?></label>
        </div>
        <div class="ds-one-half">
            <label for="ds_error_url"><?php _e('Error url','direct-stripe');?></label>
        </div>
    </div>
    <div class="ds-row ds-flex">
        <div class="ds-one-half">
            <input id="ds_success_url" type="text" class="ds-shortcode-success-url" name="ds_success_url">
        </div>
        <div class="ds-one-half">
            <input id="ds_error_url" type="text" class="ds-shortcode-error-url" name="ds_error_url">
        </div>
    </div>

      <div class="ds-row ds_buttons">
          <input type="button" class="button-primary" value="<?php _e('Insert Button','direct-stripe');?>" onclick="ds_insert_shortcode();"/>
          <a class="button button-secondary" href="#" onclick="tb_remove(); return false;"><?php _e('Cancel','direct-stripe');?></a>
      </div>

</div>
