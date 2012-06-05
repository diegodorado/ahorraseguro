<?php

/**
 * Deal filter form.
 *
 * @package    mendozaoferta
 * @subpackage filter
 * @author     diego@cooperativahormigon.com.ar
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DealFormFilter extends BaseDealFormFilter
{
  private static $status_choices = array('' => '', 'p' => 'PASADAS', 'a' => 'ACTIVAS', 'f'=>'FUTURAS');

  public function configure()
  {

    $this->widgetSchema['status'] =
            new sfWidgetFormChoice(array(
                    'choices' => self::$status_choices));

    $this->validatorSchema['status'] =
            new sfValidatorChoice(array(
                    'required' => false,
                    'choices' => array_keys(self::$status_choices)));
                    

    $this->getWidgetSchema()->setLabels(array(
      'status' => 'Estado',
      'category_id' => 'Categoría',
      'title' => 'Titulo',
      'seller' => 'Vendedor',
    ));

  }


  protected function addStatusColumnQuery(Doctrine_Query $query, $field, $value)
  {
     switch($value) {
       case 'p':
        $query->addWhere(sprintf('%s.ends_at < ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        break;
       case 'a':
        $query->addWhere(sprintf('%s.starts_at < ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        $query->addWhere(sprintf('%s.ends_at > ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        break;
       case 'f':
        $query->addWhere(sprintf('%s.starts_at > ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
     }
  }

  
}
