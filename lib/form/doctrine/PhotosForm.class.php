<?php

/**
 * Photos form.
 *
 * @package    reelty
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PhotosForm extends BasePhotosForm
{
  public function configure()
  {
      unset(
        $this['created_at'], $this['updated_at'], $this['objects_id']
      );
      
      $this->widgetSchema['url'] = new sfWidgetFormInputFileEditable(array(
              'label'     => 'Photo',
              'file_src'  => '',
              'edit_mode' => $this->isNew(),
              'is_image'  => true,
              'delete_label' => 'remove photo')
          );
      $this->validatorSchema['url'] = new sfValidatorFile();
  }
}
