<?php
/*------------------------------------------------------------------------
# groupruns.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import the Joomla modellist library
jimport('joomla.application.component.modellist');
/**
 * Groupruns Model
 */
class TrackclubsModelgroupruns extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		// Select some fields
		$query->select('*');
		// From the trackclubs_grouprun table
		$query->from('#__trackclubs_grouprun');
                $query->where('#__trackclubs_grouprun.active = 1');
                $query->order('#__trackclubs_grouprun.runday', '#__trackclubs_grouprun.runtime');

		return $query;
	}
}
?>