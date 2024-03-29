<?php

/**
 * Comments form.
 *
 * @package    reelty
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentsForm extends BaseCommentsForm
{
  public function configure()
  {   
      $this->disableCSRFProtection();
      unset($this['created_at'], $this['updated_at'], $this['id'] );
      
      $this->useFields(array('text','negative'));
      
      $this->widgetSchema['negative'] = new sfWidgetFormInputCheckbox(array(), 
                                            array('id'=>"pncheck",  
                                                  'data-on'=>"Позитивный", 
                                                  'data-off'=>"Негативный",
                                                  'checked'=>'true')
                                            );
      
      $this->widgetSchema->setLabels(array(
         'text' => 'Введите Ваш комментарий:',
         'negative' => ' '
      ));
      
      $this->setValidators(array(
        'text' => new sfValidatorString(array('min_length' => 5)),
        'negative' => new sfValidatorBoolean() 
      ));

  }
  
  public function createComment($objId, $userId) {
            $comment = new Comments();
            $comment->setObjectId($objId);
            $comment->setUserId($userId);
            $comment->setText($this->getValue('text'));
            $comment->setNegative($this->getValue('negative'));
            $comment->save();      
  }
  
}
