
<div class="wrap">
<?php
/**
 * The form to be loaded on the plugin's admin page
 */
	if( current_user_can( 'edit_users' ) ) {		
		
		// Generate a custom nonce value.
		$zalendo_add_meta_nonce = wp_create_nonce( 'zalendo_add_user_meta_form_nonce' ); 
		$plugin_uri = admin_url('admin.php?page='. $this->plugin_name);
		$redirect_uri = $plugin_uri.'-settings';
		$order_uri = $plugin_uri.'&order=true';
		// Build the Form
?>			
		<h1 class="wp-heading-inline"><?php _e( 'Order Detail', $this->plugin_name ); ?></h1>	
		<hr class="wp-header-end"><br>
		<div class="nds_add_user_meta_form">
			<table class="wp-list-table widefat fixed striped table-view-list posts" role="presentation">
				<tbody>
					<tr>
						<th><b>ORDER ID</b></th>
						<td><?php echo $orderinfo['attributes']['order_id']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER NUMBER</b></th>
						<td><?php echo $orderinfo['attributes']['order_number']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER DATE</b></th>
						<td><?php echo $orderinfo['attributes']['order_date']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER STATUS</b></th>
						<td><?php echo $orderinfo['attributes']['status']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER TYPE</b></th>
						<td><?php echo $orderinfo['attributes']['order_type']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER PRICE</b></th>
						<td><?php echo $orderinfo['attributes']['order_lines_price_amount']; ?></td>
					</tr>
					<tr>
						<th><b>ORDER CURRENCY</b></th>
						<td><?php echo $orderinfo['attributes']['order_lines_price_currency']; ?></td>
					</tr>
					<tr>
						<th><b>MERCHANT ID</b></th>
						<td><?php echo $orderinfo['attributes']['merchant_id']; ?></td>
					</tr>
					<tr>
						<th><b>MERCHANT ORDER ID</b></th>
						<td><?php echo $orderinfo['attributes']['merchant_order_id']; ?></td>
					</tr>
					<tr>
						<th><b>CUSTOMER NUMBER</b></th>
						<td><?php echo $orderinfo['attributes']['customer_number']; ?></td>
					</tr>
					<tr>
						<th><b>CUSTOMER EMAIL</b></th>
						<td><?php echo $orderinfo['attributes']['customer_email']; ?></td>
					</tr>
					<tr>
						<th><b>TOTAL PRODUCTS</b></th>
						<td><?php echo $orderinfo['attributes']['order_lines_count']; ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<table class="wp-list-table widefat fixed striped table-view-list posts" role="presentation">
				<tbody>
					<tr>
						<th></th>
						<th><b>SHIPPING ADDRESS</b></th>
						<th><b>BILLING ADDRESS</b></th>
					</tr>
					<tr>
						<th><b>FIRSTNAME</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['first_name']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['first_name']; ?></th>
					</tr>
					<tr>
						<th><b>LASTNAME</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['last_name']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['last_name']; ?></th>
					</tr>
					<tr>
						<th><b>ADDRESS 1</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['address_line_1']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['address_line_1']; ?></th>
					</tr>
					<tr>
						<th><b>ADDRESS 2</b></th>
						<th><?php echo isset($orderinfo['attributes']['shipping_address']['address_line_2'])?$orderinfo['attributes']['shipping_address']['address_line_2']:''; ?></th>
						<th><?php echo isset($orderinfo['attributes']['billing_address']['address_line_2'])?$orderinfo['attributes']['billing_address']['address_line_2']:''; ?></th>
					</tr>
					<tr>
						<th><b>ADDRESS 3</b></th>
						<th><?php echo isset($orderinfo['attributes']['shipping_address']['address_line_3'])?$orderinfo['attributes']['shipping_address']['address_line_3']:''; ?></th>
						<th><?php echo isset($orderinfo['attributes']['billing_address']['address_line_3'])?$orderinfo['attributes']['billing_address']['address_line_3']:''; ?></th>
					</tr>
					<tr>
						<th><b>ZIPCODE</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['zip_code']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['zip_code']; ?></th>
					</tr>
					<tr>
						<th><b>CITY</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['city']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['city']; ?></th>
					</tr>
					<tr>
						<th><b>COUNTRY</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['country_code']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['country_code']; ?></th>
					</tr>
					<tr>
						<th><b>ADDRESS TYPE</b></th>
						<th><?php echo $orderinfo['attributes']['shipping_address']['address_type']; ?></th>
						<th><?php echo $orderinfo['attributes']['billing_address']['address_type']; ?></th>
					</tr>
					<tr>
						<th><b>SHIPPING NUMBER</b></th>
						<th><?php echo $orderinfo['attributes']['shipment_number']; ?></th>
						<th></th>
					</tr>
				</tbody>
			</table>
			<br>
			<table class="wp-list-table widefat fixed striped table-view-list posts" role="presentation">
				<tbody>
					<tr>
						<th><b>DELIVERY END DATE</b></th>
						<td><?php echo $orderinfo['attributes']['delivery_end_date']; ?></td>
					</tr>
					<tr>
						<th><b>CREATED BY</b></th>
						<td><?php echo $orderinfo['attributes']['created_by']; ?></td>
					</tr>
					<tr>
						<th><b>CREATED AT</b></th>
						<td><?php echo $orderinfo['attributes']['created_at']; ?></td>
					</tr>
					<tr>
						<th><b>TRACKING NUMBER</b></th>
						<td><?php echo $orderinfo['attributes']['tracking_number']; ?></td>
					</tr>
					<tr>
						<th><b>RETURN TRACKING NUMBER</b></th>
						<td><?php echo $orderinfo['attributes']['return_tracking_number']; ?></td>
					</tr>
					<tr>
						<th><b>SHIPPING COSTS</b></th>
						<td><?php echo isset($orderinfo['attributes']['shipping_costs']['amount'])?$orderinfo['attributes']['shipping_costs']['amount']:''; ?></td>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="print_invoice_row">
				<button type="button" class="button print_invoice button-primary">Print Invoice</button>
			</div>
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
