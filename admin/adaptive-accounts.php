<?php
// Gather payment data
$adaptive_account_data['notify_version'] = $notify_version;
$adaptive_account_data['first_name'] = $first_name;
$adaptive_account_data['last_name'] = $last_name;
$adaptive_account_data['verify_sign'] = $verify_sign;
$adaptive_account_data['charset'] = $charset;
$adaptive_account_data['account_key'] = $account_key;
$adaptive_account_data['confirmation_code'] = $confirmation_code;

// Check to see if this account_key already exists in the database.
$account_key_exists = false;
$sql = "SELECT id FROM " . $db_table_prefix . "adaptive_accounts WHERE account_key = '" . $db -> escape($account_key) . "'";
$result_rows = $db -> fetch_all_array($sql);
foreach($result_rows as $result_row)
	$account_key_exists = true;

// If no record exists create a new one, otherwise update the existing record.
if(!$account_key_exists)
	$adaptive_account_record_id = $db -> query_insert('adaptive_accounts', $adaptive_account_data);
else
	$db -> query_update('adaptive_accounts', $adaptive_account_data, "account_key='" . $db -> escape($account_key) . "'");	
?>