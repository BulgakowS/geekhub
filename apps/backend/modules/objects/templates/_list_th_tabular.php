<?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_adress ui-state-default ui-th-column">
  <?php if ('adress' == $sort[0]): ?>
    <?php /*echo link_to(__('Adress', array(), 'messages'), '@objects?sort=adress&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1]))*/ ?>
    <a href="<?php echo url_for('@objects?sort=adress&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
      <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
      <?php echo __('Adress', array(), 'messages') ?>
    </a>
    <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php /*echo link_to(__('Adress', array(), 'messages'), '@objects?sort=adress&sort_type=asc')*/ ?>
    <a href="<?php echo url_for('@objects?sort=adress&sort_type=asc') ?>">
      <span class="ui-icon ui-icon-triangle-2-n-s"></span>
      <?php echo __('Adress', array(), 'messages') ?>
    </a>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_category ui-state-default ui-th-column">
  <?php if ('category_id' == $sort[0]): ?>
    <?php /*echo link_to(__('Category', array(), 'messages'), '@objects?sort=category_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1]))*/ ?>
    <a href="<?php echo url_for('@objects?sort=category_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
      <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
      <?php echo __('Category', array(), 'messages') ?>
    </a>
    <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php /*echo link_to(__('Category', array(), 'messages'), '@objects?sort=category_id&sort_type=asc')*/ ?>
    <a href="<?php echo url_for('@objects?sort=category_id&sort_type=asc') ?>">
      <span class="ui-icon ui-icon-triangle-2-n-s"></span>
      <?php echo __('Category', array(), 'messages') ?>
    </a>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_category ui-state-default ui-th-column">
  <?php if ('actions_id' == $sort[0]): ?>
    <?php /*echo link_to(__('Actions', array(), 'messages'), '@objects?sort=actions_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1]))*/ ?>
    <a href="<?php echo url_for('@objects?sort=actions_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
      <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
      <?php echo __('Actions', array(), 'messages') ?>
    </a>
    <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php /*echo link_to(__('Actions', array(), 'messages'), '@objects?sort=actions_id&sort_type=asc')*/ ?>
    <a href="<?php echo url_for('@objects?sort=actions_id&sort_type=asc') ?>">
      <span class="ui-icon ui-icon-triangle-2-n-s"></span>
      <?php echo __('Actions', array(), 'messages') ?>
    </a>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_text sf_admin_list_th_category ui-state-default ui-th-column">
  <?php if ('user_id' == $sort[0]): ?>
    <?php /*echo link_to(__('Sf guard user', array(), 'messages'), '@objects?sort=user_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1]))*/ ?>
    <a href="<?php echo url_for('@objects?sort=user_id&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
      <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
      <?php echo __('Sf guard user', array(), 'messages') ?>
    </a>
    <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php /*echo link_to(__('Sf guard user', array(), 'messages'), '@objects?sort=user_id&sort_type=asc')*/ ?>
    <a href="<?php echo url_for('@objects?sort=user_id&sort_type=asc') ?>">
      <span class="ui-icon ui-icon-triangle-2-n-s"></span>
      <?php echo __('Sf guard user', array(), 'messages') ?>
    </a>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?><?php slot('sf_admin.current_header') ?>
<th class="sf_admin_boolean sf_admin_list_th_avaible ui-state-default ui-th-column">
  <?php if ('avaible' == $sort[0]): ?>
    <?php /*echo link_to(__('Avaible', array(), 'messages'), '@objects?sort=avaible&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc'), array('class' => $sort[1]))*/ ?>
    <a href="<?php echo url_for('@objects?sort=avaible&sort_type='.($sort[1] == 'asc' ? 'desc' : 'asc')) ?>">
      <span class="ui-icon <?php echo ($sort[1] == 'asc' ? 'ui-icon-circle-triangle-s' : 'ui-icon-circle-triangle-n') ?>"></span>
      <?php echo __('Avaible', array(), 'messages') ?>
    </a>
    <?php //echo image_tag(sfConfig::get('sf_admin_module_web_dir').'/images/'.$sort[1].'.png', array('alt' => __($sort[1], array(), 'sf_admin'), 'title' => __($sort[1], array(), 'sf_admin'))) ?>
  <?php else: ?>
    <?php /*echo link_to(__('Avaible', array(), 'messages'), '@objects?sort=avaible&sort_type=asc')*/ ?>
    <a href="<?php echo url_for('@objects?sort=avaible&sort_type=asc') ?>">
      <span class="ui-icon ui-icon-triangle-2-n-s"></span>
      <?php echo __('Avaible', array(), 'messages') ?>
    </a>
  <?php endif; ?>
</th>
<?php end_slot(); ?>
<?php include_slot('sf_admin.current_header') ?>