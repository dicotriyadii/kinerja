  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Master Pegawai</h5>
                <p>Master Pegawai merupakan kumpulan data pegawai</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Master Pegawai</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama</th>
                      <th scope="col">NIP</th>
                      <th scope="col">NIK</th>
                      <th scope="col">Jabatan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataPegawai as $dp){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dp['namaPegawai'];?></td>
                      <td><?=$dp['NIP'];?></td>
                      <td><?=$dp['NIK'];?></td>
                      <td><?=$dp['namaJabatan'];?></td>
                      <td><?=$dp['status'];?></td>
                      <td>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dp['id']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="<?=base_url()?>HapusPegawai/<?=$dp['id']?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <div class="modal fade" id="verticalycentered<?=$dp['id']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Master Pegawai</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="PegawaiEdit_" enctype="multipart/form-data">  
                              <div class="modal-body">
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <input type="text" name="idPegawai" class="form-control" id="floatingInput" value="<?=$dp['id'];?>" hidden>
                                    <input type="text" name="namaPegawai" class="form-control" id="floatingInput" value="<?=$dp['namaPegawai'];?>">
                                    <label for="floatingInput">Nama Pegawai</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="nip" class="form-control" id="floatingInput" value="<?=$dp['NIP'];?>">
                                    <label for="floatingInput">NIP</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="nik" class="form-control" id="floatingInput" value="<?=$dp['NIK'];?>">
                                    <label for="floatingInput">NIK</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <select class="form-control" id="floatingInput" name="idJabatan">
                                      <option value="<?=$dp['idMasterJabatan'];?>"><?=$dp['namaJabatan'];?></option>
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
                                    <select class="form-control" id="floatingInput" name="status">
                                      <option value="<?=$dp['status'];?>"><?=$dp['status'];?></option>
                                      <option value="admin"> Admin </option>
                                      <option value="user"> User </option>
                                    </select>
                                    <label for="floatingInput">Status</label>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit Master Pegawai</button>
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
          <h5 class="modal-title">Tambah Master Pegawai</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="Pegawai_" enctype="multipart/form-data">  
          <div class="modal-body">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="text" name="namaPegawai" class="form-control" id="floatingInput" placeholder="Masukkan Nama Pegawai">
                <label for="floatingInput">Nama Pegawai</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nip" class="form-control" id="floatingInput" placeholder="Masukkan NIP">
                <label for="floatingInput">NIP</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nik" class="form-control" id="floatingInput" placeholder="Masukkan NIK">
                <label for="floatingInput">NIK</label>
              </div>
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
                <select class="form-control" id="floatingInput" name="status">
                  <option value="">- Silahkan Pilih Status - </option>
                  <option value="admin"> Admin </option>
                  <option value="user"> User </option>
                </select>
                <label for="floatingInput">Status</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Master Pegawai</button>
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