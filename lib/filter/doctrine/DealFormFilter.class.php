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
                    
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array('choices'=>array_merge(array(''=>''),DealTable::$types)));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
                    'required' => false,
      'choices' => array_keys(DealTable::$types),
    ));

    $this->getWidgetSchema()->setLabels(array(
      'active' => 'Activa',
      'type' => 'Tipo',
      'category_id' => 'Categoría',
      'title' => 'Titulo',
      'seller' => 'Vendedor',
    ));

  }


  protected function addTypeColumnQuery(Doctrine_Query $query, $field, $value)
  {
    $fieldName = $this->getFieldName($field);
    $query->addWhere(sprintf("%s.%s = '%s'", $query->getRootAlias(), $fieldName, $value));
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
