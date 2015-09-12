<?php
include 'include/dbconnect.php';

$stmt = $conn->prepare('UPDATE campaign_emails SET unsubscribed = 1 WHERE id = :id');
$result = $stmt->execute(array('id' => $_GET['id']));
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