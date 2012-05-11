<?php slot('body_class','two_columns user') ?>
<?php slot('right_column')?>
  <div class="content">
    <a class="user_big_link" href="<?=url_for('sf_guard_signin')?>"> 
      <span class='title'>Ya estás registrado?</span> 
      <br/>
      <span class='subtitle'>Ingresa con tu usuario y contraseña</span> 
    </a>
  </div>
<?php end_slot() ?>
<div class="content">
  <h1>Registro</h1>
  
  <form method="POST" class="simple">
    <?php echo $form ?>
    <div class="form-row botones">
      <input value="Crear mi Cuenta" name="enviar" class="submit" type="submit">
    </div>    
  </form>
  
</div>
