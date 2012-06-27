Hemos recibido tu pago por <?=$payment->getDeal()->getTitle()?>.<br/>
<br/>
Fecha de compra: <?=$payment->getDateTimeObject('updated_at')->format('d/m/Y')?><br/>
Cantidad comprada: <?=$payment->getQuantity()?><br/>
Importe Real: $<?=$payment->getRealValue()*$payment->getQuantity()?><br/>
Descuento: $<?=$payment->getSaved()*$payment->getQuantity()?><br/>
Importe Final: $<?=$payment->getPrice()*$payment->getQuantity()?><br/>
------------------------<br/>
Nro de Referencia: <?=$payment->getCode()?><br/>
<br/>
<br/>
-------------------------<br/>
Puedes imprimir este email para utilizar tu descuento.<br/>
También estará accesible desde nuestro sitio ingresando a "MI CUENTA"
