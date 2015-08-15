<?php
/*------------------------------------------------------------------------
# workouttype.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * Workouttypes Controller Workouttype
 */
class TrackclubsControllerworkouttype extends JControllerForm
{
	public function __construct($config = array())
	{
		$this->view_list = 'workouttypes'; // safeguard for setting the return view listing to the main view.
		parent::__construct($config);
	}

	/**
	 * Function that allows child controller access to model data
	 * after the data has been saved.
	 * 
	 * @param   JModel  &$model     The data model object.
	 * @param   array   $validData  The validated data.
	 * 
	 * @return  void
	 * 
	 * @since   11.1
	 */
	protected function postSaveHook(JModelLegacy &$model, $validData = array())
	{
		// Get a handle to the Joomla! application object
		$application = JFactory::getApplication();

		$date = date('Y-m-d H:i:s');
		if($validData['date_created'] == '0000-00-00 00:00:00'){
			$data['date_created'] = $date;
		}
		$data['date_modified'] = $date;

		$user = JFactory::getUser();
		if($validData['user_created'] == 0){
			$data['user_created'] = $user->id;
		}
		$data['user_modified'] = $user->id;

		$model->save($data);

	}

}
?>