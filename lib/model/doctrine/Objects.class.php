<?php

/**
 * Objects
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    reelty
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Objects extends BaseObjects
{
    public function __toString()
    {
        return sprintf('%s на %s (%s)', $this->getCategory(), $this->getAdress(), $this->getSfGuardUser());
    }

}
