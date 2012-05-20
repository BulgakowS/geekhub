<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_javascripts() ?>
    <?php include_stylesheets() ?>
  </head>
  <body>
    <header>
      <nav id="menu" class="navbar">
          <ul>
              <li><a href="<?php echo url_for('@homepage'); ?>" class="btn btn-large">Главная</a></li>
          </ul>    
      </nav>
      <nav id="user_menu">
          <ul>
            <?php if ($sf_user->isAuthenticated()): ?>
              <li class="btn btn-info disabled"><i class="icon-user"></i> Вы вошли как: <b><?php echo $sf_user->getGuardUser() ?></b></li>
              <li><?php echo link_to('Выход', 'sf_guard_signout', array(), array('class'=>'btn btn-danger')) ?></li>
            <?php else: ?>
              <li><?php echo link_to('Вход', 'sf_guard_signin', array(), array('class'=>'btn btn-success')) ?></li>
              <li><?php echo link_to('Регистрация', 'sf_guard_register', array(), array('class'=>'btn btn-warning')) ?></li>
            <?php endif; ?>  
          </ul>  
      </nav> 
    </header>

    <article>  
        <?php echo $sf_content ?>
    </article>
    
    <footer> 
        <small class="made_by">
            made by <a href="mailto:bulgakows@gmail.com" >BulgakowS</a> ©
        </small>
    </footer>
  </body>
</html>
