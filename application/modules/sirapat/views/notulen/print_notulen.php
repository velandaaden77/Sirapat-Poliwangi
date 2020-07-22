<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiva="X-UA-Compatible" content="IE=edge">

        <title>Notulen - <?= $notulensi->nama_agenda?></title>

        <link rel="stylesheet" href="" >

        <style>
            .line-title{
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
            }
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
        
        <img src="<?php echo base_url() ?>assets/dashboard/img/logo.png" style="position: absolute"; width="50px" height="auto" >
        <table style="width: 100%;">
            <tr>
                <td align="left" style="padding-left:70px">
                    <span style="line-height: 1.1; font-weight: bold; font-family: 'Times New Roman', Times, serif;">
                         KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>
                         POLITEKNIK NEGERI BANYUWANGI<br>
                        
                    </span>
                </td>
            </tr>
        </table>
        <hr class="line-title">

            <br>
            <br>
            <br>
        <table width="100%" style="border-collapse: collapse; border: 1px solid black;">
       
        		<tr style="border-collapse: collapse; border: 1px solid black;">
        			<th style="border-collapse: collapse; border: 1px solid black;">
                    <img src="<?= base_url('assets/dashboard/img/logo.png')?>" style="width: 120px">
                    </th>
        			<th align="center" colspan="2" style="border-collapse: collapse; border: 1px solid black;"><h2>NOTULENSI RAPAT</h2></th>
        			
        		</tr>
            
        	<tbody>
        		
                
        		<tr>
        			<td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:100px ">
                    <span>Hari/Tanggal :</span><br>
                    <span>Ruang Rapat :</span><br>
                    <span>Waktu :</span><br>
                    <span>Surat Undangan No. :</span><br>
                    <span>Tipe Rapat :</span><br>
                    </td>

        			<td align="left" colspan="2" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:100px ">
                    <span><?= $notulensi->tanggal ?></span><br>
                    <span><?= $notulensi->ruang_rapat ?></span><br>
                    <span><?= $notulensi->waktu_mulai ?> WIB - <?= $notulensi->waktu_selesai ?> WIB</span><br>
                    <span><?= $notulensi->nomor_agenda ?></span><br>
                    <span><?= $notulensi->nama_grup ?></span><br>
                    </td>

        			
        		
        		</tr>
        		<tr>
        			<td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span>Daftar Hadir :</span><br>
                    </td>

        			<td align="left" colspan="2" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span><?= $notulensi->daftar_hadir ?></span><br>
                    </td>
        		
        		</tr>
        		<tr>
                <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span>Total Hadir :</span><br>
                    </td>

        			<td align="left" colspan="2" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span><?= $notulensi->total_hadir ?> Orang</span><br>
                    </td>
        			
        		</tr>

        		<tr>
                <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:100px ">
                    <span>Agenda :</span><br>
                    </td>

        			<td align="left" colspan="2" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span><?= $notulensi->nama_agenda?></span><br>
                    </td>
        		</tr>

        		<tr>
                <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:100px ">
                    <span>Ringkasan :</span><br>
                    </td>

        			<td align="left" colspan="2" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span><?= $notulensi->ringkasan ?></span><br>
                    </td>
        		</tr>

        		<tr>
                <td align="left" rowspan="4"  style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:100px ">
                    <span>Validasi :</span><br>
                    </td>

        			<td align="center" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px ">
                    <span>Validator :</span><br>
                    </td>

                    <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px ">
                    <span>Paraf :</span><br>
                    </td>
        		</tr>
                <tr>
                <?php $k = $this->notulen_m->ketuarapat($this->uri->segment(5))->row(); ?>
                    <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px ">
                    <span>1. Ketua Rapat  (<?= $k->nama_karyawan?>)</span><br>
                    </td>
                    <td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px ">
                    <span></span><br>
                    </td>
                    
                </tr>
                <tr>
                    <td align="left"  style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px ">
                    <span>2. Notulen         (<?= $notulensi->notulen ?>)</span><br>
                    </td>
                    <td align="left"  style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px ">
                    <span></span><br>
                    </td>
                </tr>
                <tr>
                    <td align="left"  style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px; width:80%">
                    <span>3. PIC AUK      (<?= $notulensi->pic ?>)</span><br>
                    </td>
                    <td align="left"  style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:30px; ">
                    <span></span><br>
                    </td>
                </tr>
        		
        		
        	</tbody>
        </table>

</body>
</html>