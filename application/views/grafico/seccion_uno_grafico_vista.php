<!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
<section class="content-header"></section>
<section class="content">
   <div class="row">
      <div class="col-md-12 col-sm-12">
         <div class="box noBox">
            <div class="box-body ">
               <div id="containerGrafico" style="width: 100%; height: 1100px; margin: 0 auto"></div>
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
  $('#containerGrafico').highcharts({
    chart: {
    type: 'bar'
    },
    title: {
      text: 'ACTIVIDADES DE PRESENTACIÓN Y COORDINACIÓN'
    },
    subtitle: {
      text: 'SECCIÓN I '
    },
    xAxis: {
      categories: [
        <?php foreach ($indicador_grafico_uno as $value) {?>
          '<?php echo $value["Nombre_Sede"] ?>',
        <?php } ?>
      ],
      title: {
        text: null
      }
    },
    yAxis: {
      min: 0,
      title: {
        text: '1.1 REUNIÓN DE COORDINACIÓN CON LA RA DE LA SEDE DEPARTAMENTAL.',
      },
      labels: {
        overflow: 'justify'
      }
    },
    tooltip: {
      valueSuffix: ' '
    },
    plotOptions: {
      bar: {
        dataLabels: {
          enabled: true
        }
      }
    },
    credits: {
        enabled: false
    },
    series: [
      {
        name: 'Respuesta VACIA ',
        data: [
          <?php foreach ($indicador_grafico_uno as $value) {?>
            [<?php echo ($value['A1_1_1_SINO']==NULL)? "0" : "" ; ?>],
          <?php } ?>
        ]
      },
      {
        name: 'Respuesta SI ',
        data: [
          <?php foreach ($indicador_grafico_uno as $value) {?>
            [<?php echo ($value['A1_1_1_SINO']==1)? "1" : "" ; ?>],
          <?php } ?>
        ]
      },
      {
        name: 'Respuesta NO ',
        data: [
          <?php foreach ($indicador_grafico_uno as $value) {?>
            [<?php echo ($value['A1_1_1_SINO']==2)? "2" : "" ; ?>],
          <?php } ?>
        ]
      }
    ]
  });
</script>