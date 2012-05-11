<?php slot('body_class','single_column user') ?>
<div class="content">

  <ul class="profile_submenu">
    <li><?=link_to('Mis Cupones','@user_deals', array('class'=>'active'))?></li>  
    <li><?=link_to('Mis Ahorros','@user_savings')?></li>  
    <li><?=link_to('Mis Datos','@user_edit_account')?></li>  
    <li><?=link_to('Cambiar Contraseña','@user_change_password')?></li>  
  </ul>

  <h1>Mis Cupones</h1>
  <ul class="user_deals">
  <?php foreach($payments as $payment):?>
    <?$deal = $payment->getDeal();?>
    <li>
      <h3><?=link_to($deal->getTitle(),'deal',$deal)?>&nbsp;&nbsp;&nbsp;<span class="when">comprado el <?=$payment->getDateTimeObject('updated_at')->format('d/m/Y \a \l\a\s H:i \h\s')?> </<span></h3>
      <?=image_tag($deal->getThumb('s'))?>
      <div class="code_box">
        Código de referencia: <br/>
        <span class="code"><?=$payment->getCode()?></span>
      </div>
      <div class="deal_buy_box">
        <div class="bought">
          <span class="quantity"><?=$payment->getQuantity()?></span>
          <span class="operator">x</span>
          <span class="price">$<?=$payment->getPrice()?></span>
          <span class="operator">=</span>
          <span class="total_price">$<?=$payment->getPrice()*$payment->getQuantity()?></span>
        </div>
        <div class="deal_value">
          <table>
            <thead>
              <tr>
                <th>Valor</th>
                <th>Descuento</th>
                <th>Ahorro</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>$<?=$payment->getRealValue()*$payment->getQuantity()?></td>
                <td><?=$payment->getOffer()?>%</td>
                <td>$<?=$payment->getSaved()*$payment->getQuantity()?></td>
              </tr>
            </tbody>
          </table>
        </div>        
      </div>
      <a class="print_box" href="#"> 
        <span class='title'>Imprimir</span> 
        <span class='subtitle'>haz click aquí</span>
      </a>
      <div class="info">
        Podes imprimirlo con tu programa de correo, desde aquí (haciendo click en imprimir) o mostrarlo al comercio desde tu celular. El comerciante ya tiene con tu nombre y tu número de código para esta compra que podes utilizar una sola vez.
      </div>
    </li>    
  <?php endforeach ?>
  </ul>
</div>

<?page_js();?>
  $('.print_box').click(function(ev){
    ev.preventDefault();
    $('.user_deals li').removeClass('print');
    $(this).closest('li').addClass('print');
    window.print();
  });
<?end_page_js();?>
