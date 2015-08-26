<div class="titulo text-center">SEDES - IMPRESORA MULTIFUNCIONAL(NO)</div>
<div class="cuerpo" style="width: 500px">
    <div class="col-md-12 no-padding">
    <?php foreach ($sedes_modal as $val) :?>
        <label class="text-red col-md-6 col-xs-12"><i class="fa fa-print text-black"></i> <?php echo $val['Nombre_Sede'] ?></label>
    <?php endforeach; ?>
    </div>
</div>

