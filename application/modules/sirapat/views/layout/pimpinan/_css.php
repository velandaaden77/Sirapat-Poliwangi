<link rel="icon" href="<?= base_url('assets/'); ?>dashboard/img/Rapat.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/css/argon.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard/dist/sweetalert2.min.css">
  <link href="<?= base_url('assets/'); ?>vendor/select2.css" rel="stylesheet"/>

  <script>
    $('.form-check-input').on('click', function(){
      const agendaId= $(this).data('agenda');
      const validasiId= $(this).data('validasi');

      // ajax
      $.ajax({
        url: "<?= base_url('sirapat/pimpinan/validasi/validasimanual');?>",
        type:'post',
        data: {
          agendaId: agendaId, 
          validasiId: validasiId },
        // ketika berhasil
        success: function(){
          document.location.href= "<?= base_url('sirapat/pimpinan/validasi/')?>" + agendaId;
        }

      });
    });
    </script>
    