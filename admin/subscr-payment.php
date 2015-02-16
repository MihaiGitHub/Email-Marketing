<?php
// Gather payment data
$subscr_payment_data['first_name'] = $first_name;
$subscr_payment_data['last_name'] = $last_name;
$subscr_payment_data['payer_email'] = $payer_email;
$subscr_payment_data['memo'] = $memo;
$subscr_payment_data['item_name'] = $item_name;
$subscr_payment_data['item_number'] = $item_number;
$subscr_payment_data['os0'] = $option_selection1;
$subscr_payment_data['on0'] = $option_name1;
$subscr_payment_data['os1'] = $option_selection2;
$subscr_payment_data['on1'] = $option_name2;
$subscr_payment_data['quantity'] = $quantity;
$subscr_payment_data['payment_date'] = $payment_date;
$subscr_payment_data['payment_type'] = $payment_type;
$subscr_payment_data['txn_id'] = $txn_id;
$subscr_payment_data['mc_gross'] = $mc_gross;
$subscr_payment_data['mc_fee'] = $mc_fee;
$subscr_payment_data['payment_status'] = $payment_status;
$subscr_payment_data['pending_reason'] = $pending_reason;
$subscr_payment_data['txn_type'] = $txn_type;
$subscr_payment_data['raw_log_id'] = $ipn_log_data_id;
$subscr_payment_data['tax'] = $tax;
$subscr_payment_data['mc_currency'] = $mc_currency;
$subscr_payment_data['reason_code'] = $reason_code;
$subscr_payment_data['custom'] = $custom;
$subscr_payment_data['address_country'] = $address_country;
$subscr_payment_data['subscr_id'] = $subscr_id;
$subscr_payment_data['payer_status'] = $payer_status;
$subscr_payment_data['test_ipn'] = $test_ipn ? 1 : 0;
$subscr_payment_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';

// Update original subscription profile record with available data from new payment


// Check to see if this subscr_id already exists in the database.
$txn_id_exists = false;
$sql = "SELECT id, txn_id FROM " . $db_table_prefix . "subscription_payments WHERE txn_id = '" . $db -> escape($txn_id) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$txn_id_exists = true;

// If no record exists create a new one, otherwise update the existing record.
if(!$txn_id_exists)
	$subscription_payment_id = $db -> query_insert('subscription_payments', $subscr_payment_data);
else
	$db -> query_update('subscription_payments', $subscr_payment_data, "txn_id='" . $db -> escape($txn_id) . "'");	
?>