<?php echo $form->renderGlobalErrors() ?>
<form action="<?php echo url_for('@obj_show?id='.$object->getId())?>" method="POST" autocomplete="off" name="<?php echo $form->getName() ?>"> 
    <span><?php echo $form['text']->renderLabel(); ?></span>
    <p><?php echo $form['text']->renderError(); ?>
        <?php echo $form['text']->render(); ?></p>
    <p><?php echo $form['negative']->render(); ?> 
    <?php echo $form->renderHiddenFields() ?>    
        <input type="submit" value="Написать" class="btn btn-large comment-ok"/></p>
</form>
             