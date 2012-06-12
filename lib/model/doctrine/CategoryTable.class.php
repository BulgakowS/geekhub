<?php

/**
 * CategoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CategoryTable
     */
    public static function getAllCategories(){
        return Doctrine::getTable('Category')
              ->createQuery('c')
              ->execute();
    }


    public static function getInstance()
    {
        return Doctrine_Core::getTable('Category');
    }

    public function getCategories()
    {
        $q = $this->createQuery('c')
                  ->orderBy('name');

        return $q->execute();
    }
   
//    public function addObjectsByCategoryQuery(Doctrine_Query $q = null)
//    {
//        if (is_null($q))
//        {
//            $q = Doctrine_Query::create()
//            ->from('Objects o');
//        }
//
//        $alias = $q->getRootAlias();
//
//        $q->addOrderBy($alias . '.updated_at DESC');
//        
//        return $q;
//    }
}