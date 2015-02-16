<?php
// Gather payment data.
$recurring_payment_data['mc_gross'] = $mc_gross;
$recurring_payment_data['protection_eligibility'] = $protection_eligibility;
$recurring_payment_data['payment_date'] = $payment_date;
$recurring_payment_data['payment_status'] = $payment_status;
$recurring_payment_data['mc_fee'] = $mc_fee;
$recurring_payment_data['notify_version'] = $notify_version;
$recurring_payment_data['payer_status'] = $payer_status;
$recurring_payment_data['currency_code'] = $currency_code;
$recurring_payment_data['verify_sign'] = $verify_sign;
$recurring_payment_data['amount'] = $amount;
$recurring_payment_data['txn_id'] = $txn_id;
$recurring_payment_data['payment_type'] = $payment_type;
$recurring_payment_data['receiver_email'] = $receiver_email;
$recurring_payment_data['raw_log_id'] = $ipn_log_data_id;
$recurring_payment_data['receiver_id'] = $receiver_id;
$recurring_payment_data['txn_type'] = $txn_type;
$recurring_payment_data['mc_currency'] = $mc_currency;
$recurring_payment_data['residence_country'] = $residence_country;
$recurring_payment_data['receipt_id'] = $receipt_id;
$recurring_payment_data['transaction_subject'] = $transaction_subject;
$recurring_payment_data['shipping'] = $shipping;
$recurring_payment_data['product_type'] = $product_type;
$recurring_payment_data['time_created'] = $time_created;
$recurring_payment_data['reason_code'] = $reason_code;
$recurring_payment_data['rp_invoice_id'] = $rp_invoice_id;
$recurring_payment_data['recurring_payment_id'] = $recurring_payment_id;
$recurring_payment_data['test_ipn'] = $test_ipn ? 1 : 0;
$recurring_payment_data['ipn_status'] = $valid ? 'Verified' : 'Invalid';

// Update the original recurring payment profile record with new data included in this payment
$recurring_payment_profile_update_data['next_payment_date'] = $next_payment_date;
$recurring_payment_profile_update_data['outstanding_balance'] = $outstanding_balance;
$recurring_payment_profile_update_data['profile_status'] = $profile_status;

$db -> query_update('recurring_payment_profiles', $recurring_payment_profile_update_data, "recurring_payment_id='" . $db -> escape($recurring_payment_id) . "'");

// Check to see if this recurring payment already exists in the database.
$txn_id_exists = false;
$sql = "SELECT id, txn_id FROM " . $db_table_prefix . "recurring_payments WHERE txn_id = '" . $db -> escape($txn_id) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$txn_id_exists = true;

// If no record exists create a new one, otherwise update the existing record.
if(!$txn_id_exists)
	$recurring_payment_local_id = $db -> query_insert('recurring_payments', $recurring_payment_data);
else
	$db -> query_update('recurring_payments', $recurring_payment_data, "txn_id='" . $db -> escape($txn_id) . "'");
?>