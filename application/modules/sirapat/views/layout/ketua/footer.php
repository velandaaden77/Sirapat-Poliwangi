
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/'); ?>dashboard/js/argon.js?v=1.2.0"></script>
  <!-- SweetAlert -->
  <script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function() { 
      $('#validasiagenda').DataTable();
      $('#daftar_rapat').DataTable();
      });
      </script>

  <!-- Sweetalert2 -->
  <script type="text/javascript">
  const  swal = $('.swal').data('swal');
  if(swal){
    Swal.fire({
      title: 'Sukses!',
      text: swal,
      icon: 'success'
    })
  }

  $(document).on('click', '.btn-batal', function(e) {

    // mengehntikan aksi defeault
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
    title: 'Batalkan validasi ?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Batalkan!'
  }).then((result) => {
    if (result.value) {
     
        document.location.href = href;
    
    }
  })
    
  })

  
    $(document).on('click', '.btn-validm', function(e) {

    // mengehntikan aksi defeault
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
    title: 'Validasi Manual ?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Validasi!'
    }).then((result) => {
    if (result.value) {
    
        document.location.href = href;

    }
    })

    })            
  </script>

 
 

  <script type="text/javascript">
    $('.form-check-input').on('click', function(){
      const agendaId= $(this).data('agenda');
      const validasiId= $(this).data('validasi');
      const grupId= $(this).data('grup');

      // ajax
      $.ajax({
        type: 'POST',
        url:"<?= base_url('sirapat/user/ketua/validasi_m') ?>",
        data: {
          grupId: grupId,
          agendaId: agendaId, 
          validasiId: validasiId},
        // ketika berhasil
        success: function($data){
          console.log($data)
          document.location.href= "<?= base_url('sirapat/user/ketua/validasiagenda/')?>" + grupId;
        }

      });
    });
    </script>
   
</body>
</html>