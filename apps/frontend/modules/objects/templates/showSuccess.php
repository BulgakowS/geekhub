<?php use_stylesheet('jquery.tzCheckbox.css'); ?>
<?php use_stylesheet('../js/fullsize/fullsize.css'); ?>
<?php use_javascript('fullsize/jquery.fullsize.js'); ?>


<a href="<?php echo url_for('objects/index') ?>" class="btn btn-info">Назад</a>

<hr />
    <?php include_partial('flash'); ?>

<table class="show_table">
  <tbody>
  <tr>  
    <td>
        <p class="cat">
            <?php echo link_to($object->getCategory(), '@by?cat='.$object->getCategoryId(), array('class' => 'label label-info')) ?> | 
            <?php echo link_to($object->getActions(), '@by?act='. $object->getActionsId(), array('class' => 'label label-info')) ?>
        </p>
        <h2 class="obj_link"><?php echo $object->getAdress() ?></h2>
        <p><b>Вледелец: </b> <?php echo $object->getSfGuardUser() ?></p>
    </td>
    <td>    
        <p><b>Комнат:</b> <?php echo $object->getRoomCount() ?></p>
        <p><b>Этаж:</b> <?php echo $object->getFloorCount() ?></p>
        <p><b>Цена:</b> <?php echo $object->getPrice() ?>$</p>
    </td>
    <td>
        <p><b>Описание:</b><br /> <?php echo $object->getDescription() ?></p>    
        <?php if ( $object->getCreatedAt() == $object->getUpdatedAt() ): ?>
            <p class="updated"><b>Добавлено: </b><?php echo $object->getCreatedAt() ?></p>
        <?php else: ?>
            <p class="updated"><b>Обновлено: </b><?php echo $object->getUpdatedAt() ?></p>
        <?php endif; ?>
    </td>
  </tr>
  <?php if(count($object->getAllPhotos())>0): ?>
    <tr>
        <td colspan="3" class="imgs">
            <?php foreach ($object->getAllPhotos() as $photo): ?>
                <img src="/timthumb.php?src=<?php echo $photo->getUrl(); ?>&w=180&h=120" class="full" title="" longdesc="/<?php echo $photo->getUrl(); ?>"/>
            <?php endforeach; ?>
        </td>
    </tr>
  <?php endif; ?>
  <tr>
    <td colspan="3">
        <p><b>Коментарии:</b></p>
        <?php include_partial('comments', array('comments'=>$comments)); ?>
    </td>
  </tr>
  
  <tr>
      <td colspan="3">
          <div class="comment-form">
            <?php if ($sf_user->isAuthenticated()): ?>  
              <?php include_partial('comment_form', array('form'=>$form, 'object'=>$object)); ?>
            <?php else: ?>
              <span class="label label-important" style="padding: 10px;">
                  Только авторизованные пользователи могут оставлять комментарии!
              </span>
            <?php endif; ?>
          </div>    
      </td>
  </tr>
  
  </tbody>
</table>

<hr />
<?php if ($sf_user->isAuthenticated() && !$sf_user->hasPermission('user') ): ?>
    <a href="<?php echo url_for('objects/edit?id='.$object->getId()) ?>" class="btn btn-warning">
        <i class="icon-edit"></i> Редактировать
    </a>
    <?php echo link_to( '<i class="icon-trash icon-white"></i> Удалить', 
                    'objects/delete?id='.$object->getId(), 
                    array( 'confirm' => 'Вы уверенны?', 'absolute' => true, "class"=>"btn btn-danger")
                );
    ?>
<?php endif; ?>
