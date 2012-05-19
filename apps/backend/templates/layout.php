<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <?php if ($sf_user->isAuthenticated()): ?> 
      <nav id="menu">
        <ul>
          <li>
            <a href="<?php echo url_for('@homepage'); ?>" class="btn btn-info">
                Обьекты
            </a>
          </li>
          <li>
            <a href="<?php echo url_for('@category'); ?>" class="btn btn-info">
                Категории
            </a>
          </li>
          <li>
            <a href="<?php echo url_for('@actions'); ?>" class="btn btn-info">
                Разделы
            </a>
          </li>
        </ul> 
      </nav>
      
         
      <nav id="user_menu">
          <ul>
            <li><?php echo link_to('Пользователи', 'sf_guard_user', array(), array('class'=>'btn btn-warning')) ?></li>
            <li><?php echo link_to('Выход', 'sf_guard_signout', array(), array('class'=>'btn btn-danger')) ?></li>
          </ul>  
      </nav> 
  <?php endif; ?>
      
      <div class="content">   
        <?php echo $sf_content ?>
      </div>    
  </body>
</html>
