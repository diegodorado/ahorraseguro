<div id="header">
 	<h1 class="logo"><?=link_to(image_tag('logo.png', array('alt'=>'Ahorra Seguro')),'@homepage')?></h1>
  <ul class="menu">
    <li><?=link_to('OFERTONES','@big_deals')?></li>
    <li>
      <?=link_to('OFERTAS','@deals')?>
      <?php include_component('deals', 'categoryList', array('has_yapa' => false)) ?>
    </li>
    <li>
      <?=link_to('YAPA','@yapa_deals')?>
      <?php include_component('deals', 'categoryList', array('has_yapa' => true)) ?>
    </li>
    <li><?=link_to('RECIENTES','@closed_deals')?></li>
    <li><?=link_to('¿COMO FUNCIONA?','@how_it_works')?></li>
  </ul>
  <?php include_component('users', 'menu') ?>
</div>

