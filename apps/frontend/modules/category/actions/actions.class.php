<?php

/**
 * category actions.
 *
 * @package    reelty
 * @subpackage category
 * @author     BulgakowS
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->categorys = Doctrine::getTable('Category')
            ->createQuery('c')
            ->execute();
      
  }
  
  public function executeShow(sfWebRequest $request)
  {
    $id = $request->getParameter('cat');
    $this->categorys = Doctrine::getTable('Category')
            ->createQuery('c')
            ->execute();
    
    $this->category = Doctrine::getTable('Category')->find($id);
    
    $this->pager = new sfDoctrinePager('Objects',  sfConfig::get('app_max_on_category'));
    $this->pager->setQuery($this->category->getObjectsByCategoryQuery($id));
    $this->pager->setPage($this->getRequestParameter('page',1));
    $this->pager->init();
  }
  
}
