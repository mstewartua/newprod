<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>
<div id="trackclubs-results">
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->athleteid;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=result&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Athleteid</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->athleteid; ?></a></p>
		<!--<p><strong>Race Name</strong>:--> 
                    //<?php 
//                    $raceModel = new TrackclubsModelrace();
//                    $race = $raceModel->getItem($item->raceid);
//                    echo $race->title;
//                    ?>
                <!--</p>-->
		<p><strong>Race ID</strong>: <?php echo $item->raceid; ?></p>
		<p><strong>Time</strong>: <?php echo $item->time; ?></p>
		<p><strong>Dnf</strong>: <?php echo $item->dnf; ?></p>
		<p><strong>Placeoverride</strong>: <?php echo $item->placeoverride; ?></p>
		<p><strong>Timepredecessor</strong>: <?php echo $item->timepredecessor; ?></p>
		<p><strong>Hidepace</strong>: <?php echo $item->hidepace; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
</div>
