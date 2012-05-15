<h1>Выберите категорию</h1>
<ul class="categorys">
    <?php foreach ($categorys as $cat): ?>
        <li>
            <a href="<?php echo url_for('@by_cat?cat='.$cat->getId()); ?>">
                <?php echo $cat->getName() ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>