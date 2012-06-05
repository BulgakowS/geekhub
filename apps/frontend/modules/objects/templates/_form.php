<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<div>
    <form action="<?php echo url_for('objects/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table>
        <tfoot>
        <tr>
            <td colspan="2">
            &nbsp;<a href="<?php echo url_for('objects/index') ?>" class="btn btn-info" >Назад</a>
            <?php if (!$form->getObject()->isNew()): ?>
                &nbsp;<?php echo link_to('Удалить', 'objects/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Вы уверены?', 'class' => "btn btn-danger")) ?>
            <?php endif; ?>
            <input type="submit" value="Сохранить" class="btn btn-success"/>
            </td>
        </tr>
        </tfoot>
        <tbody>
        <?php echo $form ?>
        </tbody>
    </table>
    </form>
</div>