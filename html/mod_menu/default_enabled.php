<?php
/**
 * @version		$Id:mod_menu.php 2463 2006-02-18 06:05:38Z $
 * @package		Joomla.Administrator
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

$shownew 	= true;

//
// Help Submenu
//
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP')), true
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_JOOMLA'), 'index.php?option=com_admin&view=help', 'class:help')
	);
	$menu->addSeparator();

	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_SUPPORT_FORUM'), 'http://forum.joomla.org', 'class:help-forum', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_DOCUMENTATION'), 'http://docs.joomla.org', 'class:help-docs', false, '_blank')
	);
	$menu->addSeparator();
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_LINKS'), 'class:weblinks'), true
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_EXTENSIONS'), 'http://extensions.joomla.org', 'class:help-jed', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_TRANSLATIONS'), 'http://community.joomla.org/translations.html', 'class:help-trans', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_RESOURCES'), 'http://resources.joomla.org', 'class:help-jrd', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_COMMUNITY'), 'http://community.joomla.org', 'class:help-community', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_SECURITY'), 'http://developer.joomla.org/security.html', 'class:help-security', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_DEVELOPER'), 'http://developer.joomla.org', 'class:help-dev', false, '_blank')
	);
	$menu->addChild(
	new JMenuNode(JText::_('MOD_MENU_HELP_SHOP'), 'http://shop.joomla.org', 'class:help-shop', false, '_blank')
	);
	$menu->getParent();
	$menu->getParent();
}
