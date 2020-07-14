<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiva="X-UA-Compatible" content="IE=edge">
        <?php $uri = $this->uri->segment(5);
$title = "SELECT * FROM `notulen` JOIN `agenda_rapat` ON `notulen`.`id_agenda` = `agenda_rapat`.`id`
WHERE `notulen`.`idnotulen` =  $uri ";
$t = $this->db->query($title)->row();

?>
        <title>Risalah - <?= $t->nama_agenda?></title>

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
            
            <h3 align="center">RISALAH RAPAT</h3>
        <table width="100%" style="border-collapse: collapse; border: 1px solid black;">
       
        		<tr style="border-collapse: collapse; border: 1px solid black;">
                <th style="border-collapse: collapse; border: 1px solid black;">No.</th>
                <th style="border-collapse: collapse; border: 1px solid black;">Subtopik</th>
                <th style="border-collapse: collapse; border: 1px solid black;">Catatan Kaki</th>
                </tr>
            
        	<tbody>
        		
            <?php $i=1 ?>
                <?php foreach($risalah as $r){ ?>
        		<tr>
               
        			<td align="center" style="border-collapse: collapse; border: 1px solid black; height:50px; width:1%  ">
                    <?=$i?>
                    </td>
        			<td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px; width:20%  ">
                    <?= $r->subtopik?>
                    </td>
        			<td align="left" style="border-collapse: collapse; border: 1px solid black; padding-left:10px; height:50px; width:20%  ">
                    <?= $r->catatan_kaki?>
                    </td>
               
                
        		</tr>
                
                <?php $i++ ?>
                <?php } ?>

        		
        	</tbody>
        </table>

</body>
</html>