<?php
/*------------------------------------------------------------------------
# default_head.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<tr>
	<th width="5">
		<?php echo JText::_('ID'); ?>
	</th>
	<th width="20">
		<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->items); ?>);" />
	</th>
	<th>
		<?php echo JText::_('Title'); ?>
	</th>
	<th>
		<?php echo JText::_('Owner'); ?>
	</th>
	<th>
		<?php echo JText::_('WorkoutDateTime'); ?>
	</th>
	<th>
		<?php echo JText::_('Description'); ?>
	</th>
	<th>
		<?php echo JText::_('Active'); ?>
	</th>
</tr>