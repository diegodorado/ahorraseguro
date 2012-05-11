<div id="sf_admin_container">
  <div id="message_status">
    <p>
      Enviando <strong><?=$message->recipients_count ?></strong> mensajes
      en bloques de <strong><?=$message->limit_i ?></strong> mensajes por iteración.
    </p>
    <p>
      Hasta el momento <strong><?=$message->sent_count ?></strong> mensajes enviados.
    </p>

    <div class="progress_bar_wrapper">
      <span class="percent"><?=$message->getProgress()?>%</span>
      <div class="progress_bar" style="width:<?=$message->getProgress()?>%;">
      </div>
    </div>
    <br/>
    <p>
      Esta página se actualizará automaticamente cada <strong>1</strong> minuto.
    </p>
    <p>
      Tiempo restante estimado: <strong><?=$message->getElapsedTime()?></strong> minutos.
    </p>
    

  </div>
  <ul class="sf_admin_actions">
    <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  </ul>
</div>

<script type="text/javascript">
  setTimeout("window.location.reload()",60*1000);
</script>
