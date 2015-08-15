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
		<?php echo JText::_('Name'); ?>
	</th>
	<th>
		<?php echo JText::_('Day of Week'); ?>
	</th>
	<th>
		<?php echo JText::_('Time'); ?>
	</th>
	<th>
		<?php echo JText::_('Location'); ?>
	</th>
	<th>
		<?php echo JText::_('Address'); ?>
	</th>
	<th>
		<?php echo JText::_('Description'); ?>
	</th>
	<th>
		<?php echo JText::_('Contact'); ?>
	</th>
	<th>
		<?php echo JText::_('Email Address'); ?>
	</th>
	<th>
		<?php echo JText::_('Active'); ?>
	</th>
</tr>