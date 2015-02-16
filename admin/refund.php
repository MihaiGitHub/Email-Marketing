<?php
$refund_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';
$refund_data['mc_gross'] = $mc_gross;
$refund_data['invoice'] = $invoice;
$refund_data['protection_eligibility'] = $protection_eligibility;
$refund_data['payer_id'] = $payer_id;
$refund_data['address_street'] = $address_street;
$refund_data['payment_date'] = $payment_date;
$refund_data['payment_status'] = $payment_status;
$refund_data['charset'] = $charset;
$refund_data['address_zip'] = $address_zip;
$refund_data['mc_shipping'] = $mc_shipping;
$refund_data['mc_handling'] = $mc_handling;
$refund_data['first_name'] = $first_name;
$refund_data['last_name'] = $last_name;
$refund_data['mc_fee'] = $mc_fee;
$refund_data['address_country_code'] = $address_country_code;
$refund_data['address_name'] = $address_name;
$refund_data['notify_version'] = $notify_version;
$refund_data['reason_code'] = $reason_code;
$refund_data['custom'] = $custom;
$refund_data['address_country'] = $address_country;
$refund_data['address_city'] = $address_city;
$refund_data['verify_sign'] = $verify_sign;
$refund_data['payer_email'] = $payer_email;
$refund_data['parent_txn_id'] = $parent_txn_id;
$refund_data['contact_phone'] = $contact_phone;
$refund_data['txn_id'] = $txn_id;
$refund_data['payment_type'] = $payment_type;
$refund_data['payer_business_name'] = $payer_business_name;
$refund_data['address_state'] = $address_state;
$refund_data['receiver_email'] = $receiver_email;
$refund_data['receiver_id'] = $receiver_id;
$refund_data['mc_currency'] = $mc_currency;
$refund_data['raw_log_id'] = $ipn_log_data_id;
$refund_data['residence_country'] = $residence_country;
$refund_data['test_ipn'] = $test_ipn ? 1 : 0;
$refund_data['transaction_subject'] = $transaction_subject;
$refund_data['rp_invoice_id'] = $rp_invoice_id;
$refund_data['recurring_payment_id'] = $recurring_payment_id;
$refund_data['product_name'] = $product_name;
$refund_data['time_created'] = $time_created;
$refund_data['memo'] = $memo;
$refund_data['shipping'] = $shipping;

// Update existing order/payment record to show the payment_status is refunded
// We do this using parent_txn_id from the refund IPN
$payment_status_update_data['payment_status'] = $payment_status;
$db -> query_update('orders', $payment_status_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");
$db -> query_update('recurring_payments', $payment_status_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");
$db -> query_update('subscription_payments', $payment_status_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");

// Check to see if this txn_id already exists in the database.
$txn_id_exists = false;
$sql = "SELECT id, txn_id FROM " . $db_table_prefix . "refunds WHERE txn_id = '" . $db -> escape($txn_id) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$txn_id_exists = true;
	
// If no record exists create a new one, otherwise update the existing record.
if(!$txn_id_exists)
{
	// Add order into DB
	$refund_id = $db -> query_insert('refunds', $refund_data);
	
	// Loop through cart items and add each to related order_items table
	foreach($cart_items as $cart_item)
	{
		$cart_item_data['refund_id'] = $refund_id;
		$cart_item_data['subscr_id'] = $subscr_id;
		$cart_item_data['item_name'] = $cart_item['item_name'];
		$cart_item_data['item_number'] = $cart_item['item_number'];
		$cart_item_data['os0'] = $cart_item['option_selection1'];
		$cart_item_data['on0'] = $cart_item['option_name1'];
		$cart_item_data['os1'] = $cart_item['option_selection2'];
		$cart_item_data['on1'] = $cart_item['option_name2'];
		$cart_item_data['quantity'] = $cart_item['quantity'];
		$cart_item_data['custom'] = $cart_item['custom'];
		$cart_item_data['mc_gross'] = $cart_item['mc_gross'];
		$cart_item_data['mc_handling'] = $cart_item['mc_handling'];
		$cart_item_data['mc_shipping'] = $cart_item['mc_shipping'];
		$cart_item_data['raw_log_id'] = $ipn_log_data_id;
		
		$cart_item_id = $db -> query_insert('order_items', $cart_item_data);
	}
}
else
	$db -> query_update('refunds', $refund_data, "txn_id='" . $db -> escape($txn_id) . "'");
?>