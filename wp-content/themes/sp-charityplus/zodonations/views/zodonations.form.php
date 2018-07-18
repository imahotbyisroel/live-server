<?php
$moneyraise = get_post_meta($donation_id, 'zodonations_moneyraise', true);
$currency = apply_filters('zo_currency', ZoDonationsPageSetting::$currency);
$zo_currency = get_option('zo_currency', 'USD');
$symbol_position = get_option('symbol_position', 0);
$symbol = $currency[$zo_currency]['symbol'];
$active_monthly_donations = get_option('active_monthly_donations',0);
?>
<!-- Replaced top_donate_link to $el_class -->
<a href="#" data-toggle="modal" data-target="#site_donate_form<?php echo esc_attr($donation_id); ?>"
   class="<?php echo esc_attr($el_class); ?>">
    <?php if (!empty($icon)): ?>
        <i class="<?php echo esc_attr($icon); ?>"></i>
    <?php endif ?>
    <?php echo esc_html($label_btn); ?>
</a>
<div class="modal fade site_donate_form" id="site_donate_form<?php echo esc_attr($donation_id); ?>" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="popup_title">
                <?php
                if ($donation_id == 0):
                    esc_html_e('Donate', 'sp-charityplus');
                else:
                    esc_html_e('You are donating to:', 'sp-charityplus') ?>
                    <h4><?php echo get_the_title($donation_id); ?></h4>
                <?php endif;
                ?>
                <div class="close_popup" data-dismiss="modal">x</div>
            </div>
            <div class="popup_content">
                <form method="post" action="" id="site_donation_popup_form<?php echo esc_attr($donation_id); ?>"
                      class="site_donation_popup_form">
                    <div class="amount_wrapper">
                        <p><?php esc_html_e('How much would you like to donate?', 'sp-charityplus'); ?></p>
                        <?php
                        if ($donation_id == 0 || $moneyraise == null): ?>
                            <input type="radio" id="amount10" name="donor[amount]" checked="checked" value="10"/><label
                                    for="amount10"
                                    class="button active"><?php echo esc_attr($symbol_position != 1 ? "{$symbol}10" : "10{$symbol}"); ?></label>
                            <input type="radio" id="amount20" name="donor[amount]" value="20"/><label for="amount20"
                                                                                                      class="button bordered_1"><?php echo esc_attr($symbol_position != 1 ? "{$symbol}20" : "20{$symbol}"); ?></label>
                            <input type="radio" id="amount30" name="donor[amount]" value="30"/><label for="amount30"
                                                                                                      class="button bordered_1"><?php echo esc_attr($symbol_position != 1 ? "{$symbol}30" : "30{$symbol}") ?></label>
                        <?php else:
                            $moneyraise = explode(',', $moneyraise);
                            foreach ($moneyraise as $k => $v): ?>
                                <?php if ($k == 0): ?>
                                    <input type="radio" id="amount<?php echo esc_attr($v); ?>" checked="checked"
                                           name="donor[amount]" value="<?php echo esc_attr($v); ?>"/><label
                                            for="amount<?php echo esc_attr($v); ?>"
                                            class="button active"><?php echo esc_attr($symbol_position != 1 ? "{$symbol}{$v}" : "{$v}{$symbol}"); ?></label>
                                <?php else: ?>
                                    <input type="radio" id="amount<?php echo esc_attr($v); ?>" name="donor[amount]"
                                           value="<?php echo esc_attr($v); ?>"/><label for="amount<?php echo esc_attr($v); ?>"
                                                                             class="button bordered_1"><?php echo esc_attr($symbol_position != 1 ? "{$symbol}{$v}" : "{$v}{$symbol}"); ?></label>
                                <?php endif; ?>
                            <?php endforeach;
                        endif; ?>
                        <input type="text" class="custom-amount form-control" name="donor[custom_amount]"
                               placeholder="Your amount (<?php echo esc_html($zo_currency); ?>)"/>
                        <?php if($active_monthly_donations) : ?>
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-12" style="margin: 0;">
                                <div class="form-group">
                                    <label class="form-checkbox"><input type="checkbox" name="donor[apply_repeat]"
                                                                        value="1">
                                        <span><?php esc_html_e('Apply monthly','sp-charityplus') ?> </span><span class="zodonations-repeat-hidden"><?php esc_html_e('In','sp-charityplus') ?>  </span>
                                        <select name="donor[count_repeat]" class="zodonations-repeat-hidden" style="width: auto;max-width: 100%;min-width: 130px;height: auto;padding: 10px;">
                                            <?php for ($i = 2; $i < 13; $i++): ?>
                                                <option value="<?php echo esc_attr($i) ?>"><?php echo esc_attr($i) ?> <?php esc_html_e('Month','sp-charityplus') ?></option>
                                            <?php endfor; ?>
                                            <?php for ($i = 2; $i < 5; $i++): ?>
                                                <option value="<?php echo esc_attr($i*12) ?>"><?php echo esc_attr($i) ?> <?php esc_html_e('Year','sp-charityplus') ?> </option>
                                            <?php endfor; ?>
                                        </select></label>
                                </div>
                            </div>
                        </div>
                        <?php endif ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" name="donor[first_name]" class="form-control"
                                       id="site_donor_first_name" value=""
                                       placeholder="<?php esc_html_e('First Name *', 'sp-charityplus'); ?>" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="text" name="donor[last_name]" class="form-control"
                                       id="site_donor_last_name" value=""
                                       placeholder="<?php esc_html_e('Last name *', 'sp-charityplus'); ?>" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="email" name="donor[email]" class="form-control" id="site_donor_email"
                                       value="" placeholder="<?php esc_html_e('E-mail *', 'sp-charityplus'); ?>" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <input type="tel" name="donor[phone]" class="form-control" id="site_donor_phone"
                                       value="" placeholder="<?php esc_html_e('Phone *', 'sp-charityplus'); ?>" required/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <textarea id="site_donor_address" class="form-control" name="donor[address]"
                                          placeholder="<?php esc_html_e('Address', 'sp-charityplus'); ?>"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <textarea id="site_donor_notes" class="form-control" name="donor[notes]"
                                          placeholder="<?php esc_html_e('Additional Note', 'sp-charityplus'); ?>"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row subscription">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-checkbox"><input type="checkbox" name="donor[sign_up]" value="1">
                                    <span><?php esc_html_e('Sign up for mailing list', 'sp-charityplus'); ?></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row action">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <button type="submit"
                                        class="btn btn-primary button_donate"><?php esc_html_e('Donate', 'sp-charityplus'); ?></button>
                                <div class="loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>
                                <input type="hidden" name="action" value="donate"/>
                                <input type="hidden" name="donor[donation_id]" value="<?php echo esc_attr($donation_id); ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <img class="paypal_icon" alt="" src="<?php echo ZODONS_PLG_URL . '/css/paypal.png'; ?>"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>