<?php use_stylesheet('jquery.tzCheckbox.css'); ?>

<a href="<?php echo url_for('objects/index') ?>" class="btn btn-info">Назад</a>

<hr />
    <?php if ($sf_user->hasFlash('success')): ?>
        <div class="alert fade in alert-success">
            <button class="close" data-dismiss="alert" onClick="$(this).parents('.alert').fadeOut(400);">×</button>
            <strong><?php echo $sf_user->getFlash('success') ?></strong>
        </div>
    <?php endif; ?>
    <?php if ($sf_user->hasFlash('error')): ?>
        <div class="alert fade in alert-error">
            <button class="close" data-dismiss="alert" onClick="$(this).parents('.alert').fadeOut(400);">×</button>
            <strong><?php echo $sf_user->getFlash('error') ?></strong>
        </div>
    <?php endif; ?>

<table class="show_table">
  <tbody>
  <tr>  
    <td>
        <p class="cat">
            <?php echo link_to($object->getCategory(), '@by_cat?cat='.$object->getCategoryId(), array('class' => 'label label-info')) ?> | 
            <?php echo link_to($object->getActions(), '@by_act?act='.$object->getActionsId(), array('class' => 'label label-info')) ?>
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
  <tr>
    <td colspan="3">
        <p><b>Коментарии:</b></p>
        <?php if ( count($comments) > 0 ): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment" style="background-color: #<?php echo $comment->getNegative()?'DFF0D8':'F2DEDE'; ?>">
                    <p class="comm_autor">
                        <?php echo $comment->getSfGuardUser(); ?>
                        <span>
                            <?php echo $comment->getCreatedAt(); ?>
                        </span>
                    </p> 
                    <div class="comm_text">
                        <?php echo $comment->getText(); ?>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            Пока никто не написал о данном объекте :(
        <?php endif; ?>
    </td>
  </tr>
  
  <tr>
      <td colspan="3">
          <div class="comment-form">
            <?php if ($sf_user->isAuthenticated()): ?>  
                <?php echo $form->renderGlobalErrors() ?> 

                <form action="<?php echo url_for('@obj_show?id='.$object->getId())?>" method="POST" autocomplete="off" name="<?php echo $form->getName() ?>"> 
                    <span><?php echo $form['text']->renderLabel(); ?></span>
                    <p><?php echo $form['text']->renderError(); ?>
                        <?php echo $form['text']->render(); ?></p>
                    <p><?php echo $form['negative']->render(); ?> 
                    <?php echo $form->renderHiddenFields() ?>    
                        <input type="submit" value="Написать" class="btn btn-large comment-ok"/></p>
                </form>
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
<?php if ($sf_user->isAuthenticated() && !$sf_user->hasCredential('user')): ?>
    <a href="<?php echo url_for('objects/edit?id='.$object->getId()) ?>" class="btn btn-warning">
        <i class="icon-edit"></i> Редактировать
    </a>
    <a href="<?php echo url_for('objects/delete?id='.$object->getId()) ?>" class="btn btn-danger">
        <i class="icon-trash icon-white"></i> Удалить
    </a>
<?php endif; ?>
