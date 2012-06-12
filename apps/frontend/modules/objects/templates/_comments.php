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