<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table class="auth_form"">
    <?php echo $form ?>
    <tfoot>
      <tr>
        <td colspan="2">
            <input type="submit" name="register" class="btn btn-success" value="<?php echo __('Register', null, 'sf_guard') ?>" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>