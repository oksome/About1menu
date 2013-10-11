<?php
/*
Plugin Name: About 1 menu
Version: 2.5.b
Description: Add About as menu level 1
Plugin URI: http://piwigo.org/ext/extension_view.php?eid=478
Author: ddtddt
Author URI:http://piwigo.org/ext/extension_view.php?eid=478
*/

if (!defined('PHPWG_ROOT_PATH')) die('Hacking attempt!');

define('A1M_DIR' , basename(dirname(__FILE__)));
define('A1M_PATH' , PHPWG_PLUGINS_PATH . A1M_DIR . '/');

add_event_handler('blockmanager_register_blocks', 'register_a1m_menubar_blocks');
add_event_handler('blockmanager_apply', 'a1m_apply');

function register_a1m_menubar_blocks( $menu_ref_arr )
{
  $menu = & $menu_ref_arr[0];
  if ($menu->get_id() != 'menubar')
    return;
  $menu->register_block( new RegisteredBlock( 'mbAbout', 'About', 'A1M'));
}

function a1m_apply($menu_ref_arr)
{
  global $template;

 $menu = & $menu_ref_arr[0];
 
     // Envoi des données au template
	    $template->assign	(
		array	(
        'A1MTITLE'     => l10n('About Piwigo'),
        'A1MNAME'      => l10n('About'),
        'A1MURL' => get_root_url().'about.php',
				)			);

   
    if (($block = $menu->get_block( 'mbAbout' )) != null) {
	$template->set_template_dir(A1M_PATH.'template/');
	$block->template = 'menubar_about.tpl';
    }
}






?>