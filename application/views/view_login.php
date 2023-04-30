<html>
	<head>
		<title>Form Login</title>
		<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <!-- Toastr -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
		<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/logo.png"/>
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	</head>
	<body>
	<div class="container my-5">
		<div class="card">
			<div class="d-flex my-2 justify-content-center">
				<img src="<?php echo base_url(); ?>/assets/img/logo.png" class="w-25" alt="">
			</div>
			<div class="mt-5 text-center card-header">
				<h4>Form Login Data BLT Desa Bojong - Nagreg</h4>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>

				<?php 
				if($this->session->flashdata('success_register') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('success_register');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>index.php/login/proses">
					<div class="form-group">
						<label for="nip">NIP</label>
						<input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
					</div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="<?php echo base_url(); ?>login/register" type="submit" class="btn btn-success">Register</a>
                    </div>
				</form>
			</div>
		</div>
	</div>		
	</body>
</html>