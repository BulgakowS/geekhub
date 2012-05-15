<?php

/**
 * Photos filter form base class.
 *
 * @package    reelty
 * @subpackage filter
 * @author     BulgakowS
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePhotosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'objects_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Objects'), 'add_empty' => true)),
      'url'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'objects_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Objects'), 'column' => 'id')),
      'url'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('photos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Photos';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'objects_id' => 'ForeignKey',
      'url'        => 'Text',
    );
  }
}
