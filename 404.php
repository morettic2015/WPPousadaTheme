<?php
/**
 * The template for displaying 404 pages
 *
 */

$url = get_site_url();
wp_redirect($url,301);
exit;