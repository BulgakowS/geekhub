<h1><?php echo $category->getName() ?></h1>
<div id="cat_menu">
    <?php include_partial('category/cat_menu', array('categorys' => $categorys)) ?>
</div>
<table class="table table-bordered table-condensed" id="main_table">
<?php foreach ($objects as $objects): ?>  
<tr>
    <td>
        <p class="cat"><?php echo $objects->getCategory() ?> | <?php echo $objects->getActions() ?> | <?php echo $objects->getSfGuardUser() ?></p>
        <h2 class="obj_link">
            <a href="<?php echo url_for('objects/show?id='.$objects->getId()) ?>">
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