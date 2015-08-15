<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * workouts
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>
<div id="trackclubs-workouts">
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->title;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=workout&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Title</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></a></p>
		<p><strong>Owner</strong>: <?php echo $item->owner; ?></p>
		<p><strong>Workoutdatetime</strong>: <?php echo $item->workoutdatetime; ?></p>
		<p><strong>Description</strong>: <?php echo $item->description; ?></p>
		<p><strong>Active</strong>: <?php echo $item->active; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
        Zippy!<br>
        <?php


        $racexml = simplexml_load_file('images/results/test.xml');
        $db = JFactory::getDbo();
        foreach($racexml->racer as $result){
            //check if the athlete is already in the db
            $query = $db->getQuery(true);
            $query->select('id, firstname, lastname, age, gender');
            $query->from('#__trackclubs_athlete');
            $query->where('firstname = "'.$result->fname.'" AND lastname ="'.$result->lname.'" AND age = "'.$result->age.'" AND gender = "'.$result->gender.'"');
            $db->setQuery($query);
            $data = $db->loadObject();
            echo "<br>".$result->fname." ".$result->lname." ".$result->gender." ".$result->age." ".
                    $result->time." ";
            if (empty($data->id)){ // didn't find the athlete, add them to the db
                echo "New Record ";
                
                $athquery = $db->getQuery(true);
                $columns = array('firstname', 'lastname', 'age', 'gender');
                $values = array($db->quote($result->fname), $db->quote($result->lname), $result->age, $db->quote($result->gender));
                $athquery->insert('#__trackclubs_athlete');
                $athquery->columns($db->quoteName($columns));
                $athquery->values(implode(',', $values));
                
                $db->setQuery($athquery);
                $db->query();
                // show the new athelete id
                
                //add the results to the db
                echo $db->insertid();
                
                $resquery = $db->getQuery(true);
                $rescolumns = array('athleteid', 'raceid', 'time');
                $resvalues = array($db->insertid(), 117, $db->quote($result->time));
                $resquery->insert('#__trackclubs_result');
                $resquery->columns($db->quoteName($rescolumns));
                $resquery->values(implode(',', $resvalues));
                
                $db->setQuery($resquery);
                $db->query();
            }
            else { //found the athlete
                echo $data->id;
                //add the results to the db
                $resquery = $db->getQuery(true);
                $rescolumns = array('athleteid', 'raceid', 'time');
                $resvalues = array($data->id, 117, $db->quote($result->time));
                $resquery->insert('#__trackclubs_result');
                $resquery->columns($db->quoteName($rescolumns));
                $resquery->values(implode(',', $resvalues));
                
                $db->setQuery($resquery);
                $db->query();
                
                echo " ".$db->insertid()." ".$result->time;
            }

        };
        ?>
</div>
