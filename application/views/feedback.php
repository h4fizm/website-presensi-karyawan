<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if (!empty($this->session->flashdata('pesanError'))) : ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Oops',
      text:  '<?= $this->session->flashdata('pesanError') ?>'
      // footer: '<a href="">Why do I have this issue?</a>'
    })
  </script>
  <?php endif ?>
  <?php if (!empty($this->session->flashdata('pesan'))) : ?>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Info!',
      text:  '<?= $this->session->flashdata('pesan') ?>'
      // footer: '<a href="">Why do I have this issue?</a>'
    })
  </script>
  <?php endif ?>