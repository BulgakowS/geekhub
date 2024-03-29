<?php

/**
 * BasePhotos
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $objects_id
 * @property string $url
 * @property Objects $Objects
 * 
 * @method integer getObjectsId()  Returns the current record's "objects_id" value
 * @method string  getUrl()        Returns the current record's "url" value
 * @method Objects getObjects()    Returns the current record's "Objects" value
 * @method Photos  setObjectsId()  Sets the current record's "objects_id" value
 * @method Photos  setUrl()        Sets the current record's "url" value
 * @method Photos  setObjects()    Sets the current record's "Objects" value
 * 
 * @package    reelty
 * @subpackage model
 * @author     BulgakowS
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePhotos extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('photos');
        $this->hasColumn('objects_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Objects', array(
             'local' => 'objects_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}