<?php
ob_start();
session_start();

if(!$_SESSION['auth']){
	header('Location: index.php?authen=false');
	exit;	
}

?>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> 
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
  <style>
	div#createform ul { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
     div#createform li { margin: 5px; padding: 5px; width: 150px; }
  </style> 
  <script>
  $(function() {
    $( "#sortable" ).sortable({
      revert: true
    });
    $( "#draggable" ).draggable({
      connectToSortable: "#sortable",
      helper: "clone",
      revert: "invalid"
    });
    $( "ul, li" ).disableSelection();
  });
  </script>
  <div class="header">

            <h1 class="page-title">Create Email Template</h1>
        </div>
          <ul class="breadcrumb">
            <li><a href="dashboard.php">Home</a> <span class="divider">/</span></li>
            <li class="active">Create Email Template</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
<div id="createform">
	<ul>
	  <li id="draggable" class="ui-state-highlight">Text</li>
	</ul>
	<ul id="sortable">
	  <li class="ui-state-default">Image 1</li>
	  <li class="ui-state-default">Image 2</li>
	  <li class="ui-state-default">Image 3</li>
	  <li class="ui-state-default">Image 4</li>
	  <li class="ui-state-default">Image 5</li>
	</ul>
</div>
<?php
$content = ob_get_contents();
ob_end_clean();
include 'include/header.php';
print $content;
include 'include/footer.php'; 
?>