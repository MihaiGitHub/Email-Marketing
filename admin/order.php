<?php
// Gather order data.
$order_data['user_id'] = $id;
$order_data['receiver_email'] = $receiver_email;
$order_data['payment_status'] = $payment_status;
$order_data['pending_reason'] = $pending_reason;
$order_data['payment_date'] = $payment_date;
$order_data['mc_gross'] = $mc_gross;
$order_data['mc_fee'] = $mc_fee;
$order_data['tax'] = $tax;
$order_data['mc_currency'] = $mc_currency;
$order_data['txn_id'] = $txn_id;
$order_data['txn_type'] = $txn_type;
$order_data['first_name'] = $first_name;
$order_data['last_name'] = $last_name;
$order_data['address_street'] = $address_street;
$order_data['address_city'] = $address_city;
$order_data['address_state'] = $address_state;
$order_data['address_zip'] = $address_zip;
$order_data['address_country'] = $address_country;
$order_data['address_country_code'] = $address_country_code;
$order_data['address_status'] = $address_status;
$order_data['payer_email'] = $payer_email;
$order_data['payer_status'] = $payer_status;
$order_data['payment_type'] = $payment_type;
$order_data['notify_version'] = $notify_version;
$order_data['verify_sign'] = $verify_sign;
$order_data['address_name'] = $address_name;
$order_data['protection_eligibility'] = $protection_eligibility;
$order_data['subscr_id'] = $subscr_id;
$order_data['custom'] = $custom;
$order_data['reason_code'] = $reason_code;
$order_data['contact_phone'] = $contact_phone;
$order_data['item_name'] = $item_name;
$order_data['item_number'] = $item_number;
$order_data['option_name1'] = $option_name1;
$order_data['option_selection1'] = $option_selection1;
$order_data['option_name2'] = $option_name2;
$order_data['option_selection2'] = $option_selection2;
$order_data['invoice'] = $invoice;
$order_data['for_auction'] = $for_auction;
$order_data['auction_buyer_id'] = $auction_buyer_id;
$order_data['auction_closing_date'] = $auction_closing_date;
$order_data['auction_multi_item'] = $auction_multi_item;
$order_data['shipping_method'] = $shipping_method;
$order_data['memo'] = $memo;
$order_data['handling_amount'] = $handling_amount;
$order_data['insurance_amount'] = $insurance_amount;
$order_data['shipping_discount'] = $shipping_discount;
$order_data['payer_business_name'] = $payer_business_name;
$order_data['receiver_id'] = $receiver_id;
$order_data['transaction_subject'] = $transaction_subject;
$order_data['raw_log_id'] = $ipn_log_data_id;
$order_data['btn_id'] = $btn_id;
$order_data['test_ipn'] = $test_ipn ? 1 : 0;
$order_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';
$order_data['shipping'] = $shipping;
$order_data['mc_shipping'] = $mc_shipping;
$order_data['mc_handling'] = $mc_handling;

// Check to see if this txn_id already exists in the database.
$txn_id_exists = false;
$sql = "SELECT id, txn_id FROM " . $db_table_prefix . "orders WHERE txn_id = '" . $db -> escape($txn_id) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$txn_id_exists = true;

// If no record exists create a new one, otherwise update the existing record.
if(!$txn_id_exists)
{
	// Add order into DB
	$order_id = $db -> query_insert('orders', $order_data);
	
	// Loop through cart items and add each to related order_items table
	foreach($cart_items as $cart_item)
	{
		$cart_item_data['order_id'] = $order_id;
		$cart_item_data['subscr_id'] = $subscr_id;
		$cart_item_data['item_name'] = $cart_item['item_name'];
		$cart_item_data['item_number'] = $cart_item['item_number'];
		$cart_item_data['os0'] = $cart_item['option_selection1'];
		$cart_item_data['on0'] = $cart_item['option_name1'];
		$cart_item_data['os1'] = $cart_item['option_selection2'];
		$cart_item_data['on1'] = $cart_item['option_name2'];
		$cart_item_data['os2'] = $cart_item['option_selection3'];
		$cart_item_data['on2'] = $cart_item['option_name3'];
		$cart_item_data['os3'] = $cart_item['option_selection4'];
		$cart_item_data['on3'] = $cart_item['option_name4'];
		$cart_item_data['os4'] = $cart_item['option_selection5'];
		$cart_item_data['on4'] = $cart_item['option_name5'];
		$cart_item_data['os5'] = $cart_item['option_selection6'];
		$cart_item_data['on5'] = $cart_item['option_name6'];
		$cart_item_data['os6'] = $cart_item['option_selection7'];
		$cart_item_data['on6'] = $cart_item['option_name7'];
		$cart_item_data['os7'] = $cart_item['option_selection8'];
		$cart_item_data['on7'] = $cart_item['option_name8'];
		$cart_item_data['os8'] = $cart_item['option_selection9'];
		$cart_item_data['on8'] = $cart_item['option_name9'];
		$cart_item_data['quantity'] = $cart_item['quantity'];
		$cart_item_data['custom'] = $cart_item['custom'];
		$cart_item_data['mc_gross'] = $cart_item['mc_gross'];
		$cart_item_data['mc_handling'] = $cart_item['mc_handling'];
		$cart_item_data['mc_shipping'] = $cart_item['mc_shipping'];
		$cart_item_data['raw_log_id'] = $ipn_log_data_id;
		$cart_item_data['btn_id'] = $cart_item['btn_id'];
		
		$cart_item_id = $db -> query_insert('order_items', $cart_item_data);
	}
}
else
	$db -> query_update('orders', $order_data, "txn_id='" . $db -> escape($txn_id) . "'");
?>