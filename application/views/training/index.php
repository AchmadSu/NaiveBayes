
<div class="content-wrapper">
  <?php if(count($training) > 0) { ?>
  <?php foreach ($training as $row){ ?>
  <div class="modal fade" id="deleteModal<?php echo $row->id_training; ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah anda yakin akan <b>menghapus <?php echo $row->nama; ?></b> ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            <i class="fa fa-times" aria-hidden="true"></i>&ensp;Tutup
          </button>
          <a type="button" class="btn btn-danger" href="<?php base_url() ?>DataTraining/hapus/<?php echo $row->id_training; ?>">
            <i class="fa fa-trash" aria-hidden="true"></i>&ensp;Hapus
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data BLT Desa Bojong</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data BLT Desa Bojong</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php 
    if ($this->session->flashdata('flash_training')){ ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i> 
          Data Berhasil 
          <strong>
            <?= $this->session->flashdata('flash_training');   ?>
          </strong> 
        </h6>
      </div>
    <?php } ?>
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Tambah Data</h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <?= validation_errors(); ?>
                <form action="<?= base_url() ?>DataTraining/validation_form" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Id Training</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_training">
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Penduduk</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
                    </div>
                    <div class="form-group">
                      <label>PKH</label>
                      <select class="form-control" name="pkh">
                        <option value="0">Non PKH</option>
                        <option value="1">PKH</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jumlah Tanggungan</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="jml_tanggungan">
                    </div>
                    <div class="form-group">
                      <label>Kepala Rumah Tangga</label>
                      <select class="form-control" name="kepala_rt">
                        <option value="1">Laki-laki</option>
                        <option value="2">Perempuan</option>
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
                      <select class="form-control" name="pekerjaan">
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
                      <label>Jumlah Penghasilan</label>
                      <input type="number" class="form-control" id="exampleInputPassword1" name="jml_penghasilan">
                    </div>
                    <!-- <div class="form-group">
                      <label>Status Kelayakan</label>
                      <select class="form-control" name="status_kelayakan">
                        <option value="layak">Layak</option>
                        <option value="tidak layak">Tidak Layak</option>
                      </select>
                    </div> -->

                    <input type="submit" name="save" class="btn btn-success" value="Simpan Data">
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
    <!-- list data -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- card-body -->
          <div class="card-body">
            <?php if(count($training) > 0) { ?>
            <div class="d-flex justify-content-end my-3">
              <?php if (!($skip <= 0)) { ?>
              <a href="<?php echo base_url()."DataTraining?skip=".$skip-50; ?>" class="btn btn-light mx-2">
                  Prev
              </a>
              <?php } ?>
              <?php if ($skip <= $countAll) { ?>
              <a href="<?php echo base_url()."DataTraining?skip=".$skip+50; ?>" class="btn btn-success text-light">
                  Next
              </a>
              <?php } ?>
            </div>
            <table id="example1" class="table table-bordered table-responsive table-striped">
              <thead>
                <tr>
                  <th class="align-middle text-center">No</th>
                  <!-- <th class="align-middle text-center">Id Training</th> -->
                  <th class="align-middle text-center">Nama</th>
                  <th class="align-middle text-center">RW</th>
                  <th class="align-middle text-center">Kepala Rumah Tangga</th>
                  <th class="align-middle text-center">PKH</th>
                  <th class="align-middle text-center">Jumlah Tanggungan</th>
                  <th class="align-middle text-center">Jumlah Penghasilan</th>
                  <th class="align-middle text-center">Pendidikan Terakhir</th>
                  <th class="align-middle text-center">Pekerjaan</th>
                  <th class="align-middle text-center">Status Kelayakan</th>
                  <th class="align-middle text-center" colspan="2">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = $skip;
                foreach ($training as $row){ ?>
                  <tr>
                    <td class="align-middle text-center"><?= $no+1 ?></td>
                    <!-- <td class="align-middle"><?= $row->id_training ?></td> -->
                    <td class="align-middle"><?= $row->nama ?></td>
                    <td class="align-middle text-center">0<?= $row->rw ?></td>
                    <td class="align-middle"><?php echo ($row->kepala_rt  == '1') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                    <td class="align-middle text-center">
                      <?php 
                        if ($row->pkh == '0') {
                          echo "Tidak"; 
                        } else {
                          echo "Ya";
                        }  
                      ?>
                    </td>
                    <td class="align-middle text-center" class="text-center"><?= $row->jml_tanggungan ?></td>
                    <td class="align-middle text-center">Rp. <?= number_format((int)$row->jml_penghasilan) ?></td>
                    <td class="align-middle"><?= $row->pendidikan ?></td>
                    <td class="align-middle"><?= $row->pekerjaan ?></td>
                    <td class="align-middle text-center">
                      <?php if ($row->status_kelayakan == 'Layak') {  ?>
                        <b class="text-success"><?php echo $row->status_kelayakan; ?></b>
                      <?php } else { ?>
                        <b class="text-warning"><?php echo $row->status_kelayakan; ?></b>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url() ?>DataTraining/ubah/<?= $row->id_training ?>" class="btn btn-primary">Update</a>
                    </td>
                    <td class="align-middle">
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $row->id_training;?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <?php 
                  $no++;
                } 
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <th class="align-middle text-center">No</th>
                  <!-- <th class="align-middle text-center">Id Training</th> -->
                  <th class="align-middle text-center">Nama</th>
                  <th class="align-middle text-center">PKH</th>
                  <th class="align-middle text-center">Jumlah Tanggungan</th>
                  <th class="align-middle text-center">Kepala Rumah Tangga</th>
                  <th class="align-middle text-center">RW</th>
                  <th class="align-middle text-center">Jumlah Penghasilan</th>
                  <th class="align-middle text-center">Pendidikan Terakhir</th>
                  <th class="align-middle text-center">Pekerjaan</th>
                  <th class="align-middle text-center">Status Kelayakan</th>
                  <th class="align-middle text-center" colspan="2">Aksi</th>
                </tr>
              </tfoot>
            </table>
            <?php } else { ?>
              <div class="container">
                  <h2 class="my-3 text-center">Data tidak ditemukan!</h2>
              </div>
            <?php } ?>
            <div class="d-flex justify-content-end my-3">
              <?php if (!($skip <= 0)) { ?>
              <a href="<?php echo base_url()."DataTraining?skip=".$skip-50; ?>" class="btn btn-light mx-2">
                  Prev
              </a>
              <?php } ?>
              <?php if ($skip <= $countAll) { ?>
              <a href="<?php echo base_url()."DataTraining?skip=".$skip+50; ?>" class="btn btn-success text-light">
                  Next
              </a>
              <?php } ?>
            </div>
          </div>
          <!-- /.card-body -->
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