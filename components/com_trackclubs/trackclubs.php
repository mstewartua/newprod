<?php
/*------------------------------------------------------------------------
# trackclubs.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Added for Joomla 3.0
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
};

// Set the component css/js
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_trackclubs/assets/css/trackclubs.css');
$document->addScript('components/com_trackclubs/assets/js/trackclubs.js');

//responsive table
$document->addStyleSheet('components/com_trackclubs/assets/css/responsive-tables.css');
$document->addScript('components/com_trackclubs/assets/js/responsive-tables.js');

//footable
$document->addStyleSheet('components/com_trackclubs/assets/css/footable.core.css?v=2-0-1"');
$document->addStyleSheet('components/com_trackclubs/assets/css/footable.standalone.css');
$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"');
$document->addScript('components/com_trackclubs/assets/js/footable.js?v=2-0-1');
$document->addScript('components/com_trackclubs/assets/js/footable.filter.js?v=2-0-1');

// Require helper file
JLoader::register('TrackclubsHelper', dirname(__FILE__) . DS . 'helpers' . DS . 'trackclubs.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Trackclubs
$controller = JControllerLegacy::getInstance('Trackclubs');

// Perform the request task
$controller->execute(JRequest::getCmd('task'));

// Redirect if set by the controller
$controller->redirect();
?>