<html>
	<head>
		<title>Form Register</title>
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
			<div class="mt-5 card-header text-center">
				<h4>Form Register Data BLT Desa Bojong - Nagreg</h4>
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
				<form method="post" action="<?php echo base_url(); ?>index.php/register/proses">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username">
					</div>
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP">
                    </div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="password">Konfirmasi Password</label>
						<input type="password" class="form-control" name="confirm_password" id="password" placeholder="Konfirmasi Password">
					</div>
					<div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Daftar</button>
                        <a href="<?php echo base_url(); ?>register/login" type="submit" class="btn btn-primary">Login</a>
                    </div>
				</form>
			</div>
		</div>
	</div>		
	</body>
</html>