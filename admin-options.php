<div class="wrap">
<h2><?php _e("Google Analytics"); ?> <small><?php _e("by DG"); ?></small></h2>
<?php if( isset($_GET['settings-updated']) && strtolower(strip_tags(trim($_GET['settings-updated']))) == "true" ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('dg_google_analytics'); ?>

<table class="form-table">
<tr valign="top">
<th scope="row"><?php _e("Google Analytics ID:"); ?></th>
<td><input type="text" name="dg_default_anatics_code" value="<?php echo get_option('dg_default_anatics_code'); ?>" /></td>
</tr>

<tr>
	<td><input type="hidden" name="action" value="update" /></td>
	<td><?php submit_button("Save Changes"); ?></td>
</tr>
</table>

</form>
</div>