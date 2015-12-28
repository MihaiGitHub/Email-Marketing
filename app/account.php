<?php 
ob_start(); 
session_start();

include 'include/dbconnect.php';

$stmt = $conn->prepare('SELECT * FROM orders WHERE user_id = :userid');
$result = $stmt->execute(array('userid' => $_SESSION['id']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetch();
?>
		<!-- BEGIN PAGE -->
		<div id="main-content">
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Account
							<small> Account Information </small>
						</h3>
						<ul class="breadcrumb">
							<li>
                                <a href="#"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
							</li>
                            
							<li><a href="#">Account</a><span class="divider-last">&nbsp;</span></li>
                            
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->

				<div id="page" class="dashboard">
                    <!-- BEGIN OVERVIEW STATISTIC BLOCKS-->
                    <div class="row-fluid circle-state-overview">
                    
               <div class="span12">
                  <div class="widget">
                        <div class="widget-title">
                           <h4><i class="icon-edit"></i>Account Summary</h4>
                                              
                        </div>
                        <div class="widget-body">
                            <div class="row-fluid invoice-list">
                                <div class="span4">
                                    <h5>BILLING ADDRESS</h5>
                                    <p>
                                        <?php echo $row['last_name'] . ' ' . $row['first_name']; ?> <br>
                                        <?php echo $row['address_street']; ?> <br>
                                        <?php echo $row['address_city'] . ', ' . $row['address_state'] . $row['address_zip']; ?><br>
                                        <?php echo $row['address_country']; ?><br>
								<?php echo $row['payer_email']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="space20"></div>
                            <div class="row-fluid">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th class="hidden-480">Description</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<?php
$count = 1;
$grandTotal = 0;
$stmt = $conn->prepare('SELECT * FROM orders WHERE user_id = :userid');
$result = $stmt->execute(array('userid' => $_SESSION['id']));
$stmt->setFetchMode(PDO::FETCH_ASSOC);

while($row = $stmt->fetch()){
	echo '<tr><td>'.$count.'</td><td>'.$row['mc_gross'].'</td><td>'.$row['item_name'].'</td><td>$'.$row['mc_gross'].'</td></tr>';
	$grandTotal += $row['mc_gross'];
	$count++;
}
?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid">
                                <div class="span4 invoice-block pull-right">
                                    <ul class="unstyled amounts">
                                        <li><strong>Grand Total :</strong> <?php echo '$'.$grandTotal; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid text-center">
					   
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_blank">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="RMJATPW2E8EGY">
	<table>
		<tr>
			<td>
				<input type="hidden" name="on0" value="Upgrade">
			</td>
		</tr>
		<tr>
			<td>
				<select name="os0">
					<option value="5 Email Credits">5 Email Credits $5.00 USD</option>
					<option value="10 Email Credits">10 Email Credits $10.00 USD</option>
				</select> 
			</td>
		</tr>
	</table>
	<input type="hidden" name="currency_code" value="USD">
	<input type="submit" value="Upgrade" name="submit" title="PayPal - The safer, easier way to pay online!" class="paypal_btn">
	<!--<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">-->
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<!--
                               <a onclick="javascript:window.print();" class="btn btn-success btn-large hidden-print">Print <i class="icon-print icon-big"></i></a>
                            -->
					   </div>
                        </div>
                  </div>
               </div>

                    </div>
                    <!-- END OVERVIEW STATISTIC BLOCKS-->
					
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
<?php		  
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>