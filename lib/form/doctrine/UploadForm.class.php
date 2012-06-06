<?php

/**
 * Objects form.
 *
 * @package    reelty
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UploadForm extends BaseForm
{
  public function configure()
  {
    $this->widgetSchema->setNameFormat('files[%s]');
    
    $this->disableCSRFProtection();
    
    $this->widgetSchema['photos'] = new sfWidgetFormInputSWFUpload();
    
    $this->widgetSchema['photos']->setLabel(' ');
    
    $this->setValidators['photos'] = new sfValidatorFile();
    
  }
}
