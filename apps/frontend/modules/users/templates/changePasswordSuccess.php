<?php slot('body_class','single_column user') ?>
<div class="content">

  <ul class="profile_submenu">
    <li><?=link_to('Mis Cupones','@user_deals')?></li>  
    <li><?=link_to('Mis Ahorros','@user_savings')?></li>  
    <li><?=link_to('Mis Datos','@user_edit_account')?></li>  
    <li><?=link_to('Cambiar Contraseña','@user_change_password', array('class'=>'active'))?></li>  
  </ul>

  <h1>Cambiar Contraseña</h1>
  <form method="POST" class="simple">
    <?php echo $form ?>
    <div class="form-row botones">
      <input value="Actualizar" name="enviar" class="submit" type="submit">
    </div>    
  </form>
</div>
