<?php
/*------------------------------------------------------------------------
# view.html.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla view library
jimport('joomla.application.component.view');
/**
 * HTML Results View class for the TrackClub Component
 */
class TrackclubsViewresults extends JViewLegacy
{
	// Overwriting JView display method
	function display($tpl = null)
	{
		// Assign data to the view
		$this->items = $this->get('Items');
		// Check for errors.
		if (count($errors = $this->get('Errors'))){
			JError::raiseError(500, implode('<br />', $errors));
			return false;
		};
		// Display the view
		parent::display($tpl);
	}
}
?>