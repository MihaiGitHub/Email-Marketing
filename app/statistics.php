<?php
ob_start();
session_start();

include 'include/dbconnect.php';
if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}


// Countries
$countries = '';
$stmt = $conn->prepare('SELECT COUNT( id ) AS Total, country FROM campaign_emails WHERE opened !=0 AND c_id =  :cid GROUP BY country');
$result = $stmt->execute(array('cid' => $_GET['id']));
$count = $stmt->rowCount();
if($count > 0){
	while($row = $stmt->fetch()){		
		$countries .= '["'.$row['country'].'", '.$row['Total'].'], ';
	}
} else {
	$countries = '["No Data",1]';
}
// US states
$states = '';
$stmt = $conn->prepare('SELECT COUNT( id ) AS Total, region FROM campaign_emails WHERE opened !=0 AND country =  "United States" AND c_id =  :cid GROUP BY region');
$result = $stmt->execute(array('cid' => $_GET['id']));
$count = $stmt->rowCount();
if($count > 0){
	while($row = $stmt->fetch()){		
		$states .= '["'.$row['region'].'", '.$row['Total'].'], ';
	}
} else {
	$states = '["No Data",1]';
}
?>
 <div class="header">

            <h1 class="page-title">Campaign Statistics</h1>
        </div>
          <ul class="breadcrumb">
            <li><a href="reports.php">Reports</a> <span class="divider">/</span></li>
            <li class="active">Campaign Statistics</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<script type="text/javascript">
$(function () {
    $('#countries').highcharts({
	    credits : {
			  enabled : false
	   },
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Countries'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Emails Opened',
            data: [<?php echo $countries; ?>]
        }]
    });
    
     $('#states').highcharts({
	    credits : {
			  enabled : false
	   },
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'US States'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Emails Opened',
            data: [<?php echo $states; ?>]
        }]
    });
});
</script>

<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<table style="width:100%;">
  <tbody>
	<tr>
		<td>
<div id="countries" style="width: 560px; height: 400px; margin: 0 auto"></div>
		</td>
		<td>
<div id="states" style="width: 560px; height: 400px; margin: 0 auto"></div>
		</td>
	</tr>
  </tbody>
</table>
<?php
// Total Emails Sent
$totalemails = $conn->prepare('SELECT COUNT( id ) AS total FROM campaign_emails WHERE c_id =  :cid AND sent = 1');
$totalemailsresult = $totalemails->execute(array('cid' => $_GET['id']));
$totalemailsvalue = $totalemails->fetch();

// Total Emails Opened
$totalemailsopened = $conn->prepare('SELECT COUNT( id ) AS total FROM campaign_emails WHERE c_id =  :cid AND opened != 0');
$totalemailsopenedresult = $totalemailsopened->execute(array('cid' => $_GET['id']));
$totalemailsopenedvalue = $totalemailsopened->fetch();


$percentage = ($totalemailsvalue['total'] > 0) ? $totalemailsopenedvalue['total'] / $totalemailsvalue['total'] * 100 : 0;
?>

<div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Latest Stats</a>
        <div id="page-stats" class="block-body collapse in">

            <div class="stat-widget-container">
                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $totalemailsvalue['total']; ?></p>
                        <p class="detail">Emails Sent</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $totalemailsopenedvalue['total']; ?></p>
                        <p class="detail">Emails Opened</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title">0</p>
                        <p class="detail">Emails Bounced</p>
                    </div>
                </div>

                <div class="stat-widget">
                    <div class="stat-button">
                        <p class="title"><?php echo $percentage; ?>&#37;</p>
                        <p class="detail">Percentage</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    
    
    
  <div class="block">

<a href="#page-stats" class="block-heading" data-toggle="collapse">Opened Emails</a>

	<table class="table">
	<thead>
		<tr>
			<th>Email</th><th>IP Address</th><th>Country</th><th>Region</th><th># Of Opens
		</tr>
	</thead>
	<tbody>
<?php 
	$rows = 0;	
	$stmt = $conn->prepare('SELECT email, ip, country, region, opened FROM campaign_emails WHERE opened != 0 AND c_id = :cid');
	$result = $stmt->execute(array('cid' => $_GET['id']));
	while($row = $stmt->fetch()){ $rows++;
		echo '<tr><td>'.htmlspecialchars($row['email']).'</td><td>'.htmlspecialchars($row['ip']).'</td><td>'.htmlspecialchars($row['country']).'</td><td>'.htmlspecialchars($row['region']).'</td><td>'.htmlspecialchars($row['opened']).'</td></tr>';
	} if($rows == 0) echo '<tr><td colspan="5" style="text-align:center;">No Opened Emails</td></tr>';
?>
	</tbody>
</table>

</div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>