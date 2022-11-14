
<div class="wrap">
<?php
/**
 * The form to be loaded on the plugin's admin page
 */
	if( current_user_can( 'edit_users' ) ) {		
		
		// Generate a custom nonce value.
		$zalendo_add_meta_nonce = wp_create_nonce( 'zalendo_add_user_meta_form_nonce' ); 
		$redirect_uri = admin_url('admin.php?page='. $this->plugin_name).'-settings';
		$plugin_uri = admin_url('admin.php?page='. $this->plugin_name);
		// Build the Form
?>			
		<h1 class="wp-heading-inline"><?php _e( 'General Settings', $this->plugin_name ); ?></h1>	
		<button type="button" class="page-title-action" id="add_new_client">Add New</button>
		<hr class="wp-header-end"><br>
		<div class="nds_add_user_meta_form">
			<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post" id="nds_add_user_meta_form" style='display:none;'>			
				<input type="hidden" name="action" value="zalendo_form_response">
				<input type="hidden" name="zalendo_add_user_meta_nonce" value="<?php echo $zalendo_add_meta_nonce ?>" />
				<input type="hidden" name="redirect" value="<?php echo $redirect_uri;  ?>" />
				<input type="hidden" name="client_id" value="" id="input_client_id">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row"><label for="client_id">Client ID</label></th>
							<td><input name="zalendo_client_id" type="text" id="zalendo_client_id" value="" class="regular-text" required></td>
						</tr>
						<tr>
							<th scope="row"><label for="client_secret">Client Secret</label></th>
							<td><input name="zalendo_client_secret" type="text" id="zalendo_client_secret" value="" class="regular-text" required></td>
						</tr>
					</tbody>
				</table>
				<p class="submit">
					<input type="button" name="cancel" id="cancel" class="button button-primary" value="Cancel">
					<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
				</p>
			</form>
			<table class="wp-list-table widefat fixed striped table-view-list posts" role="presentation">
				<thead>
					<tr>
						<th>Client ID</th>
						<th>Client Secret</th>
						<th>Token Expires In</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$adate=current_time('mysql', 1);
					if($result){
						foreach($result as $r){
							echo '<tr id="client_'.$r->id.'">';
							echo '<td>'.$r->client_id.'</td>';
							echo '<td>'.$r->client_secret.'</td>';
							echo '<td>'.$r->expires_in_time;
							if($adate>=$r->expires_in_time){
								echo '<span class="expired" style="color:#f00;"> (Expired)</span>';
							}
							echo '</td>';
							echo '<td>';
							echo '<button type="button" data-id="'.$r->id.'" class="edit button button-primary">Edit</button><button type="button" data-id="'.$r->id.'" class="delete button button-link-delete">Delete</button>';
							if($adate>=$r->expires_in_time){
								echo '<a class="button refresh_token" href="'.$redirect_uri.'&client_id='.$r->id.'&update_token=true">Refresh token</a>';
							}
							echo '</td>';
							echo '</tr>';
						}
					}
					else{ ?>
						<tr>
							<td colspan="4">No Data to display</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<div id="nds_form_feedback"></div>
		</div>
	<?php    
	}
	else {  
	?>
		<p> <?php __("You are not authorized to perform this operation.", $this->plugin_name) ?> </p>
	<?php   
	}
?>
</div>
