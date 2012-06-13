<?php slot('body_class','two_columns') ?>
<?php slot('right_column') ?>
  <div class="content">
   	<?=image_tag('banners/contact.jpg')?>
  </div>
<?php end_slot() ?>

<div class="content">
  <h1>Contacto</h1>
  <p>
      Hacenos llegar tus sugerencias y comentarios. te contestaremos a la brevedad.    
  </p>

  <form class="simple" action="<?=url_for('@contact_us') ?>" method="post">
    <?=$form?>
    <div class="form-row botones">
      <input value="Enviar" name="enviar" class="submit" type="submit">
    </div>
  </form>
</div>
