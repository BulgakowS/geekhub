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
              <li>
                  <a href="<?php echo url_for('@homepage'); ?>" class="btn btn-large">
                      <i class="icon-home"></i> Главная
                  </a>
              </li>
          </ul>    
      </nav>
      <nav id="user_menu">
          <ul>
            <?php if ($sf_user->isAuthenticated()): ?>
              <li class="btn btn-info disabled">
                  <i class="icon-user icon-white"></i> Вы вошли как: <b><?php echo $sf_user->getGuardUser() ?></b>
              </li>
              <li>
                  <a href="<?php echo url_for('@sf_guard_signout'); ?>" class="btn btn-danger">
                      <i class="icon-off icon-white"></i> Выход
                  </a>
              </li>
            <?php else: ?>
              <li>
                  <a href="<?php echo url_for('@sf_guard_signin'); ?>" class="btn btn-success">
                       <i class="icon-off icon-white"></i> Вход
                  </a>
              </li>
              <li>
                  <a href="<?php echo url_for('@sf_guard_register'); ?>" class="btn btn-warning">
                      <i class="icon-wrench icon-white"></i> Регистрация
                  </a>
              </li>
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
