<div id="sf_admin_container">
  <div id="message_preview">
    <div class="gmail">
      <?php echo $message->getRaw('body') ?>
    </div>
  </div>
  <ul class="sf_admin_actions">
    <?php echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  </ul>
</div>



