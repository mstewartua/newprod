<?php
/*------------------------------------------------------------------------
# default_body.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$edit = "index.php?option=com_trackclubs&view=athletes&task=athlete.edit";
$user = JFactory::getUser();
$userId = $user->get('id');
?>
<?php foreach($this->items as $i => $item){
	$canCheckin	= $user->authorise('core.manage', 'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
	$userChkOut	= JFactory::getUser($item->checked_out);
	?>
	<tr class="row<?php echo $i % 2; ?>">
		<td>
			<?php echo $item->id; ?>
		</td>
		<td>
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td>
			<?php echo $item->firstname; ?> - (<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo 'Edit'; ?></a>)
			<?php if ($item->checked_out){ ?>
				<?php echo JHtml::_('jgrid.checkedout', $i, $userChkOut->name, $item->checked_out_time, 'athletes.', $canCheckin); ?>
			<?php } ?>
		</td>
		<td>
			<?php echo $item->lastname; ?>
		</td>
		<td>
			<?php echo $item->age; ?>
		</td>
		<td>
			<?php echo $item->gender; ?>
		</td>
		<td>
			<?php if($item->active==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
		<td>
			<?php echo $item->ttcnum; ?>
		</td>
	</tr>
<?php } ?>