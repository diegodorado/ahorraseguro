<ul class="submenu" style="display:none">
  <?php foreach($categories as $category):?>
    <li><?=link_to($category->getName(),'promociones_category',$category)?></li>
  <?php endforeach ?>
</ul>
