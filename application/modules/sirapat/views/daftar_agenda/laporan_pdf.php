<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiva="X-UA-Compatible" content="IE=edge">

        <title>Agenda <?= $agenda->nama_agenda?></title>

        <link rel="stylesheet" href="" >

        <style>
            .line-title{
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
        </style>



</head>
   
<body>
        
        <img src="<?php echo base_url() ?>assets/dashboard/img/logo.png" style="position: absolute"; width="100px" height="auto" >
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span style="line-height: 1.1; font-weight: bold; font-family: 'Times New Roman', Times, serif">
                         KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>
                         POLITEKNIK NEGERI BANYUWANGI<br>
                        <a style="line-height: 1.1; font-size: 11px"> Jl. Raya Jember KM 13 Labanasem, Kabat, Banyuwangi, 68461 </a> <br>
                        <a style="line-height: 1.1; font-size: 11px"> Telepon / Faks : (0333) 636780 </a> <br>
                        <a style="line-height: 1.1; font-size: 11px"> E-mail : poliwangi@poliwangi.ac.id ; Website : http://www.poliwangi.ac.id </a> <br>
                    </span>
                </td>
            </tr>
        </table>
        <hr class="line-title">
        

            <br>
           

            <p style="margin-left: 0px; margin-right: 50px; text-align: justify;">
            <span style="margin-left: 0px;">
            <a style="margin-right: 100px">Nomor</a> : <?= $agenda->nomor_agenda?>
            <a style="margin-left: 170px;">Banyuwangi, <?php echo $agenda->tanggal  ?></a>
            </span> <br>
            <span style="margin-left: 0px;">
            <a style="margin-right: 83px">Lampiran</a> : <?= $agenda->lampiran ?>
            </span> <br>
            <span style="margin-left: 0px;">
            <a style="margin-right: 100px">Perihal</a> : <?= $agenda->hal ?>
            </span>
        </p>
        <br>

        <p style="margin-left: 0px; margin-right: 50px; text-align: justify;">
            <span style="margin-left: 0px;">
            <a style="margin-right: 100px">Kepada Yth. Bapak/Ibu</a>
            <span style="margin-left: 0px;"><br>
            <a style="margin-right: 107px"><?= $agenda->peserta_rapat ?></a>
            </span> <br>
            <span style="margin-left: 0px;">
            <a style="margin-right: 45px">Politeknik Negeri Banyuwangi</a>
            </span> <br>
            <span style="margin-left: 0px;">
            <a style="margin-right: 45px">Ditempat</a>
            </span>
        </p>

        <p style="margin-left: 0px; margin-right: 0px; text-align: justify;">
           Dengan Hormat,<br>
           Mengundang Bapak/Ibu untuk hadir dalam rapat yang dilaksanakan pada :
        </p>
        

        <table width="100%" style="border-collapse: collapse; border: 0px solid black; float:right;">
        	<thead>
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
        	</tbody>
        </table>
        <br>
        <p style="margin-left: 0px; margin-right: 0px; text-align: justify;">
        Atas perhatianya kami sampaikan terimakasih.
        </p>

        
        <p style="float:right; padding-right:21%;">
        Banyuwangi, <?= $agenda->tanggal?><br>
       Ketua Rapat
       
        <br>
        <br>
        </p>
        

        <?php if($agenda->qrcode == 'ttdmanual.png'){ ?>
          
        <p style="float:right; padding-left:-10%;">
       
            <br><br><br><br>
       
        </p>
        
        <?php }else{ ?>
       
        <p style="float:right; padding-right:30%;">
       <img src="<?= base_url('assets/file/qr-code/').$agenda->qrcode ?>" style="width:650%; padding-top:5%">
       
        </p>
        
        <?php } ?>

        <p style="float:right; padding-right:17%; padding-top:15%; margin-left: 100px; ">
        
            <?= $agenda->nama_karyawan?><br>
        <?= $agenda->nik_nip ?>
        
        </p>
        

</body>
</html>