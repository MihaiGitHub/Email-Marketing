<?php
// Gather subscription data
$subscription_data['custom'] = $custom;
$subscription_data['subscr_id'] = $subscr_id;
$subscription_data['subscr_date'] = $subscr_date;
$subscription_data['subscr_effective'] = $subscr_effective;
$subscription_data['period1'] = $period1;
$subscription_data['period2'] = $period2;
$subscription_data['period3'] = $period3;
$subscription_data['amount1'] = $amount1;
$subscription_data['amount2'] = $amount2;
$subscription_data['amount3'] = $amount3;
$subscription_data['mc_amount1'] = $mc_amount1;
$subscription_data['mc_amount2'] = $mc_amount2;
$subscription_data['mc_amount3'] = $mc_amount3;
$subscription_data['recurring'] = $recurring;
$subscription_data['reattempt'] = $reattempt;
$subscription_data['raw_log_id'] = $ipn_log_data_id;
$subscription_data['retry_at'] = $retry_at;
$subscription_data['recur_times'] = $recur_times;
$subscription_data['username'] = $username;
$subscription_data['password'] = $password;
$subscription_data['txn_id'] = $txn_id;
$subscription_data['memo'] = $memo;
$subscription_data['payer_email'] = $payer_email;
$subscription_data['txn_type'] = $txn_type;
$subscription_data['btn_id'] = $btn_id;
$subscription_data['test_ipn'] = $test_ipn ? 1 : 0;
$subscription_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';

// Check to see if this subscr_id already exists in the database.
$subscr_id_exists = false;
$sql = "SELECT id, subscr_id FROM " . $db_table_prefix . "subscriptions WHERE subscr_id = '" . $db -> escape($subscr_id) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$subscr_id_exists = true;

// If no record exists create a new one, otherwise update the existing record.
if(!$subscr_id_exists)
	$subscription_id = $db -> query_insert('subscriptions', $subscription_data);
else
	$db -> query_update('subscriptions', $subscription_data, "subscr_id='" . $db -> escape($subscr_id) . "'");	
?>