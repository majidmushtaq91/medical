<?php
/*
Plugin Name: Theme Options
Author : Developed By Majid Khan

*/

// Make sure we don't expose any info if called directly
if ( basename( $_SERVER['PHP_SELF'] ) == basename( __FILE__ ) ) {
	die( 'Sorry, but you cannot access this page directly.' );
}

define( 'CHRSOP_VERSION', '1.0' );
define( 'CHRSOP_REQUIRED_WP_VERSION', '3.0' );
define('AKISMET_PLUGIN_URL', plugin_dir_url( __FILE__ ));



add_action( 'admin_init', 'sam_theme_options_init' );
add_action( 'admin_menu', 'sam_theme_options_add' ); 
add_action( 'admin_head', 'sam_theme_options_icon' );
add_action( 'wp_head', 'chrs_add_header' );
add_action( 'wp_footer', 'chrs_add_footer' );


function sam_theme_options_init(){
	register_setting( 'chrs_options', 'sam_theme_options');
} 


function sam_theme_options_add() {
	add_menu_page( __( 'Theme Options', 'chrstheme' ), __( 'Theme Options', 'chrstheme' ), 'edit_theme_options', 'theme_options', 'sam_theme_options_do' );
}

function sam_theme_options_do() {
	global $select_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
	?>

<div class="chrs-options-wrap">
	<?php screen_icon(); echo "<h2>". __( 'Theme Options', 'chrstheme' ) . "</h2>"; ?>
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
	<div class="updated">
		<p>
			<?php _e( 'Options saved', 'chrstheme' ); ?>
		</p>
	</div>
	<?php endif; ?>
	<form method="post" action="options.php">
		<?php settings_fields( 'chrs_options' ); ?>
		<?php $options = get_option( 'sam_theme_options' ); ?>
		<div class="chrs-settings-block">
			<h3>Globale Settings</h3>
			<table>
				<tr valign="top">
					<th> <?php _e( 'Google Analytics', 'chrstheme' ); ?>
					</th>
					<td><textarea id="sam_theme_options[analytics]" class="large-text" cols="50" rows="10" name="sam_theme_options[analytics]"><?php echo esc_textarea( $options['analytics'] ); ?></textarea>
						<label for="sam_theme_options[analytics]">
							<?php _e( 'Add your Google Analytics code here.', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th> <?php _e( 'Other Code<br />add to header.php', 'chrstheme' ); ?>
					</th>
					<td><textarea id="sam_theme_options[customCodeHeader]" class="large-text" cols="50" rows="10" name="sam_theme_options[customCodeHeader]"><?php echo esc_textarea( $options['customCodeHeader'] ); ?></textarea>
						<label for="sam_theme_options[customCodeHeader]">
							<?php _e( 'Any custom code that needs to be added to header.php', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th> <?php _e( 'Other Code<br />add to footer.php', 'chrstheme' ); ?>
					</th>
					<td><textarea id="sam_theme_options[customCodeFooter]" class="large-text" cols="50" rows="10" name="sam_theme_options[customCodeFooter]"><?php echo esc_textarea( $options['customCodeFooter'] ); ?></textarea>
						<label for="sam_theme_options[customCodeFooter]">
							<?php _e( 'Any custom code that needs to be added to footer.php', 'chrstheme' ); ?>
						</label></td>
				</tr>
			</table>
			<p>Any code added within the above fields, will be automaticly added to the the header.php and footer.php files. No need to edit any theme files.</p>
		</div>
		<div class="chrs-settings-block">
			<h3>Social Media</h3>
			<table>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Facebook URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[fburl]" type="text" name="sam_theme_options[fburl]" value="<?php esc_attr_e( $options['fburl'] ); ?>" />
						<label for="sam_theme_options[fburl]">
							<?php _e( 'http://facebook.com/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Twitter URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[twurl]" type="text" name="sam_theme_options[twurl]" value="<?php esc_attr_e( $options['twurl'] ); ?>" />
						<label for="sam_theme_options[twurl]">
							<?php _e( 'http://twitter.com/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Instagram URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[igurl]" type="text" name="sam_theme_options[igurl]" value="<?php esc_attr_e( $options['igurl'] ); ?>" />
						<label for="sam_theme_options[igurl]">
							<?php _e( 'http://instagram.com/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Google+ URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[gpurl]" type="text" name="sam_theme_options[gpurl]" value="<?php esc_attr_e( $options['gpurl'] ); ?>" />
						<label for="sam_theme_options[gpurl]">
							<?php _e( 'https://plus.google.com/xxxxxxxxx/posts', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Pinterest URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[pturl]" type="text" name="sam_theme_options[pturl]" value="<?php esc_attr_e( $options['pturl'] ); ?>" />
						<label for="sam_theme_options[pturl]">
							<?php _e( 'http://www.pinterest.com/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Youtube URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[yturl]" type="text" name="sam_theme_options[yturl]" value="<?php esc_attr_e( $options['yturl'] ); ?>" />
						<label for="sam_theme_options[yturl]">
							<?php _e( 'http://www.youtube.com/user/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
				<tr valign="top">
					<th scope="row"> <?php _e( 'Yelp URL', 'chrstheme' ); ?>
					</th>
					<td><input id="sam_theme_options[ypurl]" type="text" name="sam_theme_options[yturl]" value="<?php esc_attr_e( $options['ypurl'] ); ?>" />
						<label for="sam_theme_options[ypurl]">
							<?php _e( 'http://www.yelp.com/biz/yourprofileurl', 'chrstheme' ); ?>
						</label></td>
				</tr>
			</table>
		</div>
		<p>
			<input type="submit" value="<?php _e( 'Save Options', 'chrstheme' ); ?>" class="button" />
		</p>
	</form>
	<div class="chrs-settings-block">
		<h3>Usage Instructions</h3>
		<p>Add the following code anywhere within your theme files:</p>
		<p>$themeOptions = get_option( 'sam_theme_options' ); echo $themeOptions['fburl']</p>
		<p>Code List</p>
		<table width="200px" cellpadding="5">
			<tr>
				<td>Facebook</td>
				<td><code>fburl</code></td>
			</tr>
			<tr>
				<td>Twitter</td>
				<td><code>twurl</code></td>
			</tr>
			<tr>
				<td>Instagram</td>
				<td><code>igurl</code></td>
			</tr>
			<tr>
				<td>Google+</td>
				<td><code>gpurl</code></td>
			</tr>
			<tr>
				<td>Pinterest</td>
				<td><code>pturl</code></td>
			</tr>
			<tr>
				<td>Youtube</td>
				<td><code>yturl</code></td>
			</tr>
			<tr>
				<td>Yelp</td>
				<td><code>ypurl</code></td>
			</tr>
		</table>
	</div>
</div>

<style>
.chrs-options-wrap {width:98%;}

.chrs-options-wrap .updated {width:98%;margin-left: 0 !important;}

.chrs-settings-block h3 { padding: 10px; font-weight: normal !important; letter-spacing: 1px; font-size: 18px;background:#0074A2;color:#fff !important }
.chrs-settings-block th { width:150px;text-align:left;}
.chrs-settings-block input[type=text],
.chrs-settings-block textarea {display:block;margin-bottom:5px;padding:3px;width:500px;font-size:12px !important}
.chrs-settings-block label {display:block;font-size:12px;margin-bottom:10px;}

.chrs-settings-block code {padding:5px 10px;}

</style>
<?php
}


// http://melchoyce.github.io/dashicons/
function sam_theme_options_icon() {
	echo '
	<style>
		#adminmenu #toplevel_page_theme_options div.wp-menu-image:before { content: "\f348"; }
	</style>
	';
}

function chrs_add_header()
{
	$themeOptions = get_option( 'sam_theme_options' );
	echo $themeOptions['analytics'];
	echo $themeOptions['customCodeHeader'];
}

function chrs_add_footer()
{
	$themeOptions = get_option( 'sam_theme_options' );
	echo $themeOptions['customCodeFooter'];
}

?>
