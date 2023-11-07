  <?php
  include('link/header.php');
  if($status == "admin"){?>
    <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Kinerja</h5>
                <p>Kinerja merupakan kumpulan data pekerjaan yang sedang dalam proses ataupun tidak sedang dalam proses pengerjaan</p>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verticalycentered">Tambah Master Kinerja</button><br>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Pegawai</th>
                      <th scope="col">Jenis Pekerjaan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">StatusKinerja</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataKinerja as $dk){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dk['namaPegawai'];?></td>
                      <td><?=$dk['namaPekerjaan'];?></td>
                      <td><?=$dk['keterangan'];?></td>
                      <td><?=$dk['namaStatus'];?></td>
                      <td>
                        <a href="https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/DownloadBerkas/<?=$dk['idKinerja']?>"><i class="bi bi-download" style="font-size:25px;font-weight:bold;color:blue"></i></a>
                        <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dk['idKinerja']?>"><i class="bi bi-pencil" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <a href="<?=base_url()?>HapusKinerja/<?=$dk['idKinerja']?>" style="color:red;"><i class="bi bi-trash" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <div class="modal fade" id="verticalycentered<?=$dk['idKinerja']?>" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit Master Kinerja</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="KinerjaEdit_" enctype="multipart/form-data">  
                                <div class="modal-body">
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                      <input type="text" value="<?=$dk['idKinerja']?>" name="idKinerja" hidden>
                                      <input type="text" value="<?=$dk['berkas']?>" name="pathBerkas" hidden>
                                      <select name="pegawai" class="form-control">
                                        <option value="<?=$dk['id']?>"><?=$dk['namaPegawai']?></option>
                                        <?php
                                        foreach($dataPegawai as $dp){?>
                                        <option value="<?= $dp['id'] ?>"><?=$dp['namaPegawai']?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                      <label for="floatingInput">Pegawai</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <select name="pekerjaan" class="form-control">
                                        <option value="<?= $dk['idPekerjaan'] ?>"><?=$dk['namaPekerjaan']?></option>
                                        <?php
                                        foreach($dataPekerjaan as $dpe){?>
                                        <option value="<?= $dpe['idPekerjaan'] ?>"><?=$dpe['namaPekerjaan']?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                      <label for="floatingInput">Pekerjaan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <textarea name="keterangan" class="form-control" style="height:100px;"><?=$dk['keterangan']?></textarea>
                                      <label for="floatingInput">Keterangan Pekerjaan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <select name="status" class="form-control">
                                        <option value="<?=$dk['idStatus']?>"><?=$dk['namaStatus']?></option>
                                        <?php
                                        foreach($dataStatus as $ds){?>
                                        <option value="<?= $ds['idStatus'] ?>"><?=$ds['namaStatus']?></option>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                      <label for="floatingInput">Pekerjaan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                      <input type="file" name="berkas">
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Tambah Master Kinerja</button>
                                    </div>
                                  </div>
                                </div>
                              </form>          
                            </div>
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
            <h5 class="modal-title">Tambah Master Kinerja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="Kinerja_" enctype="multipart/form-data">  
            <div class="modal-body">
              <div class="modal-body">
                <div class="form-floating mb-3">
                  <select name="pegawai" class="form-control">
                    <option value="">- Pilih Pegawai -</option>
                    <?php
                    foreach($dataPegawai as $dp){?>
                    <option value="<?= $dp['id'] ?>"><?=$dp['namaPegawai']?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="floatingInput">Pegawai</label>
                </div>
                <div class="form-floating mb-3">
                  <select name="pekerjaan" class="form-control">
                    <option value="">- Pilih Pekerjaan -</option>
                    <?php
                    foreach($dataPekerjaan as $dpe){?>
                    <option value="<?= $dpe['idPekerjaan'] ?>"><?=$dpe['namaPekerjaan']?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="floatingInput">Pekerjaan</label>
                </div>
                <div class="form-floating mb-3">
                  <textarea name="keterangan" class="form-control" style="height:100px;"></textarea>
                  <label for="floatingInput">Keterangan Pekerjaan</label>
                </div>
                <div class="form-floating mb-3">
                  <select name="status" class="form-control">
                    <option value="">- Status -</option>
                    <?php
                    foreach($dataStatus as $ds){?>
                    <option value="<?= $ds['idStatus'] ?>"><?=$ds['namaStatus']?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <label for="floatingInput">Status Pekerjaan</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="file" name="berkas">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tambah Master Kinerja</button>
                </div>
              </div>
            </div>
          </form>          
        </div>
      </div>
    </div>
  <?php
  }else if($status == "user"){?>
    <main id="main" class="main">
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title" style="font-size:35px;">Kinerja</h5>
                <p>Kinerja merupakan kumpulan data pekerjaan yang sedang dalam proses ataupun tidak sedang dalam proses pengerjaan</p>
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nama Pegawai</th>
                      <th scope="col">Jenis Pekerjaan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">StatusKinerja</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=0;
                    foreach($dataKinerja as $dk){
                    $no++;
                    ?>
                    <tr>
                      <th><?=$no;?></th>
                      <td><?=$dk['namaPegawai'];?></td>
                      <td><?=$dk['namaPekerjaan'];?></td>
                      <td><?=$dk['keterangan'];?></td>
                      <td>
                        <?=$dk['namaStatus'];?><br>
                        <?php
                        if($dk['statusKinerja'] == 6){?>
                          <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dk['idKinerja']?>Keterangan"><i class="bi bi-plus" style="font-size:25px;font-weight:bold;color:red"></i></a>
                          <a href="" style="color:green;" data-bs-toggle="modal" data-bs-target="#verticalycentered<?=$dk['idKinerja']?>TampilKeterangan"><i class="bi bi-eye" style="font-size:25px;font-weight:bold;color:red"></i></a>
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                        <a href="https://kominfostan.deliserdangkab.go.id/APIHaloKominfoInternal/api/DownloadBerkas/<?=$dk['idKinerja']?>"><i class="bi bi-download" style="font-size:25px;font-weight:bold;color:blue"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url()?>GantiStatus/<?=$dk['idKinerja']?>/5"><i class="bi bi-person-workspace" style="font-size:25px;font-weight:bold;color:gray"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url()?>GantiStatus/<?=$dk['idKinerja']?>/6"><i class="bi bi-clock-history" style="font-size:25px;font-weight:bold;color:orange"></i></a>&nbsp;&nbsp;
                        <a href="<?=base_url()?>GantiStatus/<?=$dk['idKinerja']?>/7" style="color:red;"><i class="bi bi-check-circle" style="font-size:25px;font-weight:bold;color:green"></i></a>
                        <!-- Modal Tampil keterangan Apabila Status Ditunda -->
                        <div class="modal fade" id="verticalycentered<?=$dk['idKinerja']?>TampilKeterangan" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Keterangan Ditunda</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                <div class="modal-body">
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                      <textarea name="keterangan" class="form-control" style="height:100px;" disabled><?=$dk['keterangan']?></textarea>
                                    </div>
                                  </div>
                                </div>       
                            </div>
                          </div>
                        </div>
                        <!-- Modal Tambah keterangan Apabila Status Ditunda -->
                        <div class="modal fade" id="verticalycentered<?=$dk['idKinerja']?>Keterangan" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Tambah Keterangan Ditunda</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="POST" action="KinerjaEditKeterangan_" enctype="multipart/form-data">  
                                <div class="modal-body">
                                  <div class="modal-body">
                                    <div class="form-floating mb-3">
                                      <input type="text" value="<?=$dk['idKinerja']?>" name="idKinerja" hidden>
                                      <textarea name="keteranganDitunda" class="form-control" style="height:100px;"></textarea>
                                      <label for="floatingInput">Keterangan Ditunda</label>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Tambah Master Kinerja</button>
                                    </div>
                                  </div>
                                </div>
                              </form>          
                            </div>
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
  <?php
  }
  ?>
  
  <?php
  include('link/footer.php')
  ?>