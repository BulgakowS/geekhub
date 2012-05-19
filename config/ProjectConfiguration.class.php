<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');  
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfAdminThemejRollerPlugin');
    
        
    sfValidatorBase::setDefaultMessage('required', 'Обязательное поле!');
    sfValidatorBase::setDefaultMessage('min_length', 'Минимальное значение %min_length% символов!');
    sfValidatorBase::setDefaultMessage('max_length', 'Максимальное значение %max_length% символов!');
    sfValidatorBase::setDefaultMessage('csrf_attack', 'Время сессии истекло. Обновите форму и попробуйте заново!');
    sfValidatorBase::setDefaultMessage('invalid', 'Некорректное значение!');
    sfValidatorBase::setDefaultMessage('extra_fields', 'Неизвестный параметр "%field%"!');
    sfValidatorBase::setDefaultMessage('post_max_size', 'Переданные данные невозможно обработать. Возможно Вы загрузили слижком большой файл!');
    sfValidatorBase::setDefaultMessage('min', 'Минимальное значение %min%');
    sfValidatorBase::setDefaultMessage('max', 'Максимальное значение %max%');
  }
}
