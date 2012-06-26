<br />
<table width="100%">
  <thead>
    <tr>
      <th>ID</th>
      <th>Date</th>
      <th>Comprador</th>
      <th>Payment</th>
      <th>MontoNeto</th>
      <th>Number</th>
      <th>Metodo de Pago</th>
      <th>Items</th>
    </tr>
  </thead>
  <tbody>
    <?foreach($pays as $pay):?>
      <tr>
        <td><?=$pay['Trx_id']?></td>
        <td><?=$pay->Trx_Date?></td>
        <td>
          <?=$pay->Trx_NombreComprador?><br/>
          <?=$pay->Trx_Email?>
        </td>
        <td><?=$pay->Trx_Payment?></td>
        <td><?=$pay->Trx_MontoNeto?></td>
        <td><?=$pay->Trx_Number?></td>
        <td>
          <?=$pay->Trx_PaymentMethod?>
          <br />
          <?=$pay->Trx_PaymentMean?>
        </td>
        <td>
          <ul>
            <?foreach($pay->Items[0]->Item as $item):?>
              <li>
                <strong><?=$item->Item_Quantity?> x $<?=$item->Item_Payment?>:</strong>
                <em><?=$item->Item_Description?></em>
              </li>
            <?endforeach?>
          </ul>
        </td>
      </tr>
    <?endforeach?>
  </tbody>
</table>
