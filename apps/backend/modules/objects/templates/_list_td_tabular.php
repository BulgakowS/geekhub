<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($objects->getId(), 'objects_edit', $objects) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_category_id">
  <?php echo $objects->getCategory() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_actions_id">
  <?php echo $objects->getActions() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_user_id">
  <?php echo $objects->getSfGuardUser() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_adress">
  <?php echo $objects->getAdress() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $objects->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_room_count">
  <?php echo $objects->getRoomCount() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_floor_count">
  <?php echo $objects->getFloorCount() ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_avaible">
  <?php echo get_partial('objects/list_field_boolean', array('value' => $objects->getAvaible())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_price">
  <?php echo $objects->getPrice() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($objects->getCreatedAt()) ? format_date($objects->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($objects->getUpdatedAt()) ? format_date($objects->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
