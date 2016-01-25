<?php
include 'include/dbconnect.php';

$stmt1 = $conn->prepare('UPDATE campaign_emails SET unsubscribed = 1 WHERE id = :id');
$result1 = $stmt1->execute(array('id' => $_GET['id']));

// Update notifications
$stmt2 = $conn->prepare('SELECT c_id, email FROM campaign_emails WHERE id = :id');
$result2 = $stmt2->execute(array('id' => $_GET['id']));
$row2 = $stmt2->fetch();

$stmt3 = $conn->prepare('SELECT user_id FROM campaigns WHERE id = :id');
$result3 = $stmt3->execute(array('id' => $row2['c_id']));
$row3 = $stmt3->fetch();

$stmt4 = $conn->prepare('INSERT INTO notifications (user_id, notification, timestamp) VALUES (:userid, :notification, :date)');
$result4 = $stmt4->execute(array('userid' => $row3['user_id'], 'notification' => "The email <b>".$row2['email']."</b> has unsubscribed from your list.", 'date' => date('Y-m-d H:i:s')));
////////////////////////
?>
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8" />
  <title>Unsubscribe</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <link href="assets/coming_soon/demo/css/style.css" rel="stylesheet" />
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/style_responsive.css" rel="stylesheet" />
  <link href="css/style_default.css" rel="stylesheet" id="style_color" />

  <!-- jQuery and Modernizr-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

  <link href='http://fonts.googleapis.com/css?family=Alex+Brush' rel='stylesheet' type='text/css'>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body id="coming-body">
  <div class="lock-header">
      <!-- BEGIN LOGO -->
      <a href="index.html" id="logo" class="center">
          <img src="img/logo.png" alt="logo" class="center" />
      </a>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN COMING SOON -->
  <div class="coming-soon">
      <div class="container-fluid">
          <div class="row-fluid">
              <div class="span12 responsive" data-tablet="span4" data-desktop="span12">
                  <h1>
                      <!-- <label>We're sorry to see you go.</label> -->
                      <span>You have successfully unsubscribed.</span>
                  </h1>             
              </div>
          </div>
      </div>
  </div>
  <!-- END COMING SOON -->

</body>
<!-- END BODY -->
</html>