<!-- <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script> -->
<section class="content-header"></section>
<section class="content">
  <div class="row">
    <section class="col-md-12">

      <div class="col-md-6 ">
        <div class="box box-solid">
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/1'); ?>" rel="facebox" id="grafico_requisitos_si"></a></p>
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/2'); ?>" rel="facebox" id="grafico_requisitos_no"></a></p>
          <div class="chart" id="requisitos_minimos" style="height: 300px; position: relative;"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-solid">
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/3'); ?>" rel="facebox" id="grafico_cantidad_pc_1"></a></p>
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/4'); ?>" rel="facebox" id="grafico_cantidad_pc_2"></a></p>
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/5'); ?>" rel="facebox" id="grafico_cantidad_pc_3"></a></p>
          <div class="chart" id="sedes_cantidad_pc" style="height: 300px; position: relative;"></div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-solid">
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/6'); ?>" rel="facebox" id="grafico_internet_si"></a></p>
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/7'); ?>" rel="facebox" id="grafico_internet_no"></a></p>
          <div class="chart" id="sede_internet" style="height: 300px; position: relative;"></div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-solid">
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/8'); ?>" rel="facebox" id="grafico_impresora_si"></a></p>
          <p class="text-center display-none"><a href="<?php echo base_url('grafico-listado-sedes/9'); ?>" rel="facebox" id="grafico_impresora_no"></a></p>
          <div class="chart" id="sede_impresora" style="height: 300px; position: relative;"></div>
        </div>
      </div>

    </section>
  </div>
</section>
<script type="text/javascript">
  $(function(){
    $('a[rel*=facebox]').facebox();
    $('#facebox').draggable({handle: 'div.titulo'});
  });
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
  $('#requisitos_minimos').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: '% Sedes que cumplen con los requisitos mínimos'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    credits: {
      enabled: false
    },
    series: [{
      name: "Porcentaje",
      colorByPoint: true,
      data: [
        {
          name: 'NO [<?php echo (35-$seccion_dos_indicador_uno["cantidad"]) ?>]',
          y: <?php echo (100-$seccion_dos_indicador_uno['porc']) ?>,
          color:'#c0392b',
          events: {
            click: function (event) {
              setTimeout(function () {
                $('#grafico_requisitos_no').click();
              }, 500);
            }
          }
        },
        {
          name: 'SÍ [<?php echo $seccion_dos_indicador_uno["cantidad"] ?>]',
          y: <?php echo $seccion_dos_indicador_uno['porc'] ?>,
          color:'#2cc36b',
          sliced: true,
          selected: true,
          events: {
            click: function (event) {
              $('#grafico_requisitos_si').click();
            }
          }
        }
      ]
    }]
  });
//Sedes con internet
  $('#sedes_cantidad_pc').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: '% Sedes que cuentan con PC\'s'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    credits: {
        enabled: false
    },
    series: [{
      name: "Porcentaje",
      colorByPoint: true,
      data: [
        {
          name: 'Con 2PC\' o menos [<?php echo $seccion_dos_indicador_dos["cantidad"] ?>] ',
          y: <?php echo $seccion_dos_indicador_dos['porc'] ?>,
          color:'#2d8bc9',
          events: {
            click: function (event) {
              $('#grafico_cantidad_pc_1').click();
            }
          }
        },
        {
          name: 'con 3PC\'s [<?php echo $seccion_dos_indicador_tres["cantidad"] ?>] ',
          y: <?php echo $seccion_dos_indicador_tres['porc'] ?>,
          color:'#7f8c8d',
          sliced: true,
          selected: true,
          events: {
            click: function (event) {
              $('#grafico_cantidad_pc_2').click();
            }
          }
        },
        {
          name: 'Con 4PC\'s o más [<?php echo $seccion_dos_indicador_cuatro["cantidad"] ?>] ',
          y: <?php echo $seccion_dos_indicador_cuatro['porc'] ?>,
          color:'#8e44ad',
          events: {
            click: function (event) {
              $('#grafico_cantidad_pc_3').click();
            }
          }
        }
      ]
    }]
  });

  //Sedes con internet
  $('#sede_internet').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: '% Sedes que cuentan con señal de internet'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    credits: {
        enabled: false
    },
    series: [{
      name: "Porcentaje",
      colorByPoint: true,
      data: [
        {
          name: 'NO [<?php echo (35-$seccion_dos_indicador_cinco["cantidad"]) ?>]',
          y: <?php echo (100-$seccion_dos_indicador_cinco['porc']) ?>,
          color:'#c0392b',
          events: {
            click: function (event) {
              $('#grafico_internet_no').click();
            }
          }
        },
        {
          name: 'SÍ [<?php echo $seccion_dos_indicador_cinco["cantidad"] ?>]',
          y: <?php echo $seccion_dos_indicador_cinco['porc'] ?>,
          color:'#2cc36b',
          sliced: true,
          selected: true,
          events: {
            click: function (event) {
              $('#grafico_internet_si').click();
            }
          }
        }
      ]
    }]
  });

  //Sedes con impresoras
  $('#sede_impresora').highcharts({
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: 'pie'
    },
    title: {
      text: '% Sedes que cuentan con impresora multifuncional'
    },
    tooltip: {
      pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          }
        }
      }
    },
    credits: {
        enabled: false
    },
    series: [{
      name: "Porcentaje",
      colorByPoint: true,
      data: [
        {
          name: 'NO [<?php echo (35-$seccion_dos_indicador_seis["cantidad"]) ?>]',
          y: <?php echo (100-$seccion_dos_indicador_seis['porc']) ?>,
          color:'#c0392b',
          events: {
            click: function (event) {
              $('#grafico_impresora_no').click();
            }
          }
        },
        {
          name: 'SÍ [<?php echo $seccion_dos_indicador_seis["cantidad"] ?>]',
          y: <?php echo $seccion_dos_indicador_seis['porc'] ?>,
          color:'#2cc36b',
          sliced: true,
          selected: true,
          events: {
            click: function (event) {
              $('#grafico_impresora_si').click();
            }
          }
        }
      ]
    }]
  });
</script>