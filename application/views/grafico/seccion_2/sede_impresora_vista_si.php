<div class="titulo text-center">SEDES - IMPRESORA MULTIFUNCIONAL(SI)</div>
<div class="cuerpo" style="width: 600px">
    <div class="col-md-12 no-padding">
    <?php foreach ($sedes_modal as $val) : ?>
        <label class="text-green col-md-4 col-xs-12"><i class="fa fa-print text-black"></i> <?php echo $val['Nombre_Sede'] ?></label>
        <?php endforeach; ?>
    </div>
</div>

