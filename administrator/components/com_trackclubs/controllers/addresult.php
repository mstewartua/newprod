<?php
/*------------------------------------------------------------------------
# race.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * add result controller
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla controllerform library
jimport('joomla.application.component.controllerform');

/**
 * Races Controller Race
 */
class TrackclubsControlleraddresult extends JControllerForm
{
	public function __construct($config = array())
	{
//		$this->view_list = 'races'; // safeguard for setting the return view listing to the main view.
		$this->view_list = 'chooserace'; // safeguard for setting the return view listing to the main view.
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
        
        //load button function
        public function load($validData = array()){
//        public function load(){
            echo "You did it!";
            $mainframe =& JFactory::getApplication();
 
            
            $input = JFactory::getApplication()->input;
            
            $fooValues = $input->getArray(array(
                'jform' => array(
                    'resultsfilename' => 'string',
                    'id' => 'int'
                )
            ));
            
            $resultfilename = $fooValues['jform']['resultsfilename'];
            $id = $fooValues['jform']['id'];
//            foreach($fooValues as $fooarray){
//                foreach($fooarray as $value){
//                    echo $value." ";
//                }
//            }
            // store the variable that we would like to keep for next time
            // function syntax is setUserState( $key, $value );
//            $mainframe->setUserState( "option.resultsfilename", $resultfilename);
//            echo "</br>".$resultfilename;
//            echo "</br>".$id;
            
 
        // Redirect to the list screen.
        $this->setRedirect(JRoute::_('index.php?option=com_trackclubs&view=addresult&layout=load&id='.$id.'&file='.$resultfilename, false));
        }
        
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
//                $data['complete'] = 1;
                
                //start xml import code
                $db = JFactory::getDbo();                
                
                $application->enqueueMessage('Filename: '.$validData['resultsfilename'], 'notice');
                
                if (file_exists('../images/results/'.$validData['resultsfilename'])) {
                    $racexml = simplexml_load_file('../images/results/'.$validData['resultsfilename']);
                    foreach($racexml->racer as $result){
                        $racecount++;
    //                    //check if the athlete is already in the db
                        $query = $db->getQuery(true);
                        $query->select('id, firstname, lastname, age, gender');
                        $query->from('#__trackclubs_athlete');
                        $query->where('firstname = "'.$result->fname.'" AND lastname ="'.$result->lname.'" AND age = "'.$result->age.'" AND gender = "'.$result->gender.'"');
                        $db->setQuery($query);
                        $querydata = $db->loadObject();
    //                    echo "<br>".$result->fname." ".$result->lname." ".$result->gender." ".$result->age." ".
    //                            $result->time." ";
                        if (empty($querydata->id)){ // didn't find the athlete, add them to the db
    //                        echo "New Record ";

                            $athquery = $db->getQuery(true);
                            $columns = array('firstname', 'lastname', 'age', 'gender');
                            $values = array($db->quote($result->fname), $db->quote($result->lname), $result->age, $db->quote($result->gender));
                            $athquery->insert('#__trackclubs_athlete');
                            $athquery->columns($db->quoteName($columns));
                            $athquery->values(implode(',', $values));
    
                            $db->setQuery($athquery);
                            $db->query();

                            //add the results to the db
    //                        echo $db->insertid();

                            $resquery = $db->getQuery(true);
                            $rescolumns = array('athleteid', 'raceid', 'time');
                            $resvalues = array($db->insertid(), $validData['id'], $db->quote($result->time));
                            $resquery->insert('#__trackclubs_result');
                            $resquery->columns($db->quoteName($rescolumns));
                            $resquery->values(implode(',', $resvalues));
    
                            $db->setQuery($resquery);
                            $db->query();
                        }
                        else { //found the athlete
    //                        echo $data->id;
                            //add the results to the db
                            $resquery = $db->getQuery(true);
                            $rescolumns = array('athleteid', 'raceid', 'time');
                            $resvalues = array($querydata->id, $validData['id'], $db->quote($result->time));
                            $resquery->insert('#__trackclubs_result');
                            $resquery->columns($db->quoteName($rescolumns));
                            $resquery->values(implode(',', $resvalues));
    //
                            $db->setQuery($resquery);
                            $db->query();

    //                        echo " ".$db->insertid()." ".$result->time;
                        }

                    };
                    $data['complete'] = 1;
                } else {
                    $application->enqueueMessage('Failed to load XML', 'error');
                    $data['complete'] = 0;
                }
                
                
//                $application->enqueueMessage($validData['resultsfilename'], 'notice');
//                $application->enqueueMessage($racexml->racer[0]->fname, 'notice');
                
//                $application->enqueueMessage('Before loop', 'notice');
//                $application->enqueueMessage('Model '.$model->resultfile, 'notice');
              
                $racercount = 0;

//                $application->enqueueMessage($racecount, 'notice');
//                $application->enqueueMessage('after loop', 'notice');
                
                
                
                
                $model->save($data);
                
                
                
//                $data['complete'] = $validData['id'];

		// Delete Image Checked
//		if(array_key_exists('applicationfilename_delete', $_POST)){
//			$data['applicationfilename'] = ''; // set image to nothing in database
//			// Delete Image Entirely Check
//			$db = JFactory::getDBO();
//			$query = $db->getQuery(true)->select('applicationfilename')->from('#__trackclubs_race')->where('id="' . $validData['id'] . '"');
//			$db->setQuery((string)$query);
//			$applicationfilename = $db->loadResult();
//			if($applicationfilename){
//				$query = $db->getQuery(true)->select('CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END')->from('#__trackclubs_race')->where('applicationfilename="' . $applicationfilename . '" AND id!="' . $validData['id'] . '"');
//				$db->setQuery((string)$query);
//				$using = $db->loadResult();
//				if($using == 0){ // free to delete
//					// Include file system helpers
//					jimport('joomla.filesystem.file');
//					jimport('joomla.filesystem.folder');
//					$full_image = JPATH_SITE . DS . 'images' . DS . 'com_trackclubs' . DS . $applicationfilename;
//					$thum_image = JPATH_SITE . DS . 'images' . DS . 'com_trackclubs' . DS . 'thumb' . DS . $applicationfilename;
//					JFile::delete($thum_image);
//					if(JFile::delete($full_image)){
//						// Add a message to the message queue
//						$application->enqueueMessage('Image has been deleted!', 'notice');
//					} else {
//						// Add a message to the message queue
//						$application->enqueueMessage('Image could not be deleted, but was removed from this item.', 'error');
//					}
//				} else {
//					// Add a message to the message queue
//					$application->enqueueMessage('Image has been removed from this item, but can not be deleted because it is being used elsewhere.', 'notice');
//				}
//			}
//		}

		// Upload Image
//		$file = JRequest::getVar('jform', array(), 'files', 'array');
//		if($file['name']['applicationfilename']){
//			$info = TrackclubsHelper::imageUpload($file, $data, 'applicationfilename');
//			if($info['error'] == 0){
//				$data['applicationfilename'] = $info['applicationfilename'];
//			} else {
//				// Add a message to the message queue
//				$application->enqueueMessage($info['msg'], 'error');
//			}
//		}

		

	}

}
?>