<?php
// Gather profile data.
$recurring_payment_profile_data['payment_cycle'] = $payment_cycle;
$recurring_payment_profile_data['txn_type'] = $txn_type;
$recurring_payment_profile_data['last_name'] = $last_name;
$recurring_payment_profile_data['first_name'] = $first_name;
$recurring_payment_profile_data['next_payment_date'] = $next_payment_date;
$recurring_payment_profile_data['residence_country'] = $residence_country;
$recurring_payment_profile_data['initial_payment_amount'] = $initial_payment_amount;
$recurring_payment_profile_data['rp_invoice_id'] = $rp_invoice_id;
$recurring_payment_profile_data['currency_code'] = $currency_code;
$recurring_payment_profile_data['time_created'] = $time_created;
$recurring_payment_profile_data['verify_sign'] = $verify_sign;
$recurring_payment_profile_data['period_type'] = $period_type;
$recurring_payment_profile_data['payer_status'] = $payer_status;
$recurring_payment_profile_data['payer_email'] = $payer_email;
$recurring_payment_profile_data['receiver_email'] = $receiver_email;
$recurring_payment_profile_data['payer_id'] = $payer_id;
$recurring_payment_profile_data['raw_log_id'] = $ipn_log_data_id;
$recurring_payment_profile_data['product_type'] = $product_type;
$recurring_payment_profile_data['payer_business_name'] = $payer_business_name;
$recurring_payment_profile_data['shipping'] = $shipping;
$recurring_payment_profile_data['memo'] = $memo;
$recurring_payment_profile_data['amount_per_cycle'] = $amount_per_cycle;
$recurring_payment_profile_data['profile_status'] = $profile_status;
$recurring_payment_profile_data['notify_version'] = $notify_version;
$recurring_payment_profile_data['amount'] = $amount;
$recurring_payment_profile_data['outstanding_balance'] = $outstanding_balance;
$recurring_payment_profile_data['recurring_payment_id'] = $recurring_payment_id;
$recurring_payment_profile_data['product_name'] = $product_name;
$recurring_payment_profile_data['test_ipn'] = $test_ipn ? 1 : 0;
$recurring_payment_profile_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';

// Check to see if this recurring payment profile already exists in the database.
// If rp_invoice_id is available search by that.  Otherwise use PayPal's recurring_payment_id
$profile_exists = false;
if($rp_invoice_id != '')
{
	$sql = "SELECT id, rp_invoice_id FROM " . $db_table_prefix . "recurring_payment_profiles WHERE rp_invoice_id = '" . $db -> escape($rp_invoice_id) . "'";
	$result_rows = $db -> fetch_all_array($sql);
	foreach($result_rows as $result_row)
		$profile_exists = true;	
}
else
{
	$sql = "SELECT id, recurring_payment_id FROM " . $db_table_prefix . "recurring_payment_profiles WHERE recurring_payment_id = '" . $db -> escape($recurring_payment_id) . "'";
	$result_rows = $db -> fetch_all_array($sql);
	foreach($result_rows as $result_row)
		$profile_exists = true;
}

// If the profile doesn't exist go ahead and create it.  Otherwise, update the existing record with current data.
if(!$profile_exists)
	$recurring_payment_profile_id = $db -> query_insert('recurring_payment_profiles', $recurring_payment_profile_data);
else
{
	if($rp_invoice_id != '')
		$db -> query_update('recurring_payment_profiles', $recurring_payment_profile_data, "rp_invoice_id='" . $db -> escape($rp_invoice_id) . "'");
	else
		$db -> query_update('recurring_payment_profiles', $recurring_payment_profile_data, "recurring_payment_id='" . $db -> escape($recurring_payment_id) . "'");
}
?>