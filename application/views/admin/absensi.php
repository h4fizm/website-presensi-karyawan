<!-- <div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small> <?= $subtitle ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('index.php/admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section> -->
<div class="section-body mt-4">
    <?php if ($this->session->userdata('level') == 'Karyawan') { ?>
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
                                    <h6><i class="fas fa-clock"></i>
                                        <?= (empty($hariIni->num_rows()) ? '-' : date('H:i', strtotime($dAbs->jamMasuk))) ?>
                                    </h6>
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
                                    <h6><i class="fas fa-clock"></i>
                                        <?= (empty($hariIni->num_rows()) ? '-' : ($dAbs->jamPulang == '00:00:00' ? '-' : date('H:i', strtotime($dAbs->jamPulang)))) ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="card">
        <?php if ($this->session->userdata('level') == 'Administrator') { ?>
            <div class="card-header">
                <button class="btn btn-outline-primary mr-2" data-toggle="modal" data-target="#filterData">
                    <div class="fa fa-calendar"></div> Filter Data
                </button>
                <button class="btn btn-success mr-2" data-toggle="modal" data-target="#rekapData">
                    <div class="fa fa-book"></div> Rekap Data
                </button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#bulanData">
                    <div class="fa fa-book"></div> Filter Tanggal
                </button>
            </div>
        <?php } ?>

        <div class="card-body">
            <div class="table-responsive">
                <!-- DataTable -->
                <script>
                    $(document).ready(function () {
                        $('#table_id').DataTable();
                    });
                </script>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th width="10px">#</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Pulang</th>
                            <th>Lama Kerja</th>
                            <th>Posisi Masuk</th>
                            <th>Posisi Pulang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($absensi->result_array() as $row) {
                            ?>
                            <tr>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?php
                                    $user = $this->db->where('id', $row['idUser'])->get('tb_user')->row();
                                    echo (isset($user->nama) ? $user->nama : 'USER TELAH DIHAPUS!');
                                    /* foreach ($this->db->get('tb_user')->result() as $dUsr) {
                                        echo $dUsr->nama;
                                    } */
                                    ?>
                                </td>
                                <td>
                                    <?= date('d F Y', strtotime($row['tanggal'])) ?>
                                </td>
                                <td>
                                    <?= date('H:i:s', strtotime($row['jamMasuk'])) ?>
                                </td>
                                <td>
                                    <?php
                                    if ($row['jamPulang'] != '00:00:00') {
                                        echo date('H:i:s', strtotime($row['jamPulang']));
                                    } else {
                                        echo '<div class="label label-danger">Belum Absen</div>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= date('H:i:s', strtotime($row['lama'])) ?>
                                </td>
                                <td>
                                    <a href="<?= $row['urlMasuk'] ?>" class="btn btn-outline-primary btn-xs btn-custom"
                                        target="blank">
                                        <div class="fa fa-map-marker"></div> Lokasi Masuk
                                    </a>
                                </td>
                                <td>
                                    <?php if ($row['jamPulang'] != '00:00:00') { ?>
                                        <a href="<?= $row['urlPulang'] ?>" class="btn btn-warning btn-xs btn-custom"
                                            target="blank">
                                            <div class="fa fa-map-marker"></div> Lokasi Pulang
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- </section> -->
</div>


<!-- Modal Detail Data -->
<?php foreach ($absensi->result() as $dtlAbs) { ?>
    <div class="modal fade" id="detail<?= $dtlAbs->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Detail Absensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50%">
                                        <center>Foto Masuk</center>
                                    </th>
                                    <th width="50%">
                                        <center>Foto Pulang</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?= base_url('assets/gambar/') . $dtlAbs->fotoMasuk ?>" alt=""
                                            width="100%" class="img-responsive"></td>
                                    <td><img src="<?= base_url('assets/gambar/') . $dtlAbs->fotoPulang ?>" alt=""
                                            width="100%" class="img-responsive"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Filter Data -->
<div class="modal fade" id="filterData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Filter Absensi Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?= base_url('index.php/admin/absensi/filter') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Karyawan</label>
                        <select name="idUser" class="select2" style="width: 100%" required>
                            <option value="" selected disabled> -- Pilih Nama Karyawan -- </option>
                            <?php foreach ($karyawan->result() as $dKrywn) { ?>
                                <option value="<?= $dKrywn->id ?>">
                                    <?= $dKrywn->username . ' - ' . $dKrywn->nama ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-outline-primary">
                        <div class="fa fa-save"></div> Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Rekap Data -->
<div class="modal fade" id="rekapData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Rekap Absensi Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?= base_url('index.php/admin/absensi/rekap') ?>" method="POST" target="blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dariTanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampaiTanggal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" name="excel" class="btn btn-success">
                        <div class="fa fa-file-excel-o"></div> Export Excel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Filter Tanggal -->
<div class="modal fade" id="bulanData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Filter Berdasarkan Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url('index.php/admin/absensi/rekap') ?>" method="POST" target="blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dariTanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampaiTanggal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" name="rekap" class="btn btn-outline-primary">
                        <div class="fa fa-book"></div> Filter
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>