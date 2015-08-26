<div class="titulo text-center">SEDES - REQUISITOS MÍNIMOS(NO)</div>
<div class="cuerpo" style="width: 950px">
    <h4 class="text-center">Celda color <span class="bg-red">Rojo</span> significa que no cumple con los requisitos</h4>
    <div class="col-md-12">

        <div class="row">
            <div class="col-xs-12">
                <div class="box noBox">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped table-bordered">
                            <thead class="requisitos-sede-thead">
                                <tr>
                                    <th>¿Sede exclusivo?</th>
                                    <th>Ambiente totales</th>
                                    <th>¿Espacio de Sede adecuado?</th>
                                    <th>¿Servicios basicos?</th>
                                    <th>¿Mobiliario personal?</th>
                                    <th>¿PC's exclusivo?</th>
                                    <th>PC's estado - Total</th>
                                    <th>¿Señal de internet?</th>
                                    <th>¿Impresora multifuncional operativa?</th>
                                    <th>¿Impresa de la sede?</th>
                                    <th>¿Teléfono, celular sede?</th>
                                    <th>¿Diagramas operativos?</th>
                                    <th>¿Croquis, ubicación personal?</th>
                                    <th>¿Ambiente privado y seguro?</th>
                                    <th>¿Local cumple TDR?</th>
                                </tr>
                            </thead>
                            <tbody class="requisitos-sede-no ">
                                <?php foreach ($sedes as $sede) :
                                    foreach ($sedes_modal_verifica as $verifica) :
                                        if($verifica['Cod_Sede']===$sede['Cod_Sede']) : ?>
                                        <tr class="bg-plomo">
                                            <td><?php echo ($verifica['A2_2_1_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " " ; ?></td>
                                            <td><?php echo ($verifica['A2_2_2_TOTAL']<3)? "<p>{$verifica['Nombre_Sede']} : {$verifica['A2_2_2_TOTAL']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_4_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_5_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_6_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_7_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_8_TOTAL']<2)? "<p>{$verifica['Nombre_Sede']} : {$verifica['A2_2_8_TOTAL']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_9_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_11_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_12_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_13_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_14_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_15_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_16_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                            <td><?php echo ($verifica['A2_2_17_SINO']!=1)? "<p>{$verifica['Nombre_Sede']}</p>" : " "; ?></td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

    </div>
</div>
<script src="<?php echo base_url('assets/js/app.min.js') ?>"></script>
<script>
    $(function(){

        $(".verificape_success.box-success").each(function(){
            var box = $(this).parent('.caja-sedes').first();
            box.remove();

        });
    });
</script>