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
  public function configure()
  {

    $this->widgetSchema['active'] =
            new sfWidgetFormChoice(array(
                    'choices' => array('' => '', 1 => 'Si', 0 => 'No')));

    $this->validatorSchema['active'] =
            new sfValidatorChoice(array(
                    'required' => false,
                    'choices' => array(1, 0)));
                    

    $this->getWidgetSchema()->setLabels(array(
      'active' => 'Activa',
      'category_id' => 'Categoría',
      'title' => 'Titulo',
      'seller' => 'Vendedor',
    ));

  }


  protected function addActiveColumnQuery(Doctrine_Query $query, $field, $value)
  {
     switch($value) {
       case 0:
        $query->addWhere(sprintf('%s.ends_at < ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        break;
       case 1:
        $query->addWhere(sprintf('%s.starts_at < ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        $query->addWhere(sprintf('%s.ends_at > ?', $query->getRootAlias()),date('Y-m-d H:i:s', time()));
        break;
     }
  }

  
}
