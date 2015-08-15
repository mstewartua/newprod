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
<div id="trackclubs-athletes">
	<?php foreach($this->items as $item){ ?>
		<?php
		if(empty($item->alias)){
			$item->alias = $item->firstname;
		};
		$item->alias = JFilterOutput::stringURLSafe($item->alias);
		$item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=athlete&id='.$item->id.':'.$item->alias);
		?>
		<p><strong>Firstname</strong>: <a href="<?php echo $item->linkURL; ?>"><?php echo $item->firstname; ?></a></p>
		<p><strong>Lastname</strong>: <?php echo $item->lastname; ?></p>
		<p><strong>Age</strong>: <?php echo $item->age; ?></p>
		<p><strong>Gender</strong>: <?php echo $item->gender; ?></p>
		<p><strong>Active</strong>: <?php echo $item->active; ?></p>
		<p><strong>Ttcnum</strong>: <?php echo $item->ttcnum; ?></p>
		<p><strong>Link URL</strong>: <a href="<?php echo $item->linkURL; ?>">Go to page</a> - <?php echo $item->linkURL; ?></p>
		<br /><br />
	<?php }; ?>
        <?php echo $this->pagination->getListFooter(); ?>
</div>
