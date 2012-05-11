<?php slot('body_class','single_column user') ?>
<div class="content">

  <ul class="profile_submenu">
    <li><?=link_to('Mis Cupones','@user_deals', array('class'=>'active'))?></li>  
    <li><?=link_to('Mis Datos','@user_account')?></li>  
    <li><?=link_to('Cambiar Contraseña','@user_change_password')?></li>  
  </ul>

  <h1>Mis Datos</h1>

</div>
