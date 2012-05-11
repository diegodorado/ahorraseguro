<div class="deal_show_right" >
  <div class="image">
    <?=image_tag($deal->getThumb('b'))?>
  </div>

  <div class="text" >
    <div class="featured" >
      <h3>Destacados</h3>
      <?=auto_link_text($deal->getRaw('featured'))?>
    </div>
    <div class="conditions" >
      <h3>Condiciones</h3>
      <?=auto_link_text($deal->getRaw('conditions'))?>
    </div>
  </div>
  
</div>
