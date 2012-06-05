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
      $this->pager->setQuery(ObjectsTable::getFullObjectsQuery());
      $this->pager->setPage($this->getRequestParameter('page',1));
      $this->pager->init();
      
      $this->categorys = Doctrine::getTable('Category')
              ->createQuery('c')
              ->execute();
  }

  public function executeShow(sfWebRequest $request)
  { 
    $id = $request->getParameter('id');
    
    $this->object = Doctrine_Core::getTable('Objects')->find($request->getParameter('id'));

    $this->forward404Unless($this->object);
    $this->comments = $this->object->getAllComments();
    
    $this->form = new CommentsForm();
    $this->form->useFields(array('text','negative'));
    
    if($request->isMethod('post')) {
        $this->form->bind($request->getParameter($this->form->getName())); 
        if ( $this->form->isValid() ) {
            
            $this->form->createComment($id, $this->getUser()->getGuardUser()->getId());
          
            $this->getUser()->setFlash('success', 'Комментарий успешно добавлен!');

            $this->redirect('@obj_show?id='.$id);
        }   
    }
  }
  
  public function executeShowByAction(sfWebRequest $request) {
      $act = $request->getParameter('act');
      $this->forward404Unless($act);
      
      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
      $this->pager->setQuery(ObjectsTable::getObjectsByActionsId($act));
      $this->pager->setPage($this->getRequestParameter('page',1));
      $this->pager->init();
      
      $this->categorys = Doctrine::getTable('Category')
              ->createQuery('c')
              ->execute();
      
      $this->setTemplate('index');
  }

  public function executeShowByCategory(sfWebRequest $request) {
      $cat = $request->getParameter('cat');
      $this->forward404Unless($cat);
      
      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
      $this->pager->setQuery(ObjectsTable::getObjectsBycategoryId($cat));
      $this->pager->setPage($this->getRequestParameter('page',1));
      $this->pager->init();
      
      $this->categorys = Doctrine::getTable('Category')
              ->createQuery('c')
              ->execute();
      
      $this->setTemplate('index');
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
    
  public function executeUploadphotos(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $object = Doctrine::getTable('Objects')->find($id);
    $this->forward404Unless($object);

    $this->photos = $object->getAllPhotos();
    
//    $filename = UploadFile::upload($request, $params);
//
//    $this->setLayout(false);
//
//    die('{"jsonrpc" : "2.0", "error" : {"code": 333, "message": "Upload success."}, "id" : "id", "filename": "'. $filename .'"}');
//
//    return sfView::NONE;
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
  
  public function executeError(){
      $this->setTemplate('error404');
  }
  
}
