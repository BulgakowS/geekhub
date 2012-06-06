<?php

/**
 * Objects form.
 *
 * @package    reelty
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ObjectsForm extends BaseObjectsForm
{
  public function configure()
  {
      unset(
        $this['created_at'], $this['updated_at']
      );
      
      $this->widgetSchema->setLabels(array(
         'category_id' => 'Категория:',
         'actions_id' => 'Назначение:',
         'user_id' => 'Владелец:',
         'description' => 'Описание',
         'adress' => 'Адресс:',
         'room_count' => 'К-во комнат:',
         'floor_count' => 'К-во этажей:',
         'avaible' => 'Активно:',
         'price' => 'Цена:'
      ));
    
    $this->widgetSchema['avaible'] = new sfWidgetFormInputCheckbox(array(), array('checked'=>'checked'));
    
  }
}
