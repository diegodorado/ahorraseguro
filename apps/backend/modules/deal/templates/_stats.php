<div style="float:right;background:#e7e7e7;border:1px solid #ccc;padding:10px">
  <h4>Visitas: <?=$deal->getVisitedCount()?></h4>
  <h4><?=($deal->getType()=='P')?'Impresos: '.$deal->getPrintedCount():'Comprados: '.$deal->getBoughtCount()?></h4>
</div>
