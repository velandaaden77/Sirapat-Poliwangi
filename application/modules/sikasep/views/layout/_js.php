  <script src="<?php base_url() ;?>../assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php base_url() ;?>../assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php base_url() ;?>../assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
<!-- <script type="text/javascript" src="http://code.highcharts.com/modules/exporting.js"></script> -->


<script type="text/javascript">
$(document).ready(function () {
  $('#myTable').DataTable({
  "scrollY": "800px",
  "scrollCollapse": true,
  });
  $('.dataTables_length').addClass('bs-select');
});
$(function() {
  $('#myTab a[href~="' + location.href + '"]').addClass('active');
});

$(function () {
  $('#pie-chart').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      backgroundColor: 'transparent',
    },
    title: {
      text: 'Data Penduduk Indonesia',
      style: { "color": "#fff", "fontSize": "18px" }
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    credits: {
      enabled: false
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        showInLegend: true,
        dataLabels: {
          enabled: false,
          format: '<b><p>tes</p></b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
          }
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Persentase Penduduk',
      data: [
          <?php 
          // data yang diambil dari database
          if(count($graph)>0)
          {
             foreach ($graph as $data) {
             echo "['" .$data->last_name . "'," . $data->active ."],\n";
             }
          }
          ?>
      ]
    }]
  });
});
 
$(function () {
  $('#pie-chart2').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      backgroundColor: 'transparent'

    },
    title: {
      text: 'Data Penduduk Indonesia 2',
      style: { "color": "#fff", "fontSize": "18px" }
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    credits: {
      enabled: false
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        showInLegend: true,
        dataLabels: {
          enabled: false,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'white'
          }
        }
      }
    },
    series: [{
      type: 'pie',
      name: 'Persentase Penduduk',
      data: [
          <?php 
          // data yang diambil dari database
          if(count($graph)>0)
          {
             foreach ($graph as $data) {
             echo "['" .$data->first_name . "'," . $data->active ."],\n";
             }
          }
          else{
             echo "Data tabel masih kosong";
          }
          ?>
      ]
    }]
  });
});

</script>



