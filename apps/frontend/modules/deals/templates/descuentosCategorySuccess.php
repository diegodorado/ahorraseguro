<?php slot('body_class','three_columns') ?>
<?php slot('left_column')?>
  <?include_partial('global/banner1')?>
  <?php include_component('deals', 'randomLeftDeals') ?>
  <?include_partial('global/banner2')?>
<?php end_slot() ?>
<?php slot('right_column')?>
  <?php include_component('deals', 'randomRightDeals') ?>
  <?include_partial('global/asegurado')?>
  <?include_partial('global/empresas')?>
  <?include_partial('global/fb_fanpage')?>
  <?include_partial('global/banner3')?>
<?php end_slot() ?>
<div class="content">
  <h1>Descuentos en <?=$category->getName()?></h1>
  <?php if (count($deals)==0):?>
    <p>Hoy no hay descuentos en <?=$category->getName()?></p>
    <p>Intenta en otra categoría, o aprovecha los <?=link_to('ofertones de hoy','@homepage')?>!</p>
  <?php else:?>
    <?php foreach($deals as $deal):?>
      <?include_partial('deals/deal',array('deal'=>$deal));?>
    <?php endforeach ?>
  <?php endif?>
</div>	
