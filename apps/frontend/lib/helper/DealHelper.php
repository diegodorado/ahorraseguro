<?php

function printed_count_text($deal){
  $value= $deal->getPrintedCount();
  if($value==0){return 'Sé el primero en beneficiarte!';}
  elseif($value==1){return '<strong>1</strong> persona ya se benefició!';}
  else{return sprintf('<strong>%s</strong> personas ya se beneficiarion!',$value);}
}

function bought_count_text($deal){
  $value= $deal->getBoughtCount();
  $type = ($deal->getIsOferton())?'ofertón':'descuento';
  if($value==0 && !$deal->isOpen()){return 'No pierdas otra oportunidad!';}
  elseif($value==0){return sprintf('Este %s está activo',$type);}
  elseif($value==1){return '<strong>1</strong> persona ya compró!';}
  else{return sprintf('<strong>%s</strong> personas ya compraron!',$value);}
}

function user_stats_text($deals_count,$saved_total){
  if($deals_count==0){return 'Registrate y comienza a ahorrar dinero!';}
  elseif($deals_count==1){return sprintf('<strong>%s</strong> oferta de compra<br/>Total de dinero ahorrado <strong>$%s</strong>',$deals_count,$saved_total);}
  else{return sprintf('<strong>%s</strong> ofertas de compra<br/>Total de dinero ahorrado <strong>$%s</strong>',$deals_count,$saved_total);}
}

function addthis_toolbox($deal){
  $url = url_for('deal',$deal, true);
  use_javascript('http://s7.addthis.com/js/250/addthis_widget.js');
  return <<<EOF
  <div class="addthis_toolbox addthis_default_style addthis_32x32_style"
    addthis:url="{$url}"
    addthis:title="{$deal->getTitle()}"
    addthis:description="{$deal->getDescription()}">
    <span class="title">Compartir</span>
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
  </div>
EOF;

}


function page_js()
{
    $name = 'page_js';
    $content = '';
    if (has_slot($name)) $content = get_slot($name);
 
    // regardless, begin capturing the slot
    slot($name);
 
    // echo either a blank string, or the previous value of the slot with the same name
    echo $content;
}
 
function end_page_js()
{
    // simply end the current slot
    end_slot();
}
