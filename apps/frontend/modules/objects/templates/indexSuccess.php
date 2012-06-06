<?php use_helper('Pagination'); ?>
<?php $action = $sf_context->getActionName(); ?> 



<?php if ($sf_user->isAuthenticated() && !$sf_user->hasCredential('user')): ?>
<a href="<?php echo url_for('objects/new') ?>" class="btn btn-success btn_new"><i class="icon-tag icon-white"></i> Создать новый</a>
<?php endif; ?>
<div id="cat_menu">
    <?php include_partial('cat_menu', array('categorys' => $categorys)) ?>
</div>  
<table class="table table-bordered table-condensed" id="main_table">
<?php foreach ($pager->getResults() as $objects): ?>  
<tr>
    <td>
        <p class="cat">
            <?php if ($action != 'showByCategory'): ?>
                <?php echo link_to($objects->getCategory(), '@by_cat?cat='.$objects->getCategoryId(), array('class' => 'label label-info')) ?> | 
            <?php else: ?>
                <span class = "label label-success"><?php echo $objects->getCategory(); ?></span> | 
            <?php endif; ?>
            
            <?php if ($action != 'showByAction'): ?>
                <?php echo link_to($objects->getActions(), '@by_act?act='.$objects->getActionsId(), array('class' => 'label label-info')) ?> | 
            <?php else: ?>
                <span class = "label label-success"><?php echo $objects->getActions(); ?></span> | 
            <?php endif; ?>    
            
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
        <a href="<?php echo url_for('@obj_show?id='.$objects->getId()) ?>" class=" url_full_obj">
            Подробно
            <i class="icon-exclamation-sign "></i> 
        </a>
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
 <?php 
    if ($action == 'showByCategory'){
        echo pager_navigation($pager, '@by_cat_pager?cat='.$catId); 
    } elseif ($action == 'showByAction') {
        echo pager_navigation($pager, '@by_act_pager?act='.$actId); 
    } else {
        echo pager_navigation($pager, '@homepage_pager'); 
    }
 ?>
</div>