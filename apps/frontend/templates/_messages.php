<div id="messages">
  <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="message notice"><?php echo $sf_user->getFlash('notice') ?></div>
  <?php endif ?>
  <?php if ($sf_user->hasFlash('error')): ?>
    <div class="message error"><?php echo $sf_user->getFlash('error') ?></div>
  <?php endif ?>
</div>
