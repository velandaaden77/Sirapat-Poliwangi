
     <!-- Header -->
     <div class="header pb-6" style="background-image: url(<?= base_url('assets/dashboard/img/footer.jpg')?>); background-repeat: no-repeat;
  background-position: center center; background-size: cover;">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-5">
         
            <div class="col-lg-12 text-center">
             <h2 class="text-white"><i class="fas fa-paper-plane"></i> Share Undangan Rapat</h2>
            </div>
            </div>
          
          </div>
            </div>
             </div>

    <!-- Page content -->
    <div class="container-fluid mt--5">
      <div class="row">
        <div class="col-xl-12">

          <div class="card">

            <div class="row">

            <div class="col-lg-6 text-center">
            <img src="<?= base_url('assets/dashboard/img/message.jpg')?>" style="width: 90%;">
            </div>

            <div class="col-lg-6 pt-5">

            <form role="form" method="post" action="https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument" enctype="multipart/form-data" id="sendtelegram" target="_blank">

              <?php
                $this->load->library('form_validation');
                $this->form_validation->set_rules('chat_id', 'Id Chat', 'required');
                $this->form_validation->set_rules('caption', 'Caption', 'required');
                ?>
            <div class="col-sm-12">
            <div class="form-group">
            <label for="formGroupExampleInput2">Grup Rapat</label>
                <select name="chat_id" id="chat_id" class="form-control">
                <option value="">Pilih Grup</option>
                <option value="-431627117">Poliwangi</option>
                <option value="1292022051">Velanda Aden</option>
                </select>
             </div>
            </div>

            <div class="col-sm-12">
            <div class="form-group">
                <label for="caption">Caption </label>
                <input type="text" class="form-control" 
                id="caption" placeholder="Caption" name="caption" autocomplete="off">
                <?= form_error('caption', '<small class="text-danger pl-1">', '</small>'); ?>
            </div>
            </div>

            <div class="col-sm-12">
            <div class="form-group">
                <label for="document">File </label>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="document" name="document">
               
                </div>
            </div>

            <button type="submit" class="btn btn-primary" value="sendDocument"><i class="fa fa-paper-plane"></i> Kirim</button>

            </div>

          
            </form>
            
            </div>

            </div>
            
                <!-- <label>
                    <span>chat_id :</span>
                    <input id="chat_id" type="text" name="chat_id" value="-431627117" />
                </label>
                <label>
                    <span>caption :</span>
                    <input id="caption" type="text" name="caption"/>
                </label>
                <label>
                    <span>photo</span>
                    <input id="photo" type="file" name="document" />
                </label>      
                <label>
                    <span>&nbsp;</span>
                    <input type="submit" class="button" value="sendDocument"/></button>
                </label>    -->
          
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="card">
          <?= form_open_multipart('sirapat/admin/undangan/kirim_laporan_rekap'); ?>

<div class="row">
  <div class="col-8">
  <img src="<?= base_url('assets/dashboard/img/message.jpg')?>" style="width: 90%;">
 </div>
 <div class="col-lg-4">
  <div class="form-group">
    <label for="formGroupExampleInput2">Pilih Lampiran</label>
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
      <label class="custom-file-label" for="lampiran">Choose file</label>
    </div>
    <?= form_error('lampiran', '<small class="text-danger pl-1">', '</small>'); ?>
  </div>
</div>





</div>

<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Unggah</button>
<!-- <button type="reset" class="btn btn-danger"><i class="fa fa-undo"></i>Reset</button> -->

<?php form_close(); ?>
          </div>

        </div>
      </div>
    </div>

    
<script type="text/javascript">
    $(document).ready(function(){
        $('#sendtelegram').click(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'https://api.telegram.org/bot1283571393:AAE9wgUy9lQjXJfiyUsSAcGob4yFk8in1i8/sendDocument',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                        success: function(data){

                          alert:"Success";
                           
                        }
                 });
            });

        
    });


     
</script>


   
