<div class="main">

			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
					<a href="<?=base_url().'create' ?>"><button type="button" class="btn btn-primary btn-toastr" data-context="info" data-message="This is general theme info" data-position="top-right"><span style="font-size:17px;">Add Country</span></button></a><br><br><br>
					<center><h3 class="page-title">Manage Countries</h3></center>
					
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Countries</h3>
								</div>
								<div class="panel-body">
									<table class="table table-dark">
  <thead>
  <?php foreach($posts as $post):?>
    <tr>
      <th scope="col"><?=$post['id']?></th>
      <th scope="col"><?=$post['country']?></th>
    </tr>
	<?php endforeach?>

  </thead>
										
  <tbody>

   

  </tbody>
</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
					<div class="col-md-3"></div>

					</div>
				</div>
	</div>
</div>
