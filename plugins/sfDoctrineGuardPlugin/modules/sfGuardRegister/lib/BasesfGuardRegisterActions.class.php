<?php

class BasesfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $user = $this->form->save();
        $this->getUser()->signIn($user);
        
        $userClass =  $this->getUser()->getGuardUser();
        
        if (!$userClass->hasGroup('user'))
        {
          $userClass->addGroupByName('user');
          
          //$userClass->save();
        } 
        
        if(!$this->getUser()->hasPermission('user'))
        {
            $this->getUser()->addPermissionByName('user');
            //$userClass->save();
        }

        

        $this->redirect('@homepage');
      }
    }
  }
}