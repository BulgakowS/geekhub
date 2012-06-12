<div id="menu">
    <div id="cat_menu">
        <ul class="nav nav-list">
            <?php if ( ($sf_request->hasParameter('cat')) && ($sf_request->getParameter('cat') != 'vse') ): ?>
                <li class="reset">
                    <a href="<?php echo url_for('@by?&act=' . $sf_request->getParameter('act', 'vse')); ?>" >
                        X
                    </a>
                </li>
            <?php endif; ?>
            <?php foreach ($categorys as $cat): ?>
                <li <?php if ($sf_request->getParameter('cat') == $cat->getId()):?>
                            class="active"
                        <?php endif; ?>
                >
                    <a href="<?php echo url_for('@by?cat='.$cat->getId() . '&act=' . $sf_request->getParameter('act', 'vse')); ?>" >
                        <?php echo $cat->getName(); ?>
                    </a>
                </li>
            <?php endforeach; ?>        
        </ul>
    </div>

    <div id="act_menu">
        <ul class="nav nav-list">
            <?php if ( ($sf_request->hasParameter('act')) && ($sf_request->getParameter('act') != 'vse') ): ?>
                <li class="reset">
                    <a href="<?php echo url_for('@by?&cat=' . $sf_request->getParameter('cat', 'vse')); ?>" >
                        X
                    </a>
                </li>
            <?php endif; ?>
            <?php foreach ($actions as $act): ?>
                <li <?php if ($sf_request->getParameter('act') == $act->getId()):?>
                            class="active"
                        <?php endif; ?>
                >
                    <a href="<?php echo url_for('@by?act='.$act->getId() . '&cat=' . $sf_request->getParameter('cat', 'vse')); ?>" >
                        <?php echo $act->getName(); ?>
                    </a>
                </li>
            <?php endforeach; ?>     
            
        </ul>
    </div>
</div>