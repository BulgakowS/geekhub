<?php

/**
 * Objects form base class.
 *
 * @method Objects getObject() Returns the current form's model object
 *
 * @package    reelty
 * @subpackage form
 * @author     BulgakowS
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseObjectsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false)),
      'actions_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Actions'), 'add_empty' => false)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'adress'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'room_count'  => new sfWidgetFormInputText(),
      'floor_count' => new sfWidgetFormInputText(),
      'avaible'     => new sfWidgetFormInputCheckbox(),
      'price'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'))),
      'actions_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Actions'))),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'adress'      => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'room_count'  => new sfValidatorInteger(array('required' => false)),
      'floor_count' => new sfValidatorInteger(array('required' => false)),
      'avaible'     => new sfValidatorBoolean(),
      'price'       => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('objects[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Objects';
  }

}
