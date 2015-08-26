
<div class="titulo text-center">SEDES - REQUISITOS MÍNIMOS</div>
<div class="cuerpo" style="width: 800px">
    <!-- <h4 class="text-center">Sedes que cumplen con los requisitos mínimos</h4> -->
    <h6 class="text-center"><span class="text-red">ROJO: NO CUMPLEN</span>  - <span class="text-green">VERDE: SI CUMPLEN</span></h6>

        <div class="col-md-12">
            <?php foreach ($sedes as $sede) { ?>
            <div class="col-xs-4">
              <div class="box verificape <?php
                    foreach ($sedes_modal as $val) {
                        echo ($val['Cod_Sede'] === $sede['Cod_Sede']) ? "box-success" : "";
                    }
                    ?> box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title" style="font-size:10px"><?php echo $sede['Nombre_Sede'] ?></h3>
                  <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body font-size-9">
                  <?php foreach ($sedes_modal_verifica as $verifica) {
                    if($verifica['Cod_Sede']===$sede['Cod_Sede']){ ?>
                      <?php echo ($verifica['A2_2_1_SINO']!=1)? "<p>Sede exclusivo: NO </p>" : " " ; ?>
                      <?php echo ($verifica['A2_2_2_TOTAL']<3)? "<p>Ambiente totales: {$verifica['A2_2_2_TOTAL']}</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_4_SINO']!=1)? "<p>Espacio de Sede adecuado: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_5_SINO']!=1)? "<p>Servicios basicos: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_6_SINO']!=1)? "<p>Mobiliario personal: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_7_SINO']!=1)? "<p>PC's exclusivo: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_8_TOTAL']<2)? "<p>PC's estado: {$verifica['A2_2_8_TOTAL']}</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_9_SINO']!=1)? "<p>Señal de internet: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_11_SINO']!=1)? "<p>Impresora multifuncional operativa: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_12_SINO']!=1)? "<p>Impresa de la sede: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_13_SINO']!=1)? "<p>Teléfono, celular sede: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_14_SINO']!=1)? "<p>Diagramas operativos: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_15_SINO']!=1)? "<p>Croquis, ubicación personal: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_16_SINO']!=1)? "<p>Ambiente privado y seguro: NO</p>" : " "; ?>
                      <?php echo ($verifica['A2_2_17_SINO']!=1)? "<p>Local cumple TDR: NO</p>" : " "; ?>
                    <?php } } ?>
                </div>
              </div>
            </div>
            <?php } ?>
        </div>

    <!-- <ol>
        <?php #foreach ($sedes as $sede) { ?>
            <li class="
                <?php
                #foreach ($sedes_modal as $val) {
                    #echo ($val['Cod_Sede'] === $sede['Cod_Sede']) ? " text-green " : "text-red ";
                #}
                ?>
                ">
                    <?php #echo $sede['Nombre_Sede'] ?>
            </li>
        <?php #} ?>
    </ol> -->

</div>
<script src="<?php echo base_url('assets/js/app.min.js') ?>"></script>
<script>
    $(function(){
        $(".verificape.box-success").each(function(){

                var box = $(this).find(".box-tools").first();
                box.html("<i class='fa fa-check fa-2x'></i>");

        });

    });

</script>

