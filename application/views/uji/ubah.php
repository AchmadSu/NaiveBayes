Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Ubah Data Training</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Data Training</li>
            <li class="breadcrumb-item active">Ubah Data Training</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Ubah Data</h5>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">id Training</label>
                      <input type="text" class="form-control disabled" name="id_training" value="<?= $ubah['id_training'] ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama</label>
                      <input type="text" class="form-control"name="nama" value="<?= $ubah['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <label>PKH</label>
                      <select class="form-control" name="pkh">
                        <option value="0">Non PKH</option>
                        <option value="1">PKH</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Tanggungan</label>
                      <input type="text" class="form-control"name="jml_tanggungan" value="<?= $ubah['jml_tanggungan'] ?>">
                    </div>
                    <div class="form-group">
                      <label>Kepala Rumah Tangga</label>
                      <select class="form-control" name="kepala_rt">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Rukun Warga</label>
                      <select class="form-control" name="rw">
                        <?php 
                          for ($i=0; $i < 13; $i++) {
                        ?>
                          <option value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pendidikan Terakhir</label>
                      <select class="form-control" name="pendidikan">
                        <option value="Doktor">Doktor</option>
                        <option value="Magister">Magister</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Diploma IV">Diploma IV</option>
                        <option value="Diploma III">Diploma III</option>
                        <option value="Diploma I/II">Diploma I/II</option>
                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                        <option value="Tamat SD/Sederajat">Tamat SD/Sederajat</option>
                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Pekerjaan</label>
                      <select class="form-control" name="pendidikan">
                        <option value="TNI/Polri">TNI/Polri</option>
                        <option value="Guru/Dosen">Guru/Dosen</option>
                        <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
                        <option value="Karyawan BUMN">Karyawan BUMN</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                        <option value="Wiraswasta">Wiraswasta</option>
                        <option value="Pedagang">Pedagang</option>
                        <option value="Petani">Petani</option>
                        <option value="Pensiunan">Pensiunan</option>
                        <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                        <option value="Tidak Bekerja">Tidak Bekerja</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Jumlah Penghasilan</label>
                      <input type="text" class="form-control"name="jml_penghasilan" value="<?= $ubah['jml_penghasilan'] ?>">
                    </div>


                    <input type="submit" name="save" class="btn btn-primary" value="Save">
                  </div>
                  <!-- /.card-body -->
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper