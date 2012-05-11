<?php slot('body_class','two_columns user') ?>
<?php slot('right_column')?>
  <div class="content">
    <a class="user_big_link" href="<?=url_for('user_signup')?>"> 
      <span class='title'>No tienes cuenta?</span> 
      <br/>
      <span class='subtitle'>No hay problema!</span> 
      <br/>
      <span class='subtitle'>Registra tu cuenta en un solo paso</span> 
    </a>
  </div>
<?php end_slot() ?>
<div class="content">
  <h1>Ingresar</h1>

  <form class="simple" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <?php echo $form ?>
    <div class="form-row botones">
      <input value="Ingresar" class="submit" type="submit">
    </div>    
  </form>

</div>
