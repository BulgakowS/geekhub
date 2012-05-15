<a href="<?php echo url_for('objects/index') ?>" class="btn btn-info">Назад</a>
<hr />

<table class="show_table">
  <tbody>
    <td>
        <p class="cat"><?php echo $objects->getCategory() ?> | <?php echo $objects->getActions() ?></p>
        <h2 class="obj_link"><?php echo $objects->getAdress() ?></h2>
        <p><b>Вледелец: </b> <?php echo $objects->getSfGuardUser() ?></p>
    </td>
    <td>    
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
  </tbody>
</table>

<hr />
<?php if ($sf_user->isAuthenticated()): ?>
<a href="<?php echo url_for('objects/edit?id='.$objects->getId()) ?>" class="btn btn-warning"><i class="icon-edit"></i> Редактировать</a>
<?php endif; ?>
