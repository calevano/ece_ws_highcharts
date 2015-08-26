<div class="titulo text-center">SEDES - PC's 2 A MENOS</div>
<div class="cuerpo" style="width: 500px">
    <p class="text-center">Sedes que cuentan con 2 PC's o menos</p>
    <div class="col-md-12 no-padding">
        <?php
        foreach ($sedes_modal_uno as $val) {?>
            <label class="text-green col-md-6  col-xs-12"><i class="fa fa-desktop text-black"></i> <?php echo $val['Nombre_Sede'] ?></label>
        <?php } ?>
    </div>
</div>

