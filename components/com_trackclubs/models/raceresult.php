<?php
/*------------------------------------------------------------------------
# race.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Race Model for Trackclubs Component
 */
class TrackclubsModelraceresult extends JModelItem
{
	/**
	 * Model context string.
	 *
	 * @var		string
	 */
	protected $_context = 'com_trackclubs.raceresult';

	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @since	1.6
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication('site');

		// Load state from the request.
		$pk = JRequest::getInt('id');
		$this->setState('race.id', $pk);
		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);
	}

	/**
	 * Method to get Race data.
	 *
	 * @param	integer	The id of the Race.
	 *
	 * @return	mixed	Menu item data object on success, false on failure.
	 */
	public function &getItem($pk = null)
	{
		// Initialise variables.
		$pk = (!empty($pk)) ? $pk : (int) $this->getState('race.id');
		if ($this->_item === null) {
			$this->_item = array();
		}
		if (!isset($this->_item[$pk])) {
			try {
				$db = $this->getDbo();
				$query = $db->getQuery(true);
				$query->select('*');
				$query->from('#__trackclubs_race');
				$query->where('id = "'.$pk.'"');
				$db->setQuery($query);
				$data = $db->loadObject();
				$this->_item[$pk] = $data;
			}
			catch (JException $e)
			{
				if ($e->getCode() == 404) {
					// Need to go thru the error handler to allow Redirect to work.
					JError::raiseError(404, $e->getMessage());
				} else {
					$this->setError($e);
					$this->_item[$pk] = false;
				}
			}
		}
                if ($this->_item[$pk]->complete==1){
                    $this->_item[$pk]->hasresults=1;
                    if (!isset($this->_item[$pk]->results)) {
                        $db = $this->getDbo();
                        $query = $db->getQuery(true);
                        $query->select('re.id, re.raceid, re.athleteid, '
                        . 're.time, re.dnf, re.placeoverride, re.timepredecessor, '
                        . 're.hidepace, re.user_created, re.user_modified, re.date_created, re.date_modified, '
                        . 're.checked_out, re.checked_out_time, a.firstname, a.lastname, a.age, a.gender, a.active');
                        $query->from('#__trackclubs_result as re');
                        $query->leftJoin('#__trackclubs_athlete as a on re.athleteid = a.id');
                        $query->where('re.raceid = "'.$pk.'"');
                        $db->setQuery($query);
                        $data = $db->loadObjectList();
                        $this->_item[$pk]->results = $data;
//                        $this->_item[$pk]->results = get('Items');
                    }
                }
                else{
                    $this->_item[$pk]->hasresults=0;
                }

		return $this->_item[$pk];
	}
        
        protected function buildQuery(){
            
        }
        
        protected function buildWhere(&$query){
            
        }

}
?>