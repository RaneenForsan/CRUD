<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
<body>
<div class="main">

			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-4"></div>
						<div class="col-md-4">

					<center><h3 class="page-title">Login</h3></center>
					
							<!-- BASIC TABLE -->
							<div class="panel">
								
								<div class="panel-body">

	<form method="post"	action="login_validation">	
	<div class="form-group">
    <label for="email">email</label>
	  <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="email" name="email">
	  <span class="text-danger"><?php echo form_error('email');?></span>
  </div>

  <div class="form-group">
    <label for="email">Password</label>
	  <input type="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="password" name="password">
	  <span class="text-danger"><?php echo form_error('password');?></span>
	  <?php $this->session->flashdata("error"); ?>

  </div>
  <center><button type="submit" class="btn btn-primary">Login</button></center>
</form>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					<div class="col-md-4"></div>

					</div>
				</div>
	</div>
</div>
</body>

</html>
