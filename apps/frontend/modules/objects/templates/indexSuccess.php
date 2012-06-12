<?php use_helper('Pagination'); ?>
<?php $action = $sf_context->getActionName(); ?> 

<?php if ($sf_user->isAuthenticated() && !$sf_user->hasPermission('user')): ?>
<a href="<?php echo url_for('objects/new') ?>" class="btn btn-success btn_new"><i class="icon-tag icon-white"></i> Создать новый</a>
<?php endif; ?>

<?php  include_partial('menu', array('categorys' => $categorys, 'actions' => $actions)) ?>

<table class="table table-bordered table-condensed" id="main_table">
<?php foreach ($pager->getResults() as $objects): ?>  
<tr>
    <td>
        <p class="cat">
            <?php include_partial('obj_head', array('objects'=>$objects)); ?>
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
    if ($action == 'showByIds') {
        echo pager_navigation($pager, '@by?act='.$sf_request->getParameter('act', 'vse').'&cat='.$sf_request->getParameter('cat', 'vse')); 
    } else {
        echo pager_navigation($pager, '@homepage_pager'); 
    }
 ?>
</div>