  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Master Pekerjaan</h5>
                <p>Master Pekerjaan merupakan data umum untuk menentukan Pekerjaan yang berdasarkan tupoksi yang ada</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Master Pekerjaan</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Jabatan</th>
                      <th scope="col">Nama Pekerjaan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataPekerjaan as $dp){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dp['namaJabatan']?></td>
                      <td><?=$dp['namaPekerjaan']?></td>
                      <td>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dp['idPekerjaan']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="<?=base_url()?>HapusPekerjaan/<?=$dp['idPekerjaan']?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <div class="modal fade" id="verticalycentered<?=$dp['idPekerjaan']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Master Pekerjaan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="PekerjaanEdit_" enctype="multipart/form-data">  
                              <div class="modal-body">
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <select class="form-control" id="floatingInput" name="idJabatan">
                                      <option value="<?=$dp['idMasterJabatan'];?>"> <?=$dp['namaJabatan'];?> </option>
                                      <?php 
                                      foreach($dataJabatan as $dj){?>
                                      <option value="<?=$dj['idMasterJabatan']?>"><?=$dj['namaJabatan']?></option>
                                      <?php
                                      }
                                      ?>
                                    </select>
                                    <label for="floatingInput">Nama Jabatan</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="idPekerjaan" class="form-control" id="floatingInput" value="<?=$dp['idPekerjaan'];?>" hidden>
                                    <input type="text" name="namaPekerjaan" class="form-control" id="floatingInput" value="<?=$dp['namaPekerjaan'];?>">
                                    <label for="floatingInput">Nama Pekerjaan</label>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Master Pekerjaan</button>
                                  </div>
                                </div>
                              </div>
                            </form>          
                          </div>
                        </div>
                      </div>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->

              </div>
            </div>

          </div>
        </div>
      </section>
  </main><!-- End #main -->
  <div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Master Pekerjaan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="Pekerjaan_" enctype="multipart/form-data">  
          <div class="modal-body">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <select class="form-control" id="floatingInput" name="idJabatan">
                  <option value="">- Silahkan Pilih Jabatan - </option>
                  <?php 
                  foreach($dataJabatan as $dj){?>
                  <option value="<?=$dj['idMasterJabatan']?>"><?=$dj['namaJabatan']?></option>
                  <?php
                  }
                  ?>
                </select>
                <label for="floatingInput">Nama Jabatan</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="namaPekerjaan" class="form-control" id="floatingInput" placeholder="Masukkan Nama Pekerjaan">
                <label for="floatingInput">Nama Pekerjaan</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Master Pekerjaan</button>
              </div>
            </div>
          </div>
        </form>          
      </div>
    </div>
  </div>
  <?php
  include('link/footer.php')
  ?>