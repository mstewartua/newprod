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
		<?php echo JText::_('City'); ?>
	</th>
	<th>
		<?php echo JText::_('State'); ?>
	</th>
	<th>
		<?php echo JText::_('Date Time'); ?>
	</th>
	<th>
		<?php echo JText::_('Distance'); ?>
	</th>
<!--	<th>
		<?php echo JText::_('Fees'); ?>
	</th>
	<th>
		<?php echo JText::_('Director'); ?>
	</th>
	<th>
		<?php echo JText::_('Map'); ?>
	</th>
	<th>
		<?php echo JText::_('Application File'); ?>
	</th>
	<th>
		<?php echo JText::_('Grand Prix'); ?>
	</th>
	<th>
		<?php echo JText::_('Certified'); ?>
	</th>
	<th>
		<?php echo JText::_('Map File'); ?>
	</th>
	<th>
		<?php echo JText::_('Info'); ?>
	</th>
	<th>
		<?php echo JText::_('Profile'); ?>
	</th>
	<th>
		<?php echo JText::_('Terrain'); ?>
	</th>
	<th>
		<?php echo JText::_('Route'); ?>
	</th>
	<th>
		<?php echo JText::_('Aid'); ?>
	</th>
	<th>
		<?php echo JText::_('Prize'); ?>
	</th>
	<th>
		<?php echo JText::_('Active'); ?>
	</th>
	<th>
		<?php echo JText::_('Complete'); ?>
	</th>-->
</tr>