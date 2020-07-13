  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?= base_url('assets/'); ?>dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  
  <!-- Argon JS -->
  <script src="<?= base_url('assets/'); ?>dashboard/js/argon.js?v=1.2.0"></script>
  <!-- Datatables -->
  <!-- datepicker -->
 
 <!-- SweetAlert -->
 <script src="<?= base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.js"></script>

   
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  
  <script src="<?= base_url('assets/'); ?>vendor/select2.js"></script>

  <!-- select 2 -->
      <script type="text/javascript">
      $(document).ready(function() { 
      $("#pimpinan").select2();
      $("#karyawan").select2();
      $("#unit").select2();
      $("#gruprapat").select2();
      $('#agenda').DataTable();
      $('#grupdata').DataTable();
      $('#datatable').DataTable();
      });
      </script>
  
  <!-- Sweet Alert -->
  <script type="text/javascript">
  const  swal = $('.swal').data('swal');
  const  swal1 = $('.swal1').data('swal1');
  const  swal2 = $('.swal2').data('swal2');
  if(swal){
    Swal.fire({
      title: 'Sukses!',
      text: swal,
      icon: 'success'
    })
  }

  if(swal1){
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Data Sudah Ada!',
  footer: ''
})

  }
  if(swal2){
  Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Data Kosong!',
  footer: ''
})
  }
    $(document).on('click', '.btn-status', function(e) {

    // mengehntikan aksi defeault
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
    title: 'Apakah rapat sudah terlaksana?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sudah!'
    }).then((result) => {
    if (result.value) {
        document.location.href = href;
    }
    })

    })    

    // tombol hapus
    $(document).on('click', '.tombol-hapus', function(e) {

    // mengehntikan aksi defeault
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
    title: 'Hapus Data ?',
    text: "",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus!'
    }).then((result) => {
    if (result.value) {
        document.location.href = href;
    }
    })

    })            
  </script>
    

    

    


    <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    </script>         

    

    <script>

    $('.custom-file-input').on('change', function(){
      left fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // $('.form-check-input').on('click', function(){

    //   const menuId = $(this).data('menu');
    //   const roleId = $(this).data('role');

    //   $.ajax({
    //     url: "<?= base_url('sirapat/superadmin/role/changeaccess'); ?>",
    //     type: 'post',
    //     data: {
    //       menuId: menuId,
    //       roleId: roleId
    //     },
    //     success: function(){
    //       document.location.href = "<?= base_url('sirapat/superadmin/role/roleaccess/'); ?>" + roleId;
    //     }
    //   });

    // });
    </script>

    <script>
    $('.form-check-input').on('click', function(){

      const agendaId = $(this).data('agenda');
      const karyawanId = $(this).data('karyawan');

      // ajax
      $.ajax({

        url:"<?= base_url('sirapat/admin/absensi/addabsensi') ?>",
        type: 'post',
        data: {
          agendaId: agendaId,
          karyawanId: karyawanId
        },

        // ketika berhasil
        success: function () {
          document.location.href = "<?= base_url('sirapat/admin/absensi/detail_absensi/')?>" + agendaId;
        }

      });
    });
    </script>
