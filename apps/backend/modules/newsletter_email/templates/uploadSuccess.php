<div id="sf_admin_container">
  <?php include_partial('newsletter_email/flashes') ?>

  <h1>Subir Archivo de Mails</h1>
  <div id="sf_admin_content">
    <div class="sf_admin_form">
      <form method="post" enctype="multipart/form-data">
        <fieldset>
          <div class="sf_admin_form_row">
            <label>Archivo</label>
            <div class="content">
              <input type="file" name="list">
            </div>
          </div>
        </fieldset>
        <ul class="sf_admin_actions">
          <li class="sf_admin_action_list"><?=link_to('Volver al Listado','@newsletter_email') ?></li>
          <li><input type="submit" value="Subir"></li>  
        </ul>
      </form>
    </div>
    <br />
    <div class="mails">
      <?php if(isset($mails)):?>
        <table>
          <thead>
            <tr>
              <th>Mails Cargados</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mails as $mail):?>
              <tr>
                <td><?=$mail->getEmail();?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      <?endif?>    
    </div>
    
  </div>
</div>
