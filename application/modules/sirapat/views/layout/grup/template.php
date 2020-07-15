<!DOCTYPE html>
<html>

<head>
<style>
	  body {
  background-image: url(<?= base_url('assets/dashboard/img/bg.png')?>);
  background-repeat: repeat-x;
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	}
  </style>
  
  <title><?= $title; ?></title>
	<!-- meta -->
	<?php require_once('_meta.php') ;?>

	<!-- css -->
	<?php require_once('_css.php') ;?>
	
</head>

<body>

		<!-- header -->

		<!-- sidebar -->
		<?php require_once('_sidebar.php') ;?>
		
		<div class="main-content" id="panel">

		<!-- content -->

		<!-- Main content -->
		<?php require_once('_nav.php') ;?>
			
				<?php echo $contents ;?>
		</div>

		<!-- footer -->
		<?php require_once('_footer.php') ;?>

	
	<!-- js -->
	<?php require_once('_js2.php') ;?>
	
</body>

</html>
