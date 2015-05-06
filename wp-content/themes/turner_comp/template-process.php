<?php
/**
 * Template name: Process
 */

require_once(ABSPATH . 'wp-admin/includes/image.php');

function isValidEmail($email){
  return preg_match("/^[_a-z0-9-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
}

function copyImageAndSave($image) {

  $new_filename_tmp = 'tmp_'.date('U').'_'.strtolower($image['name']);
  $new_filename_actual = date('U').'_'.strtolower($image['name']);

  $upload_dir = wp_upload_dir();
  if( wp_mkdir_p( $upload_dir['path'] ) ) {
    $filepath = $upload_dir['path'].'/'.$new_filename_tmp;
    $directory = $upload_dir['path'].'/';
  } else {
    $filepath = $upload_dir['basedir'].'/'.$new_filename_tmp;
    $directory = $upload_dir['basedir'].'/';
  }

  move_uploaded_file($image['tmp_name'], $filepath);

  list($width, $height, $gis_type, $gis_attr) = getimagesize($filepath);

  $valid_gis = array(1,2,3); // gif, jpg, png
  if (!in_array($gis_type, $valid_gis)) {
    unlink($filepath);
    return false;
  }

  $new_width = $width;
  $new_height = $height;

  if ($height >= $width) {
    // resize width
    if ($width < 500) {
      $pc = 500/$width;
      $new_width = intval($width * $pc);
      $new_height = intval($height * $pc);
    }
  } else {
    // resize height
    if ($height < 500) {
      $pc = 500/$height;
      $new_width = intval($width * $pc);
      $new_height = intval($height * $pc);
    }
  }

  $output = imagecreatetruecolor($new_width, $new_height);

  switch($gis_type){
    case 1:
      $image = imagecreatefromgif($filepath);
      break;
    case 2:
      $image = imagecreatefromjpeg($filepath);
      break;
    case 3:
      $image = imagecreatefrompng($filepath);
      break;
  }
  if ($image) {
    imagecopyresized($output, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    switch($gis_type){
      case 1:
        imagegif($output, $directory.$new_filename_actual);
        break;
      case 2:
        imagejpeg($output, $directory.$new_filename_actual);
        break;
      case 3:
        imagepng($output, $directory.$new_filename_actual);
        break;
    }
    unlink($filepath);
    return array($directory.$new_filename_actual, $new_filename_actual);
  } else {
    return false;
  }
}

$entry_name     = filter_var($_REQUEST['entry_name'], FILTER_SANITIZE_STRING);
$entry_email    = filter_var($_REQUEST['entry_email'], FILTER_SANITIZE_EMAIL);
$entry_company  = filter_var($_REQUEST['entry_company'], FILTER_SANITIZE_STRING);
$entry_image    = $_FILES['entry_image'];

$entry_name = preg_replace("/\W/", "", $entry_name);
$entry_company = preg_replace("/\W/", "", $entry_company);

$entry_name     = htmlentities($entry_name, ENT_QUOTES, 'UTF-8');
$entry_email    = htmlentities($entry_email, ENT_QUOTES, 'UTF-8');
$entry_company  = htmlentities($entry_company, ENT_QUOTES, 'UTF-8');



/*
  error codes:
  4       2       1
  name    email   image
*/

$error_code = 0;

if ($entry_name == '') {
  $error_code += 4;
}
if ($entry_email == '' || !isValidEmail($entry_email)) {
  $error_code += 2;
}
if (empty($_FILES['entry_image']['name'])) {
  $error_code += 1;
}

if ($error_code > 0) {
  $q = '?error='.$error_code.'&entry_name='.$entry_name.'&entry_email='.$entry_email.'&entry_company='.$entry_company;
  header('Location: '.$_SERVER['HTTP_ORIGIN'].'/upload/'.$q);
  exit;
}

$store = copyImageAndSave($entry_image);

if ($store) {

  $fullpath = $store[0];
  $filename = $store[1];

  $post_title = date('Ymd_Hi_').preg_replace("/[\W_]*/", '', $entry_name);

  // create new post and attach image
  $new_post = array(
    'post_title'    => $post_title,
    'post_type'     => 'entry',
    'post_status'   => 'draft',
  );
  $new_post_id = wp_insert_post( $new_post );
  update_post_meta($new_post_id, 'wpcf-entry-name', $entry_name);
  update_post_meta($new_post_id, 'wpcf-entry-email', $entry_email);
  update_post_meta($new_post_id, 'wpcf-entry-company', $entry_company);
  $wp_filetype = wp_check_filetype($fullpath, null);

  $attachment = array(
    'post_mime_type'  => $wp_filetype['type'],
    'post_title'      => $filename,
    'post_content'    => '',
    'post_status'     => 'inherit'
  );

  $attach_id = wp_insert_attachment( $attachment, $fullpath, $new_post_id );
  $attach_data = wp_generate_attachment_metadata( $attach_id, $fullpath );
  wp_update_attachment_metadata( $attach_id, $attach_data );
  set_post_thumbnail( $new_post_id, $attach_id );

  wp_redirect( get_permalink( $new_post_id ));


  header('Location: '.$_SERVER['HTTP_ORIGIN'].'/gallery/?success');
  exit();

} else {
  $error_code = 8;
  $q = '?error='.$error_code.'&entry_name='.$entry_name.'&entry_email='.$entry_email.'&entry_company='.$entry_company;
  header('Location: '.$_SERVER['HTTP_ORIGIN'].'/upload/'.$q);
  exit;
}