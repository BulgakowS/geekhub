<?php

/**
 * Comments form base class.
 *
 * @method Comments getObject() Returns the current form's model object
 *
 * @package    reelty
 * @subpackage form
 * @author     BulgakowS
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => false)),
      'object_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objects'), 'add_empty' => false)),
      'text'       => new sfWidgetFormTextarea(),
      'negative'   => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'))),
      'object_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objects'))),
      'text'       => new sfValidatorString(array('max_length' => 4000)),
      'negative'   => new sfValidatorBoolean(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('comments[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comments';
  }

}
