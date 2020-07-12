<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<title>Cetak Absensi</title>
<style type="text/css">
@media print {
  @page { margin: 0; }
  body { margin: 1.6cm; }
}
.style1 {font-size: large}
.style2 {font-size: medium}

</style>

<script>
window.print();
</script>
</head>

    <body>
    <form>
	<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
    <tbody>
  
  <!-- heading -->
    <tr> 
      <td width="15%"><div align="left">
        <h2 align="center"><img src="<?= base_url('assets/dashboard/img/logo.png') ?>" width="133" height="124"></h2>
      </div></td>
      <td width="85%"><div align="center" class="style1"><strong>KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>
	  POLITEKNIK NEGERI BANYUWANGI </strong><br>
      <span class="style2">Jl. Raya Jember - Banyuwangi KM 13, Rogojampi, Labanasem, Banyuwangi, Jawa Timur 68461</span><br>
      <span class="style2">Website : http://www.poliwangi.ac.id E-Mail : politeknik@poliwangi.ac.id</span></div></td>
    </tr>

    <tr> 
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2"><hr noshade=""></td>
    </tr>

   

    <tr>
      <td colspan="2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        
       
        <tr>
          <td colspan="2"><div align="center" class="style1"></div></td>
        </tr>
       
        <tr>
          <td width="19%">Nomor</td>
          <td width="81%">: <?= $agenda->nomor_agenda?> </td>
       </tr>
       
        <tr>
          <td><div align="left">Lampiran</div></td>
          <td>: <?= $agenda->lampiran ?></td>
        </tr>

        <tr>
          <td>Hal</td>
          <td>: <?= $agenda->hal ?></td>
        </tr>
        <br>
        
		        
          </tbody>
          </table>
          
          </td>
          </tr>


        <tr>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            
        <tr>
            <td colspan="4" style="float:left;">Yth. Bapak/Ibu <?= $agenda->peserta_rapat ?></td>
        </tr>
        <tr>
            <td colspan="4" style="float:left;">Politeknik Negeri Banyuwangi</td>
        </tr>
        <tr>
            <td colspan="4" style="float:left;">Ditempat</td>
        </tr>
       
        <br>
        <br>
		        
          </tbody>
          </table>
          </td>
          </tr>


        <tr>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            
        <tr>
            <td colspan="4" style="float:left;">Dengan Hormat,</td>
        </tr>
        <tr>
            <td colspan="4" style="float:left;">Mengundang Bapak/Ibu untuk hadir dalam rapat yang dilaksanakan pada :</td>
        </tr>
        <br>
        <br>
        </tbody>
        </table>
        </td>
        </tr>

        <tr>
      <td colspan="2">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        
        <tr>
          <td colspan="2"><div align="center" class="style1"></div></td>
        </tr>
       
        <tr>
          <td width="19%">Hari, Tanggal</td>
          <td width="81%">: <?= $agenda->tanggal?> </td>
       </tr>
       
        <tr>
          <td><div align="left">Pukul</div></td>
          <td>: <?= $agenda->jam_mulai ?>-<?= $agenda->jam_selesai ?> WIB</td>
        </tr>

        <tr>
          <td>Tempat</td>
          <td>: <?= $agenda->tempat ?></td>
        </tr>
        <tr>
          <td>Agenda</td>
          <td>: <?= $agenda->nama_agenda ?></td>
        </tr>
        <br>

        <tr>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td colspan="4" style="float:left;">Atas perhatianya kami sampaikan terimakasih.</td>
        </tr>
        <br>
        <br>
        </tbody>
        </table>
        </td>
        </tr>

        <tr>
        <td colspan="2" float="left">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody style="float:right; padding-right:17%;">
        <tr>
            <td colspan="4">Banyuwangi, <?= $agenda->tanggal?></td>
        </tr>
        <tr>
            <td colspan="4"><?= $agenda->jabatan ?></td>
        </tr>
        <br>
        <br>
        </tbody>
        </table>
        </td>
        </tr>

        <tr>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody style="float:right;">
        <tr>
            <td><img src="<?= base_url('assets/file/qr-code/').$agenda->qrcode ?>" class="img-thumbnail" style="width:50%"></td>
        </tr>
        
        
        </tbody>
        </table>
        </td>
        </tr>

        <tr>
        <td colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody style="float:right; padding-right:10%;">
        <tr>
            <td colspan="4"><?= $agenda->nama_karyawan?></td>
        </tr>
        <tr>
            <td colspan="4"><?= $agenda->nik_nip ?></td>
        </tr>
        
        </tbody>
        </table>
        </td>
        </tr>
        
		        
          </tbody>
          </table>
          
          </td>
          </tr>

          </tbody>
          </table>
          </form>

          <table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
            <tbody>
            
            </tbody>
            </table>
            

            

          </body>
          </html>