<?php
// Gather dispute data
$dispute_data['txn_id'] = $txn_id;
$dispute_data['case_id'] = $case_id;
$dispute_data['case_type'] = $case_type;
$dispute_data['case_creation_date'] = $case_creation_date;
$dispute_data['payment_date'] = $payment_date;
$dispute_data['receipt_id'] = $receipt_id;
$dispute_data['verify_sign'] = $verify_sign;
$dispute_data['payer_email'] = $payer_email;
$dispute_data['payer_id'] = $payer_id;
$dispute_data['invoice'] = $invoice;
$dispute_data['reason_code'] = $reason_code;
$dispute_data['custom'] = $custom;
$dispute_data['notify_version'] = $notify_version;
$dispute_data['txn_type'] = $txn_type;
$dispute_data['raw_log_id'] = $ipn_log_data_id;
$dispute_data['test_ipn'] = $test_ipn ? 1 : 0;
$dispute_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';

// If this is simply a new dispute create/update accordingly.
if(strtoupper($txn_type) == 'NEW_CASE')
{
	// Check to see if this case_id already exists in the database.
	$case_id_exists = false;
	$sql = "SELECT id, case_id FROM " . $db_table_prefix . "disputes WHERE case_id = '" . $db -> escape($case_id) . "'";
	$result_rows = $db -> fetch_all_array($sql);
	foreach($result_rows as $result_row)
		$case_id_exists = true;
	
	// If no record exists add a new one, otherwise update existing record.
	if(!$case_id_exists)
		$dispute_id = $db -> query_insert('disputes', $dispute_data);
	else
		$db -> query_update('disputes', $dispute_data, "case_id='" . $db -> escape($case_id) . "'");	
}

// If this is a Reversed or Canceled-Reversal update the existing orderss/payment record's payment_status and reason_code 
// using parent_txn_id to find the original order.  
if(strtoupper($payment_status) == 'REVERSED' || strtoupper($payment_status) == 'CANCELED_REVERSAL')
{
	$payment_update_data['payment_status'] = strtoupper($payment_status) == 'CANCELED_REVERSAL' ? 'Completed' : $payment_status;
	$payment_update_data['reason_code'] = $reason_code;
	
	$db -> query_update('orders', $payment_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");
	$db -> query_update('recurring_payments', $payment_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");
	$db -> query_update('subscription_payments', $payment_update_data, "txn_id='" . $db -> escape($parent_txn_id) . "'");
}
?>