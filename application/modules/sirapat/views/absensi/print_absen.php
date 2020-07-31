<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row()?>
<title>Absensi - <?= $agenda->nama_agenda ?></title>
<style type="text/css">

.style1 {font-size: large}
.style2 {font-size: medium}

@media print {
                @page { margin: 0;}
                body { margin: 1cm;}
            }

</style>
<script type="text/javascript">
    window.print(); 
    </script>
</head>

    <body>
    <form>
    <img src="<?php echo base_url() ?>assets/dashboard/img/logo.png" style="position: absolute"; width="100px" height="auto" >
	<table width="100%" style="padding-left:5%">
    
  
  <!-- heading -->
            <tr>
                <td align="center" >
                <div style="margin-left:12%">
                    <span style="line-height: 1.1; font-weight: bold; font-family: 'Times New Roman', Times, serif">
                         KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>
                         POLITEKNIK NEGERI BANYUWANGI<br>
                        <a style="line-height: 1.1; font-size: 11px"> Jl. Raya Jember KM 13 Labanasem, Kabat, Banyuwangi, 68461 </a> <br>
                        <a style="line-height: 1.1; font-size: 11px"> Telepon / Faks : (0333) 636780 </a> <br>
                        <a style="line-height: 1.1; font-size: 11px"> E-mail : poliwangi@poliwangi.ac.id ; Website : http://www.poliwangi.ac.id </a> <br>
                    </span>
                    </div>
                </td>
            </tr>
            </table>

            <hr class="line-title">

   
            <?php $agenda = $this->db->get_where('agenda_rapat', ['id' => $this->uri->segment(5)])->row()?>
    
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
          <td colspan="2"><div align="center" class="style1"><strong>ABSENSI RAPAT</strong></div></td><br>
        </tr>
       
        <tr>
          <td colspan="2"><div align="center" class="style1"></div></td>
        </tr>
       
        <tr>
          <td width="19%">TANGGAL</td>
          <td width="81%">: <?= $agenda->tanggal ?> </td>
       </tr>
       
        <tr>
          <td><div align="left">ACARA</div></td>
          <td>: <?= $agenda->nama_agenda ?></td>
        </tr>

        <tr>
          <td>PUKUL</td>
          <td>: <?= $agenda->jam_mulai ?> - <?= $agenda->jam_selesai ?> WIB</td>
        </tr>
		        
          </tbody>
          </table>
          

          
          </form>

            <table width="100%" border="1" align="center" cellpadding="10" cellspacing="0">
            <thead>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>JABATAN</th>
                <th>STATUS</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
            <?php foreach ($getabsensi as $key => $data) : ?>
            <tr>
                <td align="center"><?= $i ?></td>
                <td><?= $data->nama_karyawan; ?></td>
                <td><?= $data->jabatan; ?></td>
                <td align="center"><?= $data->status; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            </tbody>

            </table>

            

          </body>
          </html>