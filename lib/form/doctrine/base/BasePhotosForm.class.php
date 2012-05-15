<?php

/**
 * Photos form base class.
 *
 * @method Photos getObject() Returns the current form's model object
 *
 * @package    reelty
 * @subpackage form
 * @author     BulgakowS
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePhotosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'objects_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objects'), 'add_empty' => false)),
      'url'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'objects_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Objects'))),
      'url'        => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('photos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photos';
  }

}
