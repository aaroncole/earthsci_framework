<?php
/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */
function phptemplate_settings($saved_settings) {
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
   */
  $defaults = array(
	'page_front_body_bg_type' => '',
	'page_front_body_bg_classes' => '',
	'page_front_body_bg_image_path' => '',
  );

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);

  // Create the form widgets using Forms API
    
  // Background Section
  $form['background_container'] = array(
    '#type' => 'fieldset',
    '#title' => t('Background Images'),
    '#description' => t('Use these settings to select different background images.'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  // Body Background Image
  $form['background_container']['page_front_body_bg_type'] = array(
    '#type'          => 'radios',
    '#title'         => t('Front page body background image type'),
    '#default_value' => $settings['page_front_body_bg_type'],
    '#options'       => array(
      '' => t('Wallpaper pattern - <strong><em>Default</em></strong>'),
	  'page_front_photobg ' => t('Photo image'),
    ),
  );
 
 $form['background_container']['page_front_body_bg_classes'] = array(
    '#type'          => 'radios',
    '#title'         => t('Front page body background image'),
    '#default_value' => $settings['page_front_body_bg_classes'],
    '#options'       => array(
      '' => t('None - <strong><em>Default</em></strong>'),
	  'page_front_bodybg ' => t('Use my image (upload below):'),
    ),
  );
  
   // This ensures that a 'files' directory exists if it hasn't
  // already been been created.
  file_check_directory(file_directory_path(), 
    FILE_CREATE_DIRECTORY, 'file_directory_path');

  // Check for a freshly uploaded header image, save it to the
  // filesystem, and grab its full path for later use.
  if ($file = file_save_upload('page_front_body_bg_image',
      array('file_validate_is_image' => array()))) {
    $parts = pathinfo($file->filename);
    $filename = 'page_front_body_bg.'. $parts['extension'];
    if (file_copy($file, $filename, FILE_EXISTS_REPLACE)) {
      $settings['page_front_body_bg_image_path'] = $file->filepath;
    }
  }

  // Define the settings-related FormAPI elements.
  $form['background_container']['page_front_body_bg_image'] = array(
    '#type' => 'file',
    '#title' => t('Upload front page body background image in .jpg, .gif, or .png format'),
    '#maxlength' => 40,
  );
  $form['background_container']['page_front_body_bg_image_path'] = array(
    '#type' => 'value',
    '#value' => !empty($settings['page_front_body_bg_image_path']) ?
      $settings['page_front_body_bg_image_path'] : '',
  );
  if (!empty($settings['page_front_body_bg_image_path'])) {
    $form['background_container']['page_front_body_bg_image_preview'] = array(
      '#type' => 'markup',
      '#value' => !empty($settings['page_front_body_bg_image_path']) ? 
          theme('image', $settings['page_front_body_bg_image_path']) : '',
    );
  }

  // Return the additional form widgets
  return $form;
}
?>