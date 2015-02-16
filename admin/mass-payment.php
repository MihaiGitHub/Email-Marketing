<?php
// Loop through mass payments and add/update each in the database
foreach($mass_payments as $mass_payment)
{	
	// Add additional data to the already defined $mass_payment array
	$mass_payment['txn_type'] = $txn_type;
	$mass_payment['raw_log_id'] = $ipn_log_data_id;
	$mass_payment['test_ipn'] = $test_ipn ? 1 : 0;
	$mass_payment['ipn_status'] = $valid ? 'Verified' : 'Invalid';
	
	// Check to see if this masspay_txn_id already exists in the database.
	$masspay_txn_id_exists = false;
	$sql = "SELECT id, masspay_txn_id FROM " . $db_table_prefix . "mass_payments WHERE masspay_txn_id = '" . $db -> escape($mass_payment['masspay_txn_id']) . "'";
	$result_rows = $db -> fetch_all_array($sql);
	foreach($result_rows as $result_row)
		$masspay_txn_id_exists = true;
		
	// If no record exists create a new one, otherwise update the existing record.
	if(!$masspay_txn_id_exists)
		$mass_payment_id = $db -> query_insert('mass_payments', $mass_payment);
	else
		$db -> query_update('mass_payments', $mass_payment, "masspay_txn_id='" . $db -> escape($mass_payment['masspay_txn_id']) . "'");
}
?>