<?php
define("ACCOUNT_CONNECTED",isset($account) && $account !== null);
define("ADVANCED_VIEW",false);
?>


<div class="wrap">
	<h1><?php esc_html_e( 'FediEmbedi Configuration', 'fediembedi' ); ?></h1>
	<br>
<br>
<br>
	<form method="POST">
		<?php wp_nonce_field( 'fediembedi-configuration' ); ?>
		<div style="display:<?php echo !ACCOUNT_CONNECTED ? "block":"none"?>">
				<input type="text" id="instance" name="instance" size="80" value="<?php esc_attr_e( $instance ); ?>" list="mInstances">
				<input class="button button-primary" type="submit" value="<?php esc_attr_e( 'Connect to your instance', 'fediembedi' ); ?>" name="save" id="save">
				<br><small>The currently supported software are Mastodon, Pleroma, Pixelfed.</small>
		</div>
		<div style="display:<?php echo ACCOUNT_CONNECTED ? "block" : "none"?>">
				<div class="account">
						<a href="<?php echo $account->url ?>" target="_blank"><img class="m-avatar" src="<?php echo $account->avatar ?>"></a>
					<div class="details">
						<?php if(ACCOUNT_CONNECTED): ?>
							<div class="connected"><?php esc_html_e( 'Connected as', 'fediembedi' ); ?>&nbsp;<?php echo $account->username ?></div>
							<a class="link" href="<?php echo $account->url ?>" target="_blank"><?php echo $account->url ?></a>

							<p><a href="<?php echo $_SERVER['REQUEST_URI'] . '&disconnect' ?>" class="button"><?php esc_html_e( 'Disconnect', 'fediembedi' ); ?></a>

						<?php else: ?>
							<div class="disconnected"><?php esc_html_e( 'Disconnected', 'fediembedi' ); ?></div>
						<?php endif ?>
					</div>
					<div class="separator"></div>
				</div>
		</div>
		<div class="clear"></div>

	</form>
<?php
	//require("instanceList.php")
?>
</div>
