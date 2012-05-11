<?php slot('body_class','single_column user') ?>
<div class="content">

  <ul class="profile_submenu">
    <li><?=link_to('Mis Cupones','@user_deals')?></li>  
    <li><?=link_to('Mis Ahorros','@user_savings', array('class'=>'active'))?></li>  
    <li><?=link_to('Mis Datos','@user_edit_account')?></li>  
    <li><?=link_to('Cambiar Contraseña','@user_change_password')?></li>  
  </ul>

  <h1>Mis Ahorros</h1>
  <table class="savings">
    <?foreach($data as $d):?>
	    <tr class="<?=$d['class']?>">
        <td class="label"><?=$d['title']?></td>
		    <td class="value"><?=$d['value']?></td>
	    </tr>
    <?endforeach?>
  </table>
</div>
