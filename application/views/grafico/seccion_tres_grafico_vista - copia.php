<pre>
  <?php print_r($indicador_nivel_1); ?>
</pre>
<!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->
<section class="content-header"></section>
<section class="content">
   <div class="row">
      <div class="col-md-12 col-sm-12">
         <div class="box noBox">
            <div class="box-body ">
               <div id="containerGraficoTres" style="width: 100%; height: 1100px; margin: 0 auto"></div>
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

  var colors = Highcharts.getOptions().colors,
    categories = ['NIVEL-I', 'NIVEL-II', 'NIVEL-III'],
    data = [
      {
        y: 56.33,
        color: colors[0],
        drilldown: {
          name: 'NIVEL-I cantidad',
          //categories: ['NIVEL-I 6.0', 'NIVEL-I 7.0', 'NIVEL-I 8.0', 'NIVEL-I 9.0', 'NIVEL-I 10.0', 'NIVEL-I 11.0'],
          categories: [<?php foreach ($indicador_nivel_1 as $value) {?>
            <?php echo "'{$value['Nombre_Sede']}'" ?>,
          <?php } ?>],
          // data: [<?php foreach ($indicador_nivel_1 as $value) {?>
          //   <?php echo "{$value['Coor_Sede_PEA_Programada']}" ?>,
          // <?php } ?>],
          data: [1.06, 0.5, 17.2, 8.11, 5.33, 24.13],
          color: colors[0]
        }
      },
      {
        y: 10.38,
        color: colors[1],
        drilldown: {
          name: 'NIVEL-II versions',
          categories: ['NIVEL-II v31', 'NIVEL-II v32', 'NIVEL-II v33', 'NIVEL-II v35', 'NIVEL-II v36', 'NIVEL-II v37', 'NIVEL-II v38'],
          data: [0.33, 0.15, 0.22, 1.27, 2.76, 2.32, 2.31, 1.02],
          color: colors[1]
        }
      },
      {
        y: 24.03,
        color: colors[2],
        drilldown: {
          name: 'NIVEL-III versions',
          categories: [
            'NIVEL-III v30.0', 'NIVEL-III v31.0', 'NIVEL-III v32.0', 'NIVEL-III v33.0', 'NIVEL-III v34.0',
              'NIVEL-III v35.0', 'NIVEL-III v36.0', 'NIVEL-III v37.0', 'NIVEL-III v38.0', 'NIVEL-III v39.0', 'NIVEL-III v40.0', 'NIVEL-III v41.0', 'NIVEL-III v42.0', 'NIVEL-III v43.0'
          ],
          data: [0.14, 1.24, 0.55, 0.19, 0.14, 0.85, 2.53, 0.38, 0.6, 2.96, 5, 4.32, 3.68, 1.45],
          color: colors[2]
        }
      }
    ],
    browserData = [],
    versionsData = [],
    i,
    j,
    dataLen = data.length,
    drillDataLen,
    brightness;


  // Build the data arrays
  for (i = 0; i < dataLen; i += 1) {

      // add browser data
      browserData.push({
          name: categories[i],
          y: data[i].y,
          color: data[i].color
      });

      // add version data
      drillDataLen = data[i].drilldown.data.length;
      for (j = 0; j < drillDataLen; j += 1) {
          brightness = 0.2 - (j / drillDataLen) / 5;
          versionsData.push({
              name: data[i].drilldown.categories[j],
              y: data[i].drilldown.data[j],
              color: Highcharts.Color(data[i].color).brighten(brightness).get()
          });
      }
  }

  $('#containerGraficoTres').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Browser market share, January, 2015 to May, 2015'
        },
        subtitle: {
            text: 'Source: <a href="http://netmarketshare.com/">netmarketshare.com</a>'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: '%'
        },
        credits: {
          enabled: false
        },
        series: [{
            name: 'Porcentaje',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: 'white',
                distance: -30
            }
        }, {
            name: 'Cantidad',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
                formatter: function () {
                    // display only if larger than 1
                    return this.y > 1 ? '<b>' + this.point.name + ':</b> ' + this.y + '%' : null;
                }
            }
        }]
    });
</script>