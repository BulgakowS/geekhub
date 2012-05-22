<?php use_helper('Pagination'); ?>
<h1>Все объекты</h1>

<?php if ($sf_user->isAuthenticated() && !$sf_user->hasCredential('user')): ?>
<a href="<?php echo url_for('objects/new') ?>" class="btn btn-success btn_new"><i class="icon-tag icon-white"></i> Создать новый</a>
<?php endif; ?>
<div id="cat_menu">
    <?php include_partial('category/cat_menu', array('categorys' => $categorys)) ?>
</div>  
<table class="table table-bordered table-condensed" id="main_table">
<?php foreach ($pager->getResults() as $objects): ?>  
<tr>
    <td>
        <p class="cat">
            <?php echo link_to($objects->getCategory(), '@by_cat?cat='.$objects->getCategoryId()) ?> | 
            <?php echo $objects->getActions() ?> | 
            <?php echo $objects->getSfGuardUser() ?>
        </p>
        <h2 class="obj_link">
            <a href="<?php echo url_for('@obj_show?id='.$objects->getId()) ?>">
                <?php echo $objects->getAdress() ?>
            </a>
        </h2>
        <p><b>Комнат:</b> <?php echo $objects->getRoomCount() ?></p>
        <p><b>Этаж:</b> <?php echo $objects->getFloorCount() ?></p>
        <p><b>Цена:</b> <?php echo $objects->getPrice() ?>$</p>
    </td>
    <td>
        
        <p><b>Описание:</b><br /> <?php echo $objects->getDescription() ?></p>    
        <?php if ( $objects->getCreatedAt() == $objects->getUpdatedAt() ): ?>
            <p class="updated"><b>Добавлено: </b><?php echo $objects->getCreatedAt() ?></p>
        <?php else: ?>
            <p class="updated"><b>Обновлено: </b><?php echo $objects->getUpdatedAt() ?></p>
        <?php endif; ?>
        
    </td>
</tr>
<?php endforeach; ?>
</table>  
<div class="pager">  
 <?php  echo pager_navigation($pager, '@homepage_pager') ?>
</div>