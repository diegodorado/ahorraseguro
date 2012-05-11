<?php slot('body_class','two_columns') ?>
<?php slot('right_column') ?>
  <div class="content">
    <h4>Nam pretium, sapien ut adipiscing vehicula</h4>
    <p>
    Nam pretium, sapien ut adipiscing vehicula, purus risus tempus nibh, in sodales velit lectus ut justo. In vulputate fermentum molestie.
    </p>
    <h4>Aenean odio enim, semper bibendum convallis</h4>
    <p>
    Aenean odio enim, semper bibendum convallis vitae, ullamcorper sed dui. Morbi bibendum, nulla sed pretium condimentum.
    </p>
    <h4>Donec pretium arcu id sapien vehicula facilisis</h4>
    <p>
    Donec pretium arcu id sapien vehicula facilisis. Cum sociis natoque penatibus et magnis dis parturient montes.
    </p>
  </div>
<?php end_slot() ?>

<div class="content">
  <h1>Contacto</h1>
  <p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent semper nunc quis elit condimentum ac vulputate metus ornare. Donec vitae purus lorem.
  </p>

  <form class="simple" action="<?=url_for('@contact_us') ?>" method="post">
    <?=$form?>
    <div class="form-row botones">
      <input value="Enviar" name="enviar" class="submit" type="submit">
    </div>
  </form>
</div>
