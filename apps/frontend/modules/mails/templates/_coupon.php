Hemos recibido tu pago por <?=$payment->getDeal()->getTitle()?>.<br/>
<br/>
Fecha de compra: <?=$payment->getDateTimeObject('updated_at')->format('d/m/Y')?><br/>
Cantidad comprada: <?=$payment->getQuantity()?><br/>
Importe Real: $<?=$payment->getRealValue()*$payment->getQuantity()?><br/>
Descuento: $<?=$payment->getSaved()*$payment->getQuantity()?><br/>
Importe Final: $<?=$payment->getPrice()*$payment->getQuantity()?><br/>
<br/>
------------------------------------------------<br/>
Nro de Referencia: <?=$payment->getCode()?><br/>
------------------------------------------------<br/>
<br/>
------------------------------------------------<br/>
Comercio: <?=$payment->getDeal()->getStore()->getTradingName()?><br/>
Domicilio: <?=$payment->getDeal()->getStore()->getAddress()?><br/>
Barrio: <?=$payment->getDeal()->getStore()->getQuarter()->getName()?><br/>
Localidad: <?=$payment->getDeal()->getStore()->getCity()?><br/>
Provincia: <?=$payment->getDeal()->getStore()->getProvince()?><br/>
Telefono: <?=$payment->getDeal()->getStore()->getPhone()?><br/>
------------------------------------------------<br/>
<br/>
Puedes imprimir este email para utilizar tu descuento.<br/>
También estará accesible desde nuestro sitio ingresando a "MI CUENTA"
