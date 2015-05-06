<?php
/**
 * Template name: Upload
 */

get_header();

// capture errors and fields
$error = '';
if (isset($_REQUEST['error']) && $_REQUEST['error'] != '') {
    $error = $_REQUEST['error'];
}
$entry_name = '';
if (isset($_REQUEST['entry_name']) && $_REQUEST['entry_name'] != '') {
    $entry_name = $_REQUEST['entry_name'];
    $entry_name = preg_replace("/\W/", "", $entry_name);
}
$entry_email = '';
if (isset($_REQUEST['entry_email']) && $_REQUEST['entry_email'] != '') {
    $entry_email = $_REQUEST['entry_email'];
    $entry_email = preg_replace("/\W/", "", $entry_email);
}
$entry_company = '';
if (isset($_REQUEST['entry_company']) && $_REQUEST['entry_company'] != '') {
    $entry_company = $_REQUEST['entry_company'];
    $entry_company = preg_replace("/\W/", "", $entry_company);
}
// $entry_checkbox = '';
// if (isset($_REQUEST['entry_checkbox']) && $_REQUEST['entry_checkbox'] != '') {
//     $entry_checkbox = $_REQUEST['entry_checkbox'];
// }



$content = $post->post_content;
echo wpautop($content);

/*
  error codes:
  4       2       1
  name    email   image
*/

?>
<div class="upload_form">
<?php 
    if ($error != '') {
    echo '<div class="errors"><div class="error_messages">';

    switch($error) {
        case 1:
            echo 'Please choose an image.';
            break;
        case 2:
            echo 'Please enter a valid email address.';
            break;
        case 3:
            echo 'Please enter a valid email address and choose an image.';
            break;
        case 4:
            echo 'Please enter your name.';
            break;
        case 5:
            echo 'Please enter your name and choose an image.';
            break;
        case 6:
            echo 'Please enter your name and a valid email.';
            break;
        case 7:
            echo 'Please enter your name, a valid email and choose an image.';
            break;
        case 8:
            echo 'There was a problem with your image.';
            break;
    }

    echo '</div></div>';
}
?>
  <form id="uploadForm" method="post" enctype='multipart/form-data' action="/process">

    <div class="fieldRow clearfix">
        <label for="entry_name"><span>Name</span></label>
        <input type="text" name="entry_name" id="entry_name" value="<?php echo $entry_name; ?>" />
    </div>

    <div class="fieldRow clearfix">
        <label for="entry_email"><span>Email</span></label>
        <input type="text" name="entry_email" id="entry_email" value="<?php echo $entry_email; ?>" />
    </div>

    <div class="fieldRow clearfix">
        <label for="entry_company">Company</label>
        <input type="text" name="entry_company" id="entry_company" value="<?php echo $entry_company; ?>" /><br />
    </div>

    <div class="fieldRow clearfix">
        <label for="entry_image"><span>Image</span></label>
        <input type="file" name="entry_image" id="entry_image" value="" />
    </div>

    <div class="fieldRow checkbox clearfix">
        <input type="checkbox" name="entry_checkbox" id="entry_checkbox" />
        <label for="entry_checkbox"><span>I have read and accepted the <a href="/terms" target="_blank">Terms &amp; Conditions</a></span></label>
    </div>

    <input class="submit_button" type="image" alt="Upload Now" src="<?php echo $cdn; ?>/img/upload-now.png" />
    <!-- <span>* required</span> -->

  </form>
</div>

<p class="small"><img src="<?php echo $cdn; ?>/img/cartoon-network.png" alt="Cartoon Network"> <img src="<?php echo $cdn; ?>/img/adventure-time.png" alt="Adventure Time"></p>

<script type="text/javascript" src="<?php echo $cdn; ?>/scripts/jquery.ezmark.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready( function () {
        jQuery('#uploadForm').submit(function ( event ) {
            var error = 0;
            var entry_name     = jQuery('#entry_name').val();
            var entry_email    = jQuery('#entry_email').val();
            var entry_company  = jQuery('#entry_company').val();
            var entry_image    = jQuery('#entry_image').val();

            if (entry_name     == '') { error++; }
            if (entry_email    == '') { error++; }
            if (entry_company  == '') { error++; }
            if (entry_image    == '') { error++; }
            if (jQuery('#entry_checkbox').prop('checked') == false) { error++; }

            if (error==0){
                return true;
            } else {
                alert("Please make sure you have completed all the fields.");
                return false;
            }
        });
    });
    jQuery('input[type="checkbox"]').ezMark(); 

</script>
<?php get_footer();