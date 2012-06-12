<?php if ( (!$sf_request->hasParameter('cat')) || ($sf_request->getParameter('cat') == 'vse') ): ?>
    <?php echo link_to($objects->getCategory(), '@by?cat='.$objects->getCategoryId() . '&act=' . $sf_request->getParameter('act', 'vse'), array('class' => 'label label-info')) ?> | 
<?php else: ?>
    <span class="label label-success"><?php echo $objects->getCategory(); ?></span> | 
<?php endif; ?>

<?php if ((!$sf_request->hasParameter('act')) || ($sf_request->getParameter('act') == 'vse')): ?>
    <?php echo link_to($objects->getActions(), '@by?cat='.$sf_request->getParameter('cat', 'vse') . '&act='. $objects->getActionsId(), array('class' => 'label label-info')) ?> | 
<?php else: ?>
    <span class = "label label-success"><?php echo $objects->getActions(); ?></span> | 
<?php endif; ?>    

<?php echo $objects->getSfGuardUser() ?>