<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle; ?> &mdash; Administrator </title>
    <link rel="icon" href="" />
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    <!-- icon website -->
    <link rel="icon" type="image/x-icon" href="<?php echo (isset($aplikasi->logo) ? base_url('assets/logo/' . $aplikasi->logo)  : base_url('assets/logo/stisla-fill.svg')); ?> ">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/components.css'); ?>">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Fira+Sans:ital,wght@1,500&family=Kanit:wght@500&family=Oswald:wght@500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'> -->

    <!-- Datable CDN css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


    <!-- css dashboard -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .alert-red {
            background-color: #FFD5D2 !important;
        }

        .text-red {
            color: #BB1F26;
        }

        .text-sucess {
            color: #079E21;
        }

        .form-search {
            width: 100% !important;
        }

        .badge-green {
            background-color: #CBFFD4;
            font-weight: 500;
        }

        .badge-blue {
            background-color: #DEEBFF;
            color: #002CB9;
        }

        a.alert-link {
            color: #BB1F26;
        }

        .card-body p {
            line-height: normal;
        }

        .rounded-xl {
            border-radius: 8px;
        }

        .ajax-datatables {
            width: 100%;
            min-width: 100%;
        }

        .select {
            width: 100%;
        }
    </style>
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

    <script src="<?php echo base_url('assets/js/stisla.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

    <!-- Datable CDN js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</head>

<body data-url="<?php echo base_url(); ?>">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <?php $this->load->view('admin/templates/header'); ?>

            <div class="main-sidebar bg-write">
                <?php $this->load->view('admin/templates/sidebar'); ?>
            </div>

        </div>
    </div>
    </div>

    <div class="main-content">

        <section class="section mt-4">
            <div class="section-header justify-content-between">
                <div class="mr-auto p-2">
                    <div class="navbar-card-2"><?php echo (isset($pageTitle) ? $pageTitle : 'Page Administrator') ?></div>
                </div>
                <!--     <div class="p-2">
              <div class="text-end">
                Tahun
              </div>
            </div>
            <div class="p-2">
              <select class="form-control text-center" id='date-dropdown'>
              </select>
            </div> -->
            </div>
        </section>
        <section class="content">
            <?php echo $pageContent; ?>
        </section>
    </div>
    </div>

    <footer class="main-footer">
        <?php $this->load->view('admin/templates/footer'); ?>
    </footer>
    <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan') ?>"></div>
  <div class="flash-data-error" data-flashdataerror="<?= $this->session->flashdata('pesanError') ?>"></div> -->
</body>
<script type="text/javascript">
    function getLocationConstant() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
        } else {
            alert("Your browser or device doesn't support Geolocation");
        }
    }

    // If we have a successful location update
    function onGeoSuccess(event) {
        document.getElementById("LatitudeMasuk").value = event.coords.latitude;
        document.getElementById("LongitudeMasuk").value = event.coords.longitude;
        document.getElementById("LatitudePulang").value = event.coords.latitude;
        document.getElementById("LongitudePulang").value = event.coords.longitude;
        document.getElementById("Position1").value = event.coords.latitude + ", " + event.coords.longitude;
    }


    // If something has gone wrong with the geolocation request
    function onGeoError(event) {
        alert("Error code " + event.code + ". " + event.message);
    }
</script>

<!-- Modal masuk -->
<div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Absen Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?= base_url('index.php/admin/absensi/masuk') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" capture="camera" required>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="LatitudeMasuk" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="LongitudeMasuk" required readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning btn-xs" onclick="getLocationConstant()">
                        <div class="fa fa-map-marker"></div> Get Location
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-outline-primary">
                        <div class="fa fa-save"></div> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
date_default_timezone_set('Asia/Jakarta');
$hariIni = $this->db->query('SELECT * FROM tb_absensi WHERE idUser="' . $this->session->userdata('id') . '" AND tanggal="' . date('Y-m-d') . '"');
foreach ($hariIni->result() as $dAbs) {
}
?>
<!-- Modal Pulang -->
<div class="modal fade" id="pulang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Absen Pulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <form action="<?= base_url('index.php/admin/absensi/pulang/') . $dAbs->id ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <!--   <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/*" capture="camera" required>
                        <input type="hidden" name="jamMasuk" class="form-control" value="<?= $dAbs->jamMasuk ?>">
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="text" name="latitude" class="form-control" id="LatitudePulang" required readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="LongitudePulang" required readonly>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning btn-xs" onclick="getLocationConstant()">
                        <div class="fa fa-map-marker"></div> Get Location
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">
                        <div class="fa fa-undo"></div> Reset
                    </button>
                    <button type="submit" class="btn btn-outline-primary">
                        <div class="fa fa-save"></div> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('feedback'); ?>
<script>
    // $(document).ready(function () {
    //     console.log(window.location.pathname.includes('//').replace('//', '/'));
    // });
</script>

</html>