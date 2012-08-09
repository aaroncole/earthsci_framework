<?php
function stanford_framework_form_system_theme_settings_alter(&$form, &$form_state) {
  $form['theme_settings']['hero_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Header Image'),
    '#default_value' => theme_get_setting('hero_image'),
  );
}
?>
