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