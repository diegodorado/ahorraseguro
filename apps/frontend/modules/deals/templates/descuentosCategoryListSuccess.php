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
  <h1>Descuentos por Categoría</h1>
  <ul class="category_list">
    <?php foreach($categories as $category):?>
      <li><?=link_to($category->getName(),'descuentos_category',$category)?></li>
    <?php endforeach ?>
  </ul>
</div>	

