<div class="titulo text-center">SEDES - PC's 4 O MÁS</div>
<div class="cuerpo" style="width: 500px">
    <p class="text-center">Sedes que cuentan con 4 PC's o más</p>
    <div class="col-md-12 no-padding">
        <?php
        foreach ($sedes_modal_tres as $val) {?>
            <label class="text-green col-md-6 col-xs-12"><i class="fa fa-desktop text-black"></i> <?php echo $val['Nombre_Sede'] ?></label>
        <?php } ?>
    </div>

</div>

