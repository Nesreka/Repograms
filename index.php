<?php session_start();?>

<html !DOCTYPE HTML>
<head>
	<?php include('header.php')?>
</head>

<body>
	<!-- Menu -->
	<?php include('menu.php'); ?>
	
	<!-- Content -->
	<div class="container" id="wrap">
		<div class="title"><a href="index.php"><img class="title" title="Repograms" src="img/title.png"></a></div>
		<br>
    	<?php
			if (isset($_SESSION['loading']) && $_SESSION['loading']) {
 				echo '<br><br>
					  <div class="progress progress-striped active">
  					  	<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$_SESSION['current_progress'].'%;"></div>
					  </div>
					  <p>'.$_SESSION['loading_info'].'</p>';
			} else if (isset($_SESSION['current_progress']) && $_SESSION['current_progress'] == 100) {
				unset($_SESSION['current_progress']);
				unset($_SESSION['loading']);
				unset($_SESSION['loading_info']);
				header('Location: image.php');
			} else {
				echo '<form role="form" action="./php/action.php" method="POST">
   						<div class="input-group urlinput">
   							<input class="form-control" id="projectlink" name="projectlink" type="text" required="required"  placeholder="Enter repository url">
    						<span class="input-group-btn">
       							<button class="btn btn-default" type="submit" title="Visualize the provided repository">
       								<span class="glyphicon glyphicon-indent-left"></span>Visualize!
       							</button>
     						</span>
						</div>';
				if (isset($_SESSION['error_message']) && str_replace(' ','',$_SESSION['error_message']) !== '') {
					echo '<div class="alert alert-danger alert-dismissable">
       						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 							<strong>Error!</strong> '.$_SESSION['error_message'].'
						  </div>';
					unset($_SESSION['error_message']);
				}
				echo '</form>';
			}
		?>	
		<br><br>
		<div class="examples">
			<div class="well example lead">
				<img title="JQuery" src="img/examples/jquery.png">
				<!-- https://github.com/jquery/jquery.git -->
				<br>
				JQuery
			</div> 
			<div class="well example lead">
				<img title="Twitter Bootstrap" src="img/examples/bootstrap.png">
				<!-- https://github.com/twbs/bootstrap.git -->
				<br>
				Twitter Bootstrap
			</div> 
			<div class="well examplelast lead">
				<img title="Git" src="img/examples/git.png">
				<!-- https://github.com/git/git.git -->
				<br>
				Git
			</div>
		</div>
		<div class="clear push"></div>
   		<div id="push"></div>
	</div>
	
	<!-- Footer -->	
	<?php include('footer.php')?>
</body>
</html>
