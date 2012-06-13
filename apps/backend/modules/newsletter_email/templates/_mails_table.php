<?php if(count($mails)):?>
  <table>
    <thead>
      <tr>
        <th><?=$title?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($mails as $mail):?>
        <tr>
          <td><?=$mail;?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
<?endif?>
