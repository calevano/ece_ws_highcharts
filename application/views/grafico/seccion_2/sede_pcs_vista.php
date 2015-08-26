<div class="titulo text-center">SEDES - PC's</div>
<div class="cuerpo" style="width: 800px">
    <h6 class="text-center"><span class="text-green">Texto VERDE: SI CUMPLEN</span></h6>
    <div class="col-sm-4">
        <p class="text-center">Sedes que cuentan con 2 PC's o menos</p>
        <ol>
            <?php
            foreach ($sedes_modal_uno as $val) {?>
                <li class="text-green"><?php echo $val['Nombre_Sede'] ?></li>
            <?php } ?>
        </ol>

    </div>
    <div class="col-sm-4">
        <p class="text-center">Sedes que cuentan con 3 PC's</p>
        <ol>
            <?php
            foreach ($sedes_modal_dos as $val) {?>
                <li class="text-green"><?php echo $val['Nombre_Sede'] ?></li>
            <?php } ?>
        </ol>
    </div>
    <div class="col-sm-4">
        <p class="text-center">Sedes que cuentan con 4 PC's o más</p>
        <ol>
            <?php
            foreach ($sedes_modal_tres as $val) {?>
                <li class="text-green"><?php echo $val['Nombre_Sede'] ?></li>
            <?php } ?>
        </ol>
    </div>

</div>

