<td colspan="1">
  <?=link_to(image_tag($payment->getDeal()->getThumb()), 'payment_edit', $payment,array('style'=>'float:left;margin-right:10px'))?>
  <h4><?=$payment->getDeal()->getTitle()?></h4>
  <em>el <?=$payment->getDateTimeObject('updated_at')->format('d/m/Y \a \l\a\s H:i \h\s')?> por <?=$payment->getUser()?></em><br/>
  Cantidad: <?=$payment->getQuantity()?><br/>
  Estado: <?=PaymentTable::$statuses[$payment->getStatus()]?><br/>
</td>
