<?php
/*
Plugin Name: Google Analytics By DG
Description: Simple but powerful plugin to enables <a href="http://www.google.com/analytics/">Google Analytics</a> on all pages of your site.
Version: 1.0.0
Author: Debasish Gharami
Author URI: http://www.gotodevelop.com
*/

if(!defined('ABSPATH'))
  exit("You are at wrong place;");

function dg_activate_hook_google_analytics() {
  add_option('dg_default_anatics_code', 'UA-0000000-0');
}
register_activation_hook(__FILE__, 'dg_activate_hook_google_analytics');


function dg_deactive_hook_google_analytics() {
  delete_option('dg_default_anatics_code');
}
register_deactivation_hook(__FILE__, 'dg_deactive_hook_google_analytics');


function dg_admin_init_google_analytics() {
  register_setting('google_analytics', 'dg_default_anatics_code');
}

function dg_admin_menu_google_analytics() {
  add_management_page('Google Analytics', 'Google Analytics', 'manage_options', 'dg_google_analytics', 'options_page_google_analytics');
}
if (is_admin()) {
  add_action('admin_init', 'dg_admin_init_google_analytics');
  add_action('admin_menu', 'dg_admin_menu_google_analytics');
}

function dg_options_page_google_analytics() {
  include('admin-options.php');  
}


function dg_google_analytics() {
  $dg_default_anatics_code = get_option('dg_default_anatics_code');
?>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', '<?php echo $dg_default_anatics_code ?>']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
<?php
}

if (!is_admin()) {
  add_action('wp_head', 'dg_google_analytics');
}

?>