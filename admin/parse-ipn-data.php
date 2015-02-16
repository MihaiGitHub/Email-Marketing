<?php
// Buyer Information   
$address_city = isset($_POST['address_city']) ? $_POST['address_city'] : '';           
$address_country = isset($_POST['address_country']) ? $_POST['address_country'] : '';         
$address_country_code = isset($_POST['address_country_code']) ? $_POST['address_country_code'] : '';     
$address_name = isset($_POST['address_name']) ? $_POST['address_name'] : '';          
$address_state = isset($_POST['address_state']) ? $_POST['address_state'] : '';           
$address_status = isset($_POST['address_status']) ? $_POST['address_status'] : '';   
$address_street = isset($_POST['address_street']) ? $_POST['address_street'] : '';   
$address_zip = isset($_POST['address_zip']) ? $_POST['address_zip'] : '';   
$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';   
$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';   
$payer_business_name = isset($_POST['payer_business_name']) ? $_POST['payer_business_name'] : '';   
$payer_email = isset($_POST['payer_email']) ? $_POST['payer_email'] : '';   
$payer_id = isset($_POST['payer_id']) ? $_POST['payer_id'] : '';   
$payer_status = isset($_POST['payer_status']) ? $_POST['payer_status'] : '';   
$contact_phone = isset($_POST['contact_phone']) ? $_POST['contact_phone'] : '';   
$residence_country = isset($_POST['residence_country']) ? $_POST['residence_country'] : '';   
  
// Basic Information   
$notify_version = isset($_POST['notify_version']) ? $_POST['notify_version'] : ''; 
$verify_sign = isset($_POST['verify_sign']) ? $_POST['verify_sign'] : '';
$charset = isset($_POST['charset']) ? $_POST['charset'] : '';   
$btn_id = isset($_POST['btn_id']) ? $_POST['btn_id'] : '';
$business = isset($_POST['business']) ? $_POST['business'] : '';   
$item_name = isset($_POST['item_name']) ? $_POST['item_name'] : '';   
$item_number = isset($_POST['item_number']) ? $_POST['item_number'] : '';   
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;   
$receiver_email = isset($_POST['receiver_email']) ? $_POST['receiver_email'] : '';   
$receiver_id = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : '';  
$transaction_subject = isset($_POST['transaction_subject']) ? $_POST['transaction_subject'] : '';
  
// Cart Items
$num_cart_items = isset($_POST['num_cart_items']) ? $_POST['num_cart_items'] : '';

$i = 1;
$cart_items = array();   
while(isset($_POST['item_number' . $i]))   
{   
	$item_number = isset($_POST['item_number' . $i]) ? $_POST['item_number' . $i] : '';   
	$item_name = isset($_POST['item_name' . $i]) ? $_POST['item_name' . $i] : '';   
	$quantity = isset($_POST['quantity' . $i]) ? $_POST['quantity' . $i] : '';  
	$mc_gross = isset($_POST['mc_gross_' . $i]) ? $_POST['mc_gross_' . $i] : 0;
	$mc_handling = isset($_POST['mc_handling' . $i]) ? $_POST['mc_handling' . $i] : 0;
	$mc_shipping = isset($_POST['mc_shipping' . $i]) ? $_POST['mc_shipping' . $i] : 0;
	$custom = isset($_POST['custom' . $i]) ? $_POST['custom' . $i] : '';   
	$option_name1 = isset($_POST['option_name1_' . $i]) ? $_POST['option_name1_' . $i] : '';   
	$option_selection1 = isset($_POST['option_selection1_' . $i]) ? $_POST['option_selection1_' . $i] : '';   
	$option_name2 = isset($_POST['option_name2_' . $i]) ? $_POST['option_name2_' . $i] : '';   
	$option_selection2 = isset($_POST['option_selection2_' . $i]) ? $_POST['option_selection2_' . $i] : '';
	$option_name3 = isset($_POST['option_name3_' . $i]) ? $_POST['option_name3_' . $i] : '';   
	$option_selection3 = isset($_POST['option_selection3_' . $i]) ? $_POST['option_selection3_' . $i] : '';
	$option_name4 = isset($_POST['option_name4_' . $i]) ? $_POST['option_name4_' . $i] : '';   
	$option_selection4 = isset($_POST['option_selection4_' . $i]) ? $_POST['option_selection4_' . $i] : '';
	$option_name5 = isset($_POST['option_name5_' . $i]) ? $_POST['option_name5_' . $i] : '';   
	$option_selection5 = isset($_POST['option_selection5_' . $i]) ? $_POST['option_selection5_' . $i] : '';
	$option_name6 = isset($_POST['option_name6_' . $i]) ? $_POST['option_name6_' . $i] : '';   
	$option_selection6 = isset($_POST['option_selection6_' . $i]) ? $_POST['option_selection6_' . $i] : '';
	$option_name7 = isset($_POST['option_name7_' . $i]) ? $_POST['option_name7_' . $i] : '';   
	$option_selection7 = isset($_POST['option_selection7_' . $i]) ? $_POST['option_selection7_' . $i] : '';
	$option_name8 = isset($_POST['option_name8_' . $i]) ? $_POST['option_name8_' . $i] : '';   
	$option_selection8 = isset($_POST['option_selection8_' . $i]) ? $_POST['option_selection8_' . $i] : '';
	$option_name9 = isset($_POST['option_name9_' . $i]) ? $_POST['option_name9_' . $i] : '';   
	$option_selection9 = isset($_POST['option_selection9_' . $i]) ? $_POST['option_selection9_' . $i] : '';
	
	$btn_id = isset($_POST['btn_id' . $i]) ? $_POST['btn_id' . $i] : '';
	
	$current_item = array(   
						   'item_number' => $item_number,   
						   'item_name' => $item_name,   
						   'quantity' => $quantity, 
						   'mc_gross' => $mc_gross, 
						   'mc_handling' => $mc_handling, 
						   'mc_shipping' => $mc_shipping, 
						   'custom' => $custom,   
						   'option_name1' => $option_name1,   
						   'option_selection1' => $option_selection1,   
						   'option_name2' => $option_name2,   
						   'option_selection2' => $option_selection2, 
						   'option_name3' => $option_name3, 
						   'option_selection3' => $option_selection3, 
						   'option_name4' => $option_name4, 
						   'option_selection4' => $option_selection4, 
						   'option_name5' => $option_name5, 
						   'option_selection5' => $option_selection5, 
						   'option_name6' => $option_name6, 
						   'option_selection6' => $option_selection6, 
						   'option_name7' => $option_name7, 
						   'option_selection7' => $option_selection7, 
						   'option_name8' => $option_name8, 
						   'option_selection8' => $option_selection8, 
						   'option_name9' => $option_name9, 
						   'option_selection9' => $option_selection9, 
						   'btn_id' => $btn_id
						  );   
		 
	array_push($cart_items, $current_item);   
	$i++;   
}   
  
// Advanced and Custom Information   
$custom = isset($_POST['custom']) ? $_POST['custom'] : '';   
$invoice = isset($_POST['invoice']) ? $_POST['invoice'] : '';   
$memo = isset($_POST['memo']) ? $_POST['memo'] : '';   
$option_name1 = isset($_POST['option_name1']) ? $_POST['option_name1'] : '';
$option_selection1 = isset($_POST['option_selection1']) ? $_POST['option_selection1'] : '';
$option_name2 = isset($_POST['option_name2']) ? $_POST['option_name2'] : '';      
$option_selection2 = isset($_POST['option_selection2']) ? $_POST['option_selection2'] : '';
$option_name3 = isset($_POST['option_name3']) ? $_POST['option_name3'] : '';      
$option_selection3 = isset($_POST['option_selection3']) ? $_POST['option_selection3'] : '';
$option_name4 = isset($_POST['option_name4']) ? $_POST['option_name4'] : '';      
$option_selection4 = isset($_POST['option_selection2']) ? $_POST['option_selection4'] : '';
$option_name5 = isset($_POST['option_name5']) ? $_POST['option_name5'] : '';      
$option_selection5 = isset($_POST['option_selection2']) ? $_POST['option_selection5'] : '';
$option_name6 = isset($_POST['option_name6']) ? $_POST['option_name6'] : '';      
$option_selection6 = isset($_POST['option_selection2']) ? $_POST['option_selection6'] : '';
$option_name7 = isset($_POST['option_name7']) ? $_POST['option_name7'] : '';      
$option_selection7 = isset($_POST['option_selection2']) ? $_POST['option_selection7'] : '';
$option_name8 = isset($_POST['option_name8']) ? $_POST['option_name8'] : '';      
$option_selection8 = isset($_POST['option_selection2']) ? $_POST['option_selection8'] : '';
$option_name9 = isset($_POST['option_name9']) ? $_POST['option_name9'] : '';      
$option_selection9 = isset($_POST['option_selection2']) ? $_POST['option_selection9'] : '';
  
// Website Payments Standard, Website Payments Pro, and Refund Information   
$auth_id = isset($_POST['auth_id']) ? $_POST['auth_id'] : '';   
$auth_exp = isset($_POST['auth_exp']) ? $_POST['auth_exp'] : '';   
$auth_amount = isset($_POST['auth_amount']) ? $_POST['auth_amount'] : '';   
$auth_status = isset($_POST['auth_status']) ? $_POST['auth_status'] : '';   
  
// Fraud Management Filters   
$i = 1;   
$fraud_management_filters = array();   
while(isset($_POST['fraud_management_filters_' . $i]))   
{   
 $filter_name = isset($_POST['fraud_management_filter_' . $i]) ? $_POST['fraud_management_filter_' . $i] : '';   
         
 array_push($fraud_management_filters, $filter_name);   
 $i++;   
}   
  
$mc_gross = isset($_POST['mc_gross']) ? $_POST['mc_gross'] : 0;   
$mc_handling = isset($_POST['mc_handling']) ? $_POST['mc_handling'] : 0;   
$mc_shipping = isset($_POST['mc_shipping']) ? $_POST['mc_shipping'] : 0;   
$mc_fee = isset($_POST['mc_fee']) ? $_POST['mc_fee'] : 0;   
$num_cart_items = isset($_POST['num_cart_items']) ? $_POST['num_cart_items'] : 0;   
$parent_txn_id = isset($_POST['parent_txn_id']) ? $_POST['parent_txn_id'] : '';   
$payment_date = isset($_POST['payment_date']) ? $_POST['payment_date'] : '';   
$payment_status = isset($_POST['payment_status']) ? $_POST['payment_status'] : '';   
$payment_type = isset($_POST['payment_type']) ? $_POST['payment_type'] : '';   
$pending_reason = isset($_POST['pending_reason']) ? $_POST['pending_reason'] : '';   
$protection_eligibility  = isset($_POST['protection_eligibility']) ? $_POST['protection_eligibility'] : '';   
$reason_code = isset($_POST['reason_code']) ? $_POST['reason_code'] : '';   
$remaining_settle = isset($_POST['remaining_settle']) ? $_POST['remaining_settle'] : '';   
$shipping_method = isset($_POST['shipping_method']) ? $_POST['shipping_method'] : '';   
$shipping = isset($_POST['shipping']) ? $_POST['shipping'] : 0;   
$tax = isset($_POST['tax']) ? $_POST['tax'] : 0;   
$transaction_entity = isset($_POST['transaction_entity']) ? $_POST['transaction_entity'] : '';   
$txn_id = isset($_POST['txn_id']) ? $_POST['txn_id'] : '';   
$txn_type = isset($_POST['txn_type']) ? $_POST['txn_type'] : '';

// Currency and Currency Exchange Information   
$exchange_rate = isset($_POST['exchange_rate']) ? $_POST['exchange_rate'] : '';   
$mc_currency = isset($_POST['mc_currency']) ? $_POST['mc_currency'] : '';   
$settle_amount = isset($_POST['settle_amount']) ? $_POST['settle_amount'] : 0;   
$settle_currency = isset($_POST['settle_currency']) ? $_POST['settle_currency'] : '';   
  
// Auction Variables   
$auction_buyer_id = isset($_POST['auction_buyer_id']) ? $_POST['auction_buyer_id'] : '';   
$auction_closing_date = isset($_POST['auction_closing_date']) ? $_POST['auction_closing_date'] : '';   
$auction_multi_item = isset($_POST['auction_multi_item']) ? $_POST['auction_multi_item'] : 0;   
$for_auction = isset($_POST['for_auction']) ? 1 : 0; 
$handling_amount = isset($_POST['handling_amount']) ? $_POST['handling_amount'] : 0;
$shipping_discount = isset($_POST['shipping_discount']) ? $_POST['shipping_discount'] : 0;
$insurance_amount = isset($_POST['insurance_amount']) ? $_POST['insurance_amount'] : 0;
  
// Mass Payments   
$i = 1;   
$mass_payments = array();   
while(isset($_POST['masspay_txn_id_' . $i]))   
{   
 $masspay_txn_id = isset($_POST['masspay_txn_id_' . $i]) ? $_POST['masspay_txn_id_' . $i] : '';   
 $mc_currency = isset($_POST['mc_currency_' . $i]) ? $_POST['mc_currency_' . $i] : '';   
 $mc_fee = isset($_POST['mc_fee_' . $i]) ? $_POST['mc_fee_' . $i] : 0;   
 $mc_gross = isset($_POST['mc_gross_' . $i]) ? $_POST['mc_gross_' . $i] : 0;   
 $receiver_email = isset($_POST['receiver_email_' . $i]) ? $_POST['receiver_email_' . $i] : '';   
 $status = isset($_POST['status_' . $i]) ? $_POST['status_' . $i] : '';   
 $unique_id = isset($_POST['unique_id_' . $i]) ? $_POST['unique_id_' . $i] : '';   
    
 $current_payment_data_set = array(   
          'masspay_txn_id' => $masspay_txn_id,   
          'mc_currency' => $mc_currency,   
          'mc_fee' => $mc_fee,   
          'mc_gross' => $mc_gross,   
          'receiver_email' => $receiver_email,   
          'status' => $status,   
          'unique_id' => $unique_id  
         );   
    
 array_push($mass_payments, $current_payment_data_set);   
 $i++;   
}

// Recurring Payments Information   
$initial_payment_status = isset($_POST['initial_payment_status']) ? $_POST['initial_payment_status'] : '';   
$initial_payment_txn_id = isset($_POST['initial_payment_txn_id']) ? $_POST['initial_payment_txn_id'] : '';   
$recurring_payment_id = isset($_POST['recurring_payment_id']) ? $_POST['recurring_payment_id'] : '';   
$product_name = isset($_POST['product_name']) ? $_POST['product_name'] : '';   
$product_type = isset($_POST['product_type']) ? $_POST['product_type'] : '';   
$period_type = isset($_POST['period_type']) ? $_POST['period_type'] : '';        
$payment_cycle = isset($_POST['payment_cycle']) ? $_POST['payment_cycle'] : '';   
$outstanding_balance = isset($_POST['outstanding_balance']) ? $_POST['outstanding_balance'] : '';   
$amount_per_cycle = isset($_POST['amount_per_cycle']) ? $_POST['amount_per_cycle'] : 0;   
$initial_payment_amount = isset($_POST['initial_payment_amount']) ? $_POST['initial_payment_amount'] : '';   
$profile_status = isset($_POST['profile_status']) ? $_POST['profile_status'] : '';   
$amount = isset($_POST['amount']) ? $_POST['amount'] : '';   
$time_created = isset($_POST['time_created']) ? $_POST['time_created'] : '';   
$next_payment_date = isset($_POST['next_payment_date']) ? $_POST['next_payment_date'] : ''; 
$rp_invoice_id = isset($_POST['rp_invoice_id']) ? $_POST['rp_invoice_id'] : '';
                 
// Subscription Variables   
$subscr_date = isset($_POST['subscr_date']) ? $_POST['subscr_date'] : '';   
$subscr_effective = isset($_POST['subscr_effective']) ? $_POST['subscr_effective'] : '';   
$period1 = isset($_POST['period1']) ? $_POST['period1'] : '';   
$period2 = isset($_POST['period2']) ? $_POST['period2'] : '';   
$period3 = isset($_POST['period3']) ? $_POST['period3'] : '';   
$amount1 = isset($_POST['amount1']) ? $_POST['amount1'] : 0;   
$amount2 = isset($_POST['amount2']) ? $_POST['amount2'] : 0;   
$amount3 = isset($_POST['amount3']) ? $_POST['amount3'] : 0;   
$mc_amount1 = isset($_POST['mc_amount1']) ? $_POST['mc_amount1'] : 0;   
$mc_amount2 = isset($_POST['mc_amount2']) ? $_POST['mc_amount2'] : 0;   
$mc_amount3 = isset($_POST['mc_amount3']) ? $_POST['mc_amount3'] : 0;   
$mc_currency = isset($_POST['mc_currency']) ? $_POST['mc_currency'] : '';   
$recurring = isset($_POST['recurring']) ? $_POST['recurring'] : '';   
$reattempt = isset($_POST['reattempt']) ? $_POST['reattempt'] : '';   
$retry_at = isset($_POST['retry_at']) ? $_POST['retry_at'] : '';   
$recur_times = isset($_POST['recur_times']) ? $_POST['recur_times'] : '';   
$username = isset($_POST['username']) ? $_POST['username'] : '';   
$password = isset($_POST['password']) ? $_POST['password'] : '';   
$subscr_id = isset($_POST['subscr_id']) ? $_POST['subscr_id'] : '';   
  
// Dispute Notification Variables   
$receipt_id = isset($_POST['receipt_id']) ? $_POST['receipt_id'] : '';
$case_id = isset($_POST['case_id']) ? $_POST['case_id'] : '';   
$case_type = isset($_POST['case_type']) ? $_POST['case_type'] : '';   
$case_creation_date = isset($_POST['case_creation_date']) ? $_POST['case_creation_date'] : '';

// Adaptive Payments Fields
$transaction_type = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$sender_email = isset($_POST['senderEmail']) ? $_POST['senderEmail'] : '';
$action_type = isset($_POST['actionType']) ? $_POST['actionType'] : '';
$payment_request_date = isset($_POST['payment_request_date']) ? $_POST['payment_request_date'] : '';
$reverse_all_parallel_payments_on_error = isset($_POST['reverse_all_parallel_payments_on_error']) ? $_POST['reverse_all_parallel_payments_on_error'] : '';

$adaptive_payment_transactions = array();
$i = 0;
while(isset($_POST['transaction' . $i . '.id']))
{
	$transaction_id = isset($_POST['transaction' . $i . '.id']) ? $_POST['transaction' . $i . '.id'] : '';
	$transaction_status = isset($_POST['transaction' . $i . '.status']) ? $_POST['transaction' . $i . '.status'] : '';
	$transaction_id_for_sender = isset($_POST['transaction' . $i . '.id_for_sender']) ? $_POST['transaction' . $i . '.id_for_sender'] : '';
	$tranasction_status_for_sender_txn = isset($_POST['transaction' . $i . '.status_for_sender_txn']) ? $_POST['transaction' . $i . '.status_for_sender_txn'] : '';
	$transaction_refund_id = isset($_POST['transaction' . $i . '.refund_id']) ? $_POST['transaction' . $i . '.refund_id'] : '';
	$transaction_refund_amount = isset($_POST['transaction' . $i . '.refund_amount']) ? $_POST['transaction' . $i . '.refund_amount'] : '';
	$transaction_refund_account_charged = isset($_POST['transaction' . $i . '.refund_account_charged']) ? $_POST['transaction' . $i . '.refund_account_charged'] : '';
	$transaction_receiver = isset($_POST['transaction' . $i . '.receiver']) ? $_POST['transaction' . $i . '.receiver'] : '';
	$transaction_invoice_id = isset($_POST['transaction' . $i . '.invoiceId']) ? $_POST['transaction' . $i . '.invoiceId'] : '';
	$transaction_amount = isset($_POST['transaction' . $i . '.amount']) ? $_POST['transaction' . $i . '.amount'] : '';
	$transaction_is_primary_receiver = isset($_POST['transaction' . $i . '.is_primary_receiver']) ? $_POST['transaction' . $i . '.is_primary_receiver'] : '';
	$current_transaction = array(
								 'transaction_id' => $transaction_id, 
								 'transaction_status' => $transaction_status, 
								 'transaction_id_for_sender' => $transaction_id_for_sender, 
								 'transaction_status_for_sender_txn' => $transaction_status_for_sender_txn, 
								 'transaction_refund_id' => $transaction_refund_id, 
								 'transaction_refund_amount' => $transaction_refund_amount, 
								 'transaction_refund_account_charged' => $transaction_refund_account_charged, 
								 'transaction_receiver' => $transaction_receiver, 
								 'transaction_invoice_id' => $transaction_invoice_id, 
								 'transaction_amount' => $transaction_amount, 
								 'transaction_is_primary_receiver' => $transaction_is_primary_receiver
								 );
	array_push($adaptive_payment_transactions, $current_transaction);
	$i++;
}

$return_url = isset($_POST['returnUrl']) ? $_POST['returnUrl'] : '';
$cancel_url = isset($_POST['cancelUrl']) ? $_POST['cancelUrl'] : '';
$ipn_notification_url = isset($_POST['ipnNotificationUrl']) ? $_POST['ipnNotificationUrl'] : '';
$pay_key = isset($_POST['payKey']) ? $_POST['payKey'] : '';
$fees_payer = isset($_POST['feesPayer']) ? $_POST['feesPayer'] : '';
$tracking_id = isset($_POST['trackingId']) ? $_POST['trackingId'] : '';
$preapproval_key = isset($_POST['preapprovalKey']) ? $_POST['preapprovalKey'] : '';
$approved = isset($_POST['approved']) ? $_POST['approved'] : '';
$current_number_of_payments = isset($_POST['current_number_of_payments']) ? $_POST['current_number_of_payments'] : '';
$current_total_amount_of_all_payments = isset($_POST['current_total_amount_of_all_payments']) ? $_POST['current_total_amount_of_all_payments'] : '';
$current_period_attempts = isset($_POST['current_period_attempts']) ? $_POST['current_period_attempts'] : '';
$currency_code = isset($_POST['currencyCode']) ? $_POST['currencyCode'] : '';
$date_of_month = isset($_POST['date_of_month']) ? $_POST['date_of_month'] : '';
$day_of_week = isset($_POST['day_of_week']) ? $_POST['day_of_week'] : '';
$starting_date = isset($_POST['starting_date']) ? $_POST['starting_date'] : '';
$ending_date = isset($_POST['ending_date']) ? $_POST['ending_date'] : '';
$max_total_amount_of_all_payments = isset($_POST['max_total_amount_of_all_payments']) ? $_POST['max_total_amount_of_all_payments'] : '';
$max_amount_per_payment = isset($_POST['max_amount_per_payment']) ? $_POST['max_amount_per_payment'] : '';
$max_number_of_payments = isset($_POST['max_number_of_payments']) ? $_POST['max_number_of_payments'] : '';
$payment_period = isset($_POST['payment_period']) ? $_POST['payment_period'] : '';
$pin_type = isset($_POST['pin_type']) ? $_POST['pin_type'] : '';

// Adaptive Accounts
$account_key = isset($_POST['account_key']) ? $_POST['account_key'] : '';
$confirmation_code = isset($_POST['confirmation_code']) ? $_POST['confirmation_code'] : '';
?>