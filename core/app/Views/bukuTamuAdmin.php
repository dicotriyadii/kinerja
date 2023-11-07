  <?php
  include('link/header.php')
  ?>
  <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Buku Tamu</h5>
                <p>Buku Tamu merupakan kumpulan data Tamu yang berkunjung ke bidang TIKSAN </p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Tamu</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Instansi</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Nomor Telepon</th>
                      <th scope="col">Tujuan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataBukuTamu as $dbt){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dbt['tanggal'];?></td>
                      <td><?=$dbt['instansi'];?></td>
                      <td><?=$dbt['nama'];?></td>
                      <td><?=$dbt['nomorTelepon'];?></td>
                      <td><?=$dbt['tujuan'];?></td>
                      <td><?=$dbt['keterangan'];?></td>
                      <td>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dbt['idBukuTamu']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="<?=base_url()?>HapusBukuTamu/<?=$dbt['idBukuTamu']?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <div class="modal fade" id="verticalycentered<?=$dbt['idBukuTamu']?>" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit BukuTamu</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="BukuTamuEdit_" enctype="multipart/form-data">  
                              <div class="modal-body">
                                <div class="modal-body">
                                  <div class="form-floating mb-3">
                                    <input type="text" name="idBukuTamu" class="form-control" id="floatingInput" value="<?=$dbt['idBukuTamu'];?>" hidden>
                                    <input type="date" name="tanggal" class="form-control" id="floatingInput" value="<?=$dbt['tanggal'];?>">
                                    <label for="floatingInput">Tanggal</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="instansi" class="form-control" id="floatingInput" value="<?=$dbt['instansi'];?>">
                                    <label for="floatingInput">Instansi</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="nama" class="form-control" id="floatingInput" value="<?=$dbt['nama'];?>">
                                    <label for="floatingInput">Nama</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="jabatan" class="form-control" id="floatingInput" value="<?=$dbt['jabatan'];?>">
                                    <label for="floatingInput">Jabatan</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="nomorTelepon" class="form-control" id="floatingInput" value="<?=$dbt['nomorTelepon'];?>">
                                    <label for="floatingInput">Nomor Telepon</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input type="text" name="tujuan" class="form-control" id="floatingInput" value="<?=$dbt['tujuan'];?>">
                                    <label for="floatingInput">Tujuan</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <textarea name="keterangan" class="form-control" id="floatingInput" value="<?=$dbt['keterangan'];?>"> </textarea>
                                    <label for="floatingInput">Keterangan</label>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Edit BukuTamu</button>
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
          <h5 class="modal-title">Tambah BukuTamu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="BukuTamu_" enctype="multipart/form-data">  
          <div class="modal-body">
            <div class="modal-body">
              <div class="form-floating mb-3">
                <input type="date" name="tanggal" class="form-control" id="floatingInput" placeholder="Masukkan Tanggal">
                <label for="floatingInput">Tanggal</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="instansi" class="form-control" id="floatingInput" placeholder="Masukkan instansi">
                <label for="floatingInput">Instansi</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nama" class="form-control" id="floatingInput" placeholder="Masukkan nama">
                <label for="floatingInput">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="jabatan" class="form-control" id="floatingInput" placeholder="Masukkan jabatan">
                <label for="floatingInput">Jabatan</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="nomorTelepon" class="form-control" id="floatingInput" placeholder="Masukkan Nomor Telepon">
                <label for="floatingInput">Nomor Telepon</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="tujuan" class="form-control" id="floatingInput" placeholder="Masukkan Tujuan">
                <label for="floatingInput">Tujuan</label>
              </div>
              <div class="form-floating mb-3">
                <textarea name="keterangan" class="form-control" id="floatingInput"> </textarea>
                <label for="floatingInput">Keterangan</label>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah BukuTamu</button>
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