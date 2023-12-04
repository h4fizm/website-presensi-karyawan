
<div class="section-body mt-4">
    <div class="row">
        <div class="col-lg-3 col-xs-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-blue icon">
                    <i class="fa fa-calendar"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="card-judul">Total Absensi Saya</h4>
                    </div>
                    <div class="card-body">
                    <?php echo $this->db->query('SELECT id FROM tb_absensi WHERE idUser="' . $this->session->userdata('id') . '" ')->num_rows(); ?>

                    </div>
                </div>
            </div>
         
        </div>
        <div class="col-lg-3 col-xs-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-blue icon">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="card-judul">Total Absensi</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $this->db->query('SELECT id FROM tb_absensi')->num_rows();
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-12">
            
            <div class="card card-statistic-1">
                <div class="card-icon bg-blue icon">
                    <i class="fa fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="card-judul">Total Karyawan</h4>
                    </div>
                    <div class="card-body">
                    <?php
                        echo $this->db->query('SELECT id FROM tb_user WHERE level="Karyawan"')->num_rows();
                        ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-xs-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-blue icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="card-judul">Total Administrator</h4>
                    </div>
                    <div class="card-body">
                        <?php
                        echo $this->db->query('SELECT id FROM tb_user WHERE level="Administrator"')->num_rows();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($this->session->userdata('level') == 'Karyawan') : ?>
        <?php
        date_default_timezone_set('Asia/Jakarta');
        $hariIni = $this->db->query('SELECT * FROM tb_absensi WHERE idUser="' . $this->session->userdata('id') . '" AND tanggal="' . date('Y-m-d') . '"');
        foreach ($hariIni->result() as $dAbs) {
        }
        ?>
         <div class="row">
            <div class="col-lg-6 col-xs-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-blue icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="card-judul">Absen Masuk</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <?php if (empty($hariIni->num_rows())) { ?>
                                        <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#masuk">
                                            Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                        </a>
                                    <?php } else { ?>
                                        <?= date('d M Y', strtotime($dAbs->tanggal)) ?>
                                    <?php } ?>
                                </div>

                                <div>
                                    <h6><i class="fas fa-clock"></i> <?= (empty($hariIni->num_rows()) ? '-' : date('H:i', strtotime($dAbs->jamMasuk))) ?></h6>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-blue icon">
                        <i class="fa fa-sign-out-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="card-judul">Absen Pulang</h4>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <?php if (empty($hariIni->num_rows())) { ?>
                                        Belum Absen Masuk

                                    <?php } else { ?>
                                        <?php
                                        if ($dAbs->jamPulang == '00:00:00') {
                                            echo '<a href="#" class="btn btn-info" data-toggle="modal" data-target="#pulang">
                                        Absen Sekarang <i class="fa fa-arrow-circle-right"></i>
                                    </a>';
                                        } else {
                                            echo date('d M Y', strtotime($dAbs->tanggal));
                                        }
                                        ?>
                                    <?php } ?>
                                </div>
                                <div>
                                    <h6><i class="fas fa-clock"></i> <?= (empty($hariIni->num_rows()) ? '-' : ($dAbs->jamPulang == '00:00:00' ? '-' : date('H:i', strtotime($dAbs->jamPulang)))) ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == "Administrator") { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    <div class="font-pgp-dasboard">
                            Belum Absen Hari Ini
						</div>
                     
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped dataTable">
                                <thead>
                                    <th width="10px">#</th>
                                    <th>Username/ID</th>
                                    <th>Nama Karyawan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noBlm = 1;
                                    $belumAbsen = $this->db->query('SELECT * FROM tb_user WHERE id NOT IN (SELECT idUser FROM tb_absensi WHERE tanggal="' . date('Y-m-d') . '") AND level="Karyawan" ');
                                    foreach ($belumAbsen->result() as $dBlm) {
                                    ?>
                                        <tr>
                                            <td><?= $noBlm++ ?></td>
                                            <td><?= $dBlm->username ?></td>
                                            <td><?= $dBlm->nama ?></td>
                                            <td>
                                                <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/') . $dBlm->id ?>" class="btn btn-outline-primary btn-xs">
                                                    <div class="fa fa-eye"></div> View
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                    <div class="font-pgp-dasboard">
                    Sudah Absen Masuk Hari Ini
						</div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped dataTable">
                                <thead>
                                    <th width="10px">#</th>
                                    <th>Username/ID</th>
                                    <th>Nama Karyawan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noSdh = 1;
                                    $sudahAbsen = $this->db->query('SELECT * FROM tb_user WHERE id IN (SELECT idUser FROM tb_absensi WHERE tanggal="' . date('Y-m-d') . '") AND level="Karyawan" ');
                                    foreach ($sudahAbsen->result() as $dSdh) {
                                    ?>
                                        <tr>
                                            <td><?= $noSdh++ ?></td>
                                            <td><?= $dSdh->username ?></td>
                                            <td><?= $dSdh->nama ?></td>
                                            <td>
                                                <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/') . $dSdh->id ?>" class="btn btn-outline-primary btn-xs">
                                                    <div class="fa fa-eye"></div> View
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card ">
                    <div class="card-header">
                    <div class="font-pgp-dasboard">
                    Belum Absen Pulang Hari Ini
						</div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped dataTable">
                                <thead>
                                    <th width="10px">#</th>
                                    <th>Username/ID</th>
                                    <th>Nama Karyawan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $noBlmPlng = 1;
                                    $belumPulang = $this->db->query('SELECT * FROM tb_absensi WHERE jamPulang="00:00:00" AND tanggal="' . date('Y-m-d') . '"');
                                    foreach ($belumPulang->result() as $blmPlng) {
                                    ?>
                                        <tr>
                                            <td><?= $noBlmPlng++ ?></td>
                                            <?php
                                            $this->db->where('id', $blmPlng->idUser);
                                            foreach ($this->db->get('tb_user')->result() as $dKrywn) {
                                            ?>
                                                <td><?= $dKrywn->username ?></td>
                                                <td><?= $dKrywn->nama ?></td>
                                            <?php } ?>
                                            <td>
                                                <a href="<?= base_url('index.php/admin/dashboard/filterkaryawan/') . $blmPlng->idUser ?>" class="btn btn-outline-primary btn-xs">
                                                    <div class="fa fa-eye"></div> View
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<!-- SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(lama))) FROM tb_absensi; -->