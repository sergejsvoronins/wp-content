<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title style="font-family: Optima, sans-serif" color="#dcbbbb"><?php echo get_bloginfo('name', 'display'); ?></title>
</head>

<body style="font-family: Tahoma, sans-serif; line-height:125%; color:#663704; text-decoration:none;" <?php echo is_rtl() ? 'rightmargin' : 'leftmargin'; ?>="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <table width="100%" id="outer_wrapper">
        <tr>
            <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
            <td width="600" height="300">
                <div id="wrapper" dir="<?php echo is_rtl() ? 'rtl' : 'ltr'; ?>">
                    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                        <tr>
                            <td align="center" valign="top">
                                <div id="template_header_image">
                                    <?php
                                    $img = get_option('woocommerce_email_header_image');

                                    if ($img) {
                                        echo '<p style="margin-top:0;"><img src="' . esc_url($img) . '" alt="' . esc_attr(get_bloginfo('name', 'display')) . '" /></p>';
                                    }
                                    ?>
                                </div>
                                <table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_container">
                                    <tr>
                                        <td align="center" valign="top">
                                            <!-- Header -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_header">
                                                <tr>
                                                    <td id="header_wrapper">
                                                        <h1 style="font-family: Optima, sans serif; text-align:center;"><?php echo esc_html($email_heading); ?></h1>
                                                    </td>

                                                </tr>
                                            </table>
                                            <!-- End Header -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <!-- Body -->
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="template_body">
                                                <tr>
                                                    <td valign="top" id="body_content">
                                                        <!-- Content -->
                                                        <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                            <tr>
                                                                <td valign="top">