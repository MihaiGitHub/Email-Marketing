<?php 
ob_start(); 
session_start();
$dashboard = true;
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
                           <h4><i class="icon-edit"></i>Invoice Page</h4>
                                              
                        </div>
                        <div class="widget-body">
                        <!--    <div class="row-fluid">
                                <div class="span12">
                                    <img src="img/vector-lab.jpg" alt="">
                                </div>
                            </div> 
                            <div class="space20"></div>-->
                            <div class="row-fluid invoice-list">
                                <div class="span4">
                                    <h5>BILLING ADDRESS</h5>
                                    <p>
                                        Jonathan Smith <br>
                                        44 Dreamland Tower, Suite 566 <br>
                                        ABC, Dreamland 1230<br>
                                        Tel: +12 (012) 345-67-89
                                    </p>
                                </div>
                                <div class="span4">
                                    <h5>SHIPPING ADDRESS</h5>
                                    <p>
                                        Vector Lab<br>
                                        Road 1, House 2, Sector 3<br>
                                        ABC, Dreamland 1230<br>
                                        P: +38 (123) 456-7890<br>
                                    </p>
                                </div>
                                <div class="span4">
                                    <h5>INVOICE INFO</h5>
                                    <ul class="unstyled">
                                        <li>Invoice Number		: <strong>69626</strong></li>
                                        <li>Invoice Date		: 2013-03-17</li>
                                        <li>Due Date			: 2013-03-20</li>
                                        <li>Invoice Status		: Paid</li>
                                    </ul>
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
                                        <th class="hidden-480">Unit Cost</th>
                                        <th class="hidden-480">Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>500 Email Credits</td>
                                        <td class="hidden-480">Bought 500 email credits</td>
                                        <td class="hidden-480">$100</td>
                                        <td class="hidden-480">2</td>
                                        <td>$ 100</td>
                                    </tr>
									<tr>
                                        <td>2</td>
                                        <td>1000 Email Credits</td>
                                        <td class="hidden-480">Bought 1000 email credits</td>
                                        <td class="hidden-480">$200</td>
                                        <td class="hidden-480">1</td>
                                        <td>$ 200</td>
                                    </tr>  
									<tr>
                                        <td>3</td>
                                        <td>1000 Email Credits</td>
                                        <td class="hidden-480">Bought 1000 email credits</td>
                                        <td class="hidden-480">$200</td>
                                        <td class="hidden-480">1</td>
                                        <td>$ 200</td>
                                    </tr>                                     </tbody>
                                </table>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid">
                                <div class="span4 invoice-block pull-right">
                                    <ul class="unstyled amounts">
                                        <li><strong>Sub - Total amount :</strong> $6820</li>
                                        <li><strong>Discount :</strong> 10%</li>
                                        <li><strong>Grand Total :</strong> $6138</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="row-fluid text-center">
                                <a class="btn btn-primary btn-large hidden-print">Upgrade <i class="m-icon-big-swapright m-icon-white"></i></a>
                                <a onclick="javascript:window.print();" class="btn btn-success btn-large hidden-print">Print <i class="icon-print icon-big"></i></a>
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