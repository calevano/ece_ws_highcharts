<?php
    $suma_total_cantidad=intval($cantidad_total['total_SupervInfor'])+
    intval($cantidad_total['total_Coor_LiderLocal'])+
    intval($cantidad_total['total_Coor_Sede'])+
    intval($cantidad_total['total_Coor_Local'])+
    intval($cantidad_total['total_Asist_CoordLocal'])+
    intval($cantidad_total['total_Informatico_Local'])+
    intval($cantidad_total['total_Asist_InforLocal'])+
    intval($cantidad_total['total_Aplicador'])+
    intval($cantidad_total['total_Orientador'])+
    intval($cantidad_total['total_Operador_Informatico']);
  ?>
<!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
<!-- <script src="http://code.highcharts.com/modules/data.js"></script>
<script src="http://code.highcharts.com/modules/drilldown.js"></script> -->
<section class="content-header"></section>
<section class="content">
   <div class="row">
      <div class="col-md-10 col-sm-12">
         <div class="box noBox">
            <div class="box-body ">
               <div id="containerGraficoTres" style="width: 100%; height: 600px; margin: 0 auto"></div>
            </div>
         </div>
      </div>
   </div>
</section>
<script type="text/javascript">

  Highcharts.createElement('link', {
    href: '//fonts.googleapis.com/css?family=Signika:400,700',
    rel: 'stylesheet',
    type: 'text/css'
  }, null, document.getElementsByTagName('head')[0]);

  Highcharts.wrap(Highcharts.Chart.prototype, 'getContainer', function (proceed) {
    proceed.call(this);
    this.container.style.background = 'url(http://www.highcharts.com/samples/graphics/sand.png)';
  });


  Highcharts.theme = {
    colors: ["#f1c40f", "#2cc36b", "#e74c3c", "#7798BF", "#aaeeee", "#ff0066", "#eeaaee","#55BF3B", "#DF5353", "#7798BF", "#aaeeee"],
    chart: {
      backgroundColor: null,
      style: {
        fontFamily: "Signika, serif"
      }
    },
    title: {
      style: {
        color: 'black',
        fontSize: '16px',
        fontWeight: 'bold'
      }
    },
    subtitle: {
      style: {
        color: 'black'
      }
    },
    tooltip: {
      borderWidth: 0
    },
    legend: {
      itemStyle: {
        fontWeight: 'bold',
        fontSize: '13px'
      }
    },
    xAxis: {
      labels: {
        style: {
          color: '#6e6e70'
        }
      }
    },
    yAxis: {
      labels: {
        style: {
          color: '#6e6e70'
        }
      }
    },
    plotOptions: {
      series: {
        shadow: true
      },
      candlestick: {
        lineColor: '#404048'
      },
      map: {
        shadow: false
      }
    },
    navigator: {
      xAxis: {
        gridLineColor: '#D0D0D8'
      }
    },
    rangeSelector: {
      buttonTheme: {
        fill: 'white',
        stroke: '#C0C0C8',
        'stroke-width': 1,
        states: {
          select: {
            fill: '#D0D0D8'
          }
        }
      }
    },
    scrollbar: {
      trackBorderColor: '#C0C0C8'
    },
    background2: '#E0E0E8'
  };

  Highcharts.setOptions(Highcharts.theme);
  $('#containerGraficoTres').highcharts({
    chart: {
      type: 'pie'
    },
    title: {
      text: 'SELECCIÓN DE PERSONAL'
    },
    subtitle: {
      text: 'SECCIÓN III'
    },
    plotOptions: {
      series: {
        dataLabels: {
          enabled: true,
          format: '{point.name}: {point.y:.1f}%'
        }
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
    },
    credits: {
      enabled: false
    },
    series: [{
      name: "NIVEL ",
      colorByPoint: true,
      data: [{
        name: "COORDINADOR DE SEDE [<?php echo $cantidad_total['total_Coor_Sede'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Coor_Sede']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "COORDINADOR DE SEDE"
      }, {
        name: "COORDINADOR LÍDER DE LOCAL [<?php echo $cantidad_total['total_Coor_LiderLocal'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Coor_LiderLocal']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "COORDINADOR LÍDER DE LOCAL"
      }, {
        name: "SUPERVISOR [<?php echo $cantidad_total['total_SupervInfor'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_SupervInfor']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "SUPERVISOR"
      }, {
        name: "COORDINADOR DE LOCAL [<?php echo $cantidad_total['total_Coor_Local'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Coor_Local']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "COORDINADOR DE LOCAL"
      }, {
        name: "ASISTENTE COORDINADOR DE LOCAL [<?php echo $cantidad_total['total_Asist_CoordLocal'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Asist_CoordLocal']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "ASISTENTE COORDINADOR DE LOCAL"
      }, {
        name: "INFORMÁTICO DE LOCAL [<?php echo $cantidad_total['total_Informatico_Local'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Informatico_Local']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "INFORMÁTICO DE LOCAL"
      }, {
        name: "ASISTENTE INFORMÁTICO DE LOCAL [<?php echo $cantidad_total['total_Asist_InforLocal'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Asist_InforLocal']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "ASISTENTE INFORMÁTICO DE LOCAL"
      }, {
        name: "APLICADOR [<?php echo $cantidad_total['total_Aplicador'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Aplicador']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "APLICADOR"
      }, {
        name: "ORIENTADOR [<?php echo $cantidad_total['total_Orientador'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Orientador']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "ORIENTADOR"
      }, {
        name: "OPERADOR INFORMÁTICO [<?php echo $cantidad_total['total_Operador_Informatico'] ?>] ",
        y: <?php echo number_format(($cantidad_total['total_Operador_Informatico']/$suma_total_cantidad)*100,2) ?>,
        drilldown: "OPERADOR INFORMÁTICO"
      }]
    }],
    drilldown: {
      series: [{
        name: "COORDINADOR DE SEDE",
        id: "COORDINADOR DE SEDE",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Coor_Sede'].']' ?>",<?php echo number_format(($value['total_Coor_Sede']/$cantidad_total['total_Coor_Sede'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "COORDINADOR LÍDER DE LOCAL",
        id: "COORDINADOR LÍDER DE LOCAL",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Coor_Sede'].']'  ?>",<?php echo number_format(($value['total_Coor_LiderLocal']/$cantidad_total['total_Coor_LiderLocal'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "SUPERVISOR",
        id: "SUPERVISOR",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Coor_Sede'].']'  ?>",<?php echo number_format(($value['total_SupervInfor']/$cantidad_total['total_SupervInfor'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "COORDINADOR DE LOCAL",
        id: "COORDINADOR DE LOCAL",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Coor_Sede'].']'  ?>",<?php echo number_format(($value['total_Coor_Local']/$cantidad_total['total_Coor_Local'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "ASISTENTE COORDINADOR DE LOCAL",
        id: "ASISTENTE COORDINADOR DE LOCAL",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Asist_CoordLocal'].']'  ?>",<?php echo number_format(($value['total_Asist_CoordLocal']/$cantidad_total['total_Asist_CoordLocal'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "INFORMÁTICO DE LOCAL",
        id: "INFORMÁTICO DE LOCAL",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Informatico_Local'].']'  ?>",<?php echo number_format(($value['total_Informatico_Local']/$cantidad_total['total_Informatico_Local'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "ASISTENTE INFORMÁTICO DE LOCAL",
        id: "ASISTENTE INFORMÁTICO DE LOCAL",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Asist_InforLocal'].']'  ?>",<?php echo number_format(($value['total_Asist_InforLocal']/$cantidad_total['total_Asist_InforLocal'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "APLICADOR",
        id: "APLICADOR",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Aplicador'].']'  ?>",<?php echo number_format(($value['total_Aplicador']/$cantidad_total['total_Aplicador'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "ORIENTADOR",
        id: "ORIENTADOR",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Orientador'].']'  ?>",<?php echo number_format(($value['total_Orientador']/$cantidad_total['total_Orientador'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }, {
        name: "OPERADOR INFORMÁTICO",
        id: "OPERADOR INFORMÁTICO",
        data: [
          <?php foreach ($suma_total_cantidades_cargos as $value) : ?>
            ["<?php echo $value['Nombre_Sede'].'['.$value['total_Operador_Informatico'].']'  ?>",<?php echo number_format(($value['total_Operador_Informatico']/$cantidad_total['total_Operador_Informatico'])*100,2) ?>],
          <?php endforeach; ?>
        ]
      }]
    }
  });
</script>