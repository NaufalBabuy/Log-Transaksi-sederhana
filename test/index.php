<?php 
ob_start();
session_start();
include('inc/header.php');
include 'management.php';
$inventory = new Inventory();
$inventory->checkLogin();
?>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/common.js"></script>
<div class="container">		
	<?php include("menus.php"); ?>   
	<div class="row">
		<div class="col-lg-12">
			<div class="card card-default rounded-0 shadow">
				<div class="card-header">
					<div class="row">
							
					</div>
				</div>
				<div class="card-body">
					<div class="row"><div class="col-sm-12 table-responsive">
						<table id="inventoryDetails" class="table table-bordered table-striped">
							<thead><tr>
								<th>#</th>      
								<th>Nama Barang</th>      
								<th>jumlah awal</th> 
								<th>Barang yang diterima</th> 	
								<th>barang dikirim</th>
								<th>Barang di gudang</th>								
							</tr></thead>
						</table>
					</div></div>
				</div>
			</div>
		</div>
	</div>
		
</div>	






