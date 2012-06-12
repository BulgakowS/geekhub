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
      
      $this->categorys = CategoryTable::getAllCategories();
      $this->actions = ActionsTable::getAllActions();
  }

  public function executeShow(sfWebRequest $request)
  { 
    $id = $request->getParameter('id');
    
    $this->object = Doctrine_Core::getTable('Objects')->find($request->getParameter('id'));

    $this->forward404Unless($this->object);
    $this->comments = $this->object->getAllComments();
    
    $this->form = new CommentsForm();
    
    if($request->isMethod('post')) {
        $this->forward404Unless( $this->getUser()->isAuthenticated() && !$this->getUser()->hasPermission('user') );
        $this->form->bind($request->getParameter($this->form->getName())); 
        if ( $this->form->isValid() ) {
            $this->form->createComment($id, $this->getUser()->getGuardUser()->getId());
            $this->getUser()->setFlash('success', 'Комментарий успешно добавлен!');

            $this->redirect('@obj_show?id='.$id);
        }   
    }
  }
  
  public function executeShowByIds(sfWebRequest $request) {
      $act = $request->getParameter('act');
      $cat = $request->getParameter('cat');
      $this->forward404Unless(($act && $cat));
      $this->actId = $act;
      $this->catId = $cat;
      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
      $this->pager->setQuery(ObjectsTable::getObjectsByIds($act, $cat));
      $this->pager->setPage($this->getRequestParameter('page',1));
      $this->pager->init();
      
      $this->categorys = CategoryTable::getAllCategories();
      $this->actions = ActionsTable::getAllActions();
      
      $this->setTemplate('index');
  }
  
//  public function executeShowByAction(sfWebRequest $request) {
//      $act = $request->getParameter('act');
//      $this->forward404Unless($act);
//      $this->actId = $act;
//      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
//      $this->pager->setQuery(ObjectsTable::getObjectsByActionsId($act));
//      $this->pager->setPage($this->getRequestParameter('page',1));
//      $this->pager->init();
//      
//      $this->categorys = CategoryTable::getAllCategories();
//      $this->actions = ActionsTable::getAllActions();
//      
//      $this->setTemplate('index');
//  }
//
//  public function executeShowByCategory(sfWebRequest $request) {
//      $cat = $request->getParameter('cat');
//      $this->forward404Unless($cat);
//      $this->catId = $cat;
//      $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
//      $this->pager->setQuery(ObjectsTable::getObjectsBycategoryId($cat));
//      $this->pager->setPage($this->getRequestParameter('page',1));
//      $this->pager->init();
//      
//      $this->categorys = CategoryTable::getAllCategories();
//      $this->actions = ActionsTable::getAllActions();
//      
//      $this->setTemplate('index');
//  }
  
  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless( $this->getUser()->isAuthenticated() && !$this->getUser()->hasPermission('user') );
    $form =  new ObjectsForm();
    $this->form = $form;
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
    $this->forward404Unless( $this->getUser()->isAuthenticated() && !$this->getUser()->hasPermission('user') );
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
    $this->forward404Unless( $this->getUser()->isAuthenticated() && !$this->getUser()->hasPermission('user') );
    $id = $request->getParameter('id');
    $this->forward404Unless($objects = Doctrine_Core::getTable('Objects')->find(array($id)), sprintf('Object objects does not exist (%s).', $id));
    $photos = $objects->getAllPhotos();
    foreach ($photos as $photo) {
        if(is_file($photo->getUrl())){
            unlink($photo->getUrl());
        }
        
    }
    $dir = 'uploads' . DIRECTORY_SEPARATOR . $id;
    if (is_dir($dir)){
        rmdir($dir);
    }
    $objects->delete();
    
    $this->redirect('objects/index');
  }
    
  public function executeUploadphotos(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $object = Doctrine::getTable('Objects')->find($id);
    $this->forward404Unless($object);
    $this->object = $object;
    $this->form = new UploadForm();
    
    if ($request->isMethod('post'))
    {
        //print_r($file = $request->getFiles());
        $file = $request->getFiles();
        
        $name = $file['files']['photos']['name'];
        $tmp = $file['files']['photos']['tmp_name'];
        $upload_path = sfConfig::get('sf_upload_dir').DIRECTORY_SEPARATOR. $id .DIRECTORY_SEPARATOR;
        if(!is_dir($upload_path)) {
                mkdir($upload_path, 0777);           
        }
        $name = preg_replace('/[^\w\._]+/', '_', $name);
        $full_name = $upload_path . $name;
        $url = 'uploads' . DIRECTORY_SEPARATOR . $id . DIRECTORY_SEPARATOR . $name;
        if (!is_file($full_name)){
                copy($tmp, $full_name);
                $photo = new Photos();
                $photo->setObjectsId($id);
                $photo->setUrl($url);
                $photo->save();
                echo('<img src="/timthumb.php?src='.$photo->getUrl().'&w=180&h=120" />');
        } else {
            echo('Файл уже существует ;)');
        }
      
      $this->setLayout(false);
      return sfView::NONE;
    }
    
  }  
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $objects = $form->save();

      $this->redirect('@photo_upload?id='.$objects->getId());
    }
  }
  
  public function executeError(){
      $this->setTemplate('error404');
  }
  
}
