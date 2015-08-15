<?php
/*------------------------------------------------------------------------
# results.php - TrackClub Component
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
 * Results Model
 */
class TrackclubsModelresults extends JModelList
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
//		$query->select('*');
		// From the trackclubs_result table
//		$query->from('#__trackclubs_result as r');
                
                $query->select('re.id, re.raceid, re.athleteid, ra.title, ra.distance, '
                        . 'ra.datetime, re.time, re.dnf, re.placeoverride, re.timepredecessor, '
                        . 're.hidepace, re.user_created, re.user_modified, re.date_created, re.date_modified, '
                        . 're.checked_out, re.checked_out_time, a.firstname, a.lastname, a.age, a.gender, a.active');
                $query->from('#__trackclubs_result as re');
                $query->innerJoin('#__trackclubs_race as ra on re.raceid = ra.id');
                $query->innerJoin('#__trackclubs_athlete as a on re.athleteid = a.id');

		return $query;
	}
        
        protected function buildQuery() {
            $db = JFactory::getDbo();
            $query = $db->getQuery(TRUE);
            //SELECT re.id, re.raceid, re.athleteid, ra.title, ra.distance, ra.datetime, re.time, re.dnf, re.placeoverride, re.timepredecessor, re.hidepace, re.user_created, re.user_modified, re.date_created, re.date_modified, re.checked_out, re.checked_out_time, a.firstname, a.lastname, a.age, a.gender, a.active
            $query->select('re.id, re.raceid, re.athleteid, ra.title, ra.distance, '
                    . 'ra.datetime, re.time, re.dnf, re.placeoverride, re.timepredecessor, '
                    . 're.hidepace, re.user_created, re.user_modified, re.date_created, re.date_modified, '
                    . 're.checked_out, re.checked_out_time, a.firstname, a.lastname, a.age, a.gender, a.active');
            $query->from('#__trackclubs_result as re');
            $query->innerJoin('__trackclubs_race as ra on re.raceid = ra.id');
            $query->innerJoin('__trackclubs_athlete as a on re.athleteid = a.id');
        }
        
        protected function buildWhere(&$query){
            if(is_numeric($this->raceid)){
                $query->where('r.raceid = '. (int) $this->raceid);
            }
            return $query;
        }
}
?>