<div id="header">
 	<h1 class="logo"><?=link_to(image_tag('logo.png', array('alt'=>'Ahorra Seguro')),'@homepage')?></h1>
  <ul class="menu">
    <li><?=link_to('OFERTONES','@deals')?></li>
    <li>
      <?=link_to('OFERTAS','@descuentos_category_list')?>
      <?php include_component('deals', 'descuentosCategoryList') ?>
    </li>
    <li>
      <?=link_to('YAPA','@promociones_category_list')?>
      <?php include_component('deals', 'promocionesCategoryList') ?>
    </li>
    <li><?=link_to('RECIENTES','@closed_deals')?></li>
    <li><?=link_to('¿COMO FUNCIONA?','@how_it_works')?></li>
  </ul>
  <?php include_component('users', 'menu') ?>
</div>

