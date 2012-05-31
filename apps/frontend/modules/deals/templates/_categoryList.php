<ul class="submenu" style="display:none">
  <?php foreach($categories as $category): ?>
    <li>
      <?=link_to($category['name'],'deals_by_category',array(
          'category_id'=>$category['id'],
          'yapa'=> ($has_yapa ? 'con-yapa' : false)
        ))?>
      <ul class="submenu" style="display:none">
        <?php foreach($category['quarters'] as $quarter): ?>
          <li>
            <?=link_to('en '.$quarter['name'],'deals_by_category_and_quarter',array(
                'category_id'=>$category['id'],
                'quarter_id'=>$quarter['id'],
                'yapa'=> ($has_yapa ? 'con-yapa' : false)
              ))?>
          </li>
        <?php endforeach ?>
      </ul>      
    </li>
  <?php endforeach ?>
</ul>
