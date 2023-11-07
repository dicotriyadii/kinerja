<?php
if($status == "user"){?>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Kinerja">
          <i class="bi bi-person-workspace"></i>
          <span>Kinerja</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
  </aside><!-- End Sidebar-->
<?php
}else if ($status == "admin"){?>
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list-task"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?=base_url()?>MasterJabatan">
              <i class="bi bi-circle"></i><span>Jabatan</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterPekerjaan">
              <i class="bi bi-circle"></i><span>Pekerjaan</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterStatus">
              <i class="bi bi-circle"></i><span>Status</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url()?>MasterPegawai">
              <i class="bi bi-circle"></i><span>Pegawai</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>Kinerja">
          <i class="bi bi-person-workspace"></i>
          <span>Kinerja</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>BukuTamuAdmin">
          <i class="bi bi-book"></i>
          <span>Buku Tamu</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>
  </aside><!-- End Sidebar-->
<?php
}
?>
