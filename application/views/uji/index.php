<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Uji</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Uji</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


  <!-- Main content -->
  <section class="content">
    <!-- NOTIFIKASI -->
    <?php 
    if ($this->session->flashdata('flash_uji')){ ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h6>
          <i class="icon fas fa-check"></i> 
          Data Berhasil 
          <strong>
            <?= $this->session->flashdata('flash_uji');   ?>
          </strong> 
        </h6>
      </div>
    <?php } ?>
    <!-- tambah data -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Testing Data</h5>
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
                <form action="<?= base_url() ?>DataUji/hitung" method="post" accept-charset="utf-8">
                  <div class="card-body">
                    <!-- <div class="form-group">
                      <label for="exampleInputEmail1">Id Training</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="id_training">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Nama Penduduk</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="nama">
                    </div> -->
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
                      <label>Jumlah Penghasilan</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="jml_penghasilan">

                    </div>
                    <!-- <div class="form-group">
                      <label>Status Kelayakan</label>
                      <select class="form-control" name="status_kelayakan">
                        <option value="layak">Layak</option>
                        <option value="tidak layak">Tidak Layak</option>
                      </select>
                    </div>
                  -->
                  <input type="submit" name="save" class="btn btn-primary" value="Eksekusi">
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
  
  <!-- /.row -->
</section>
<!-- /.content -->
</div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hasil data Uji </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php echo $this->session->flashdata('flash_hitung'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>