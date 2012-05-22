<?php

/**
 * objects actions.
 *
 * @package    reelty
 * @subpackage objects
 * @author     BulgakowS
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class objectsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_homepage'));
      $this->pager->getQuery()->from('Objects o')->where('o.avaible = true')->orderBy('o.updated_at DESC');
      $this->pager->setPage($this->getRequestParameter('page',1));
      $this->pager->init();
      
      $this->categorys = Doctrine::getTable('Category')
              ->createQuery('c')
              ->execute();
      
      
  }

  public function executeShow(sfWebRequest $request)
  { 
    $id = $request->getParameter('id');
    
    
    $obj = Doctrine_Core::getTable('Objects')->find($request->getParameter('id'));
    $this->object = $obj;
    $this->forward404Unless($this->object);
    $this->comments = $obj->getAllComments();
    
    $this->form = new CommentsForm();
    $this->form->useFields(array('text','negative'));
    
    if($request->isMethod('post')) {
        $this->form->bind($request->getParameter($this->form->getName())); 
        if ( $this->form->isValid() ) {
            $values = $this->form->getValues();
//           var_dump($values);exit;
            $user_id = $this->getUser()->getGuardUser()->getId();
            $comment = new Comments();
            $comment->setObjectId($id);
            $comment->setUserId($user_id);
            $comment->setText($values['text']);
            $comment->setNegative($values['negative']);
            $comment->save();

            $this->getUser()->setFlash('success', 'Комментарий успешно добавлен!');

            $this->redirect('@obj_show?id='.$id);
        }   
    }
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ObjectsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ObjectsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($objects = Doctrine_Core::getTable('Objects')->find(array($request->getParameter('id'))), sprintf('Object objects does not exist (%s).', $request->getParameter('id')));
    $this->form = new ObjectsForm($objects);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($objects = Doctrine_Core::getTable('Objects')->find(array($request->getParameter('id'))), sprintf('Object objects does not exist (%s).', $request->getParameter('id')));
    $this->form = new ObjectsForm($objects);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($objects = Doctrine_Core::getTable('Objects')->find(array($request->getParameter('id'))), sprintf('Object objects does not exist (%s).', $request->getParameter('id')));
    $objects->delete();

    $this->redirect('objects/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $objects = $form->save();

      $this->redirect('objects/show?id='.$objects->getId());
    }
  }
}
