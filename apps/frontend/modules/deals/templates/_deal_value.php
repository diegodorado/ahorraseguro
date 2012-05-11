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
        <td>$<?=$deal->getRealValue()?></td>
        <td><?=$deal->getOffer()?>%</td>
        <td>$<?=$deal->getDiscount()?></td>
      </tr>
    </tbody>
  </table>
</div>
