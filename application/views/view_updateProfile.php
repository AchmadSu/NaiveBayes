<div class="content-wrapper">
	<div class="container my-5">
		<div class="card">
			<div class="card-header text-center">
				<h4>Form Update Profile</h4>
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('errorUpdate') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('errorUpdate');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>index.php/updateProfile/proses">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>" placeholder="Masukkan Username">
					</div>
                    <div class="form-group">
                        <label for="nip">NIP Baru</label>
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP Baru (Kosongkan jika anda tidak akan merubah NIP)">
                    </div>
					<div class="form-group">
						<label for="password">Password Lama</label>
						<input type="password" class="form-control" name="old_password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="password">Password Baru</label>
						<input type="password" class="form-control" name="new_password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="password">Konfirmasi Password Baru</label>
						<input type="password" class="form-control" name="confirm_password" id="password" placeholder="Password">
					</div>
					<div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Update Profile</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>