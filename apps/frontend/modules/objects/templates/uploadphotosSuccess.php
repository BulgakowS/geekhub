<?php if ($sf_user->isAuthenticated() && !$sf_user->hasPermission('user')): ?>
    <h2>Загрузка фото для <?php echo $object->getAdress(); ?></h2>
    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" class="uploadPhotos">
    <p>
        <?php use_stylesheets_for_form($form) ?>
        <?php use_javascripts_for_form($form) ?>
        <?php echo $form ?>

    </p>
    <p>
        <a href="<?php echo url_for('@obj_show?id='.$object->getId()); ?>" class="btn btn-success" >Просмотреть объект</a>
    </p>
    </form>
<?php else: ?>
    <h1 align="center" style="color: red">У Вас недостаточно прав </h1>
<?php endif; ?>
