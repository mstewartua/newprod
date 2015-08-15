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

$edit = "index.php?option=com_trackclubs&view=groupruns&task=grouprun.edit";
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
			<?php echo $item->runname; ?> - (<a href="<?php echo $edit; ?>&id=<?php echo $item->id; ?>"><?php echo 'Edit'; ?></a>)
			<?php if ($item->checked_out){ ?>
				<?php echo JHtml::_('jgrid.checkedout', $i, $userChkOut->name, $item->checked_out_time, 'groupruns.', $canCheckin); ?>
			<?php } ?>
		</td>
		<td>
			<?php switch ($item->runday){
                            case 1:
                                echo "Sunday";
                                break;
                            case 2:
                                echo "Monday";
                                break;
                            case 3:
                                echo "Tuesday";
                                break;
                            case 4:
                                echo "Wednesday";
                                break;
                            case 5:
                                echo "Thursday";
                                break;
                            case 6:
                                echo "Friday";
                                break;
                            case 7:
                                echo "Saturday";
                                break;
                        } ?>
		</td>
		<td>
			<?php echo $item->runtime; ?>
		</td>
		<td>
			<?php echo $item->runlocation; ?>
		</td>
		<td>
			<?php echo $item->runaddress; ?>
		</td>
		<td>
			<?php echo $item->rundescription; ?>
		</td>
		<td>
			<?php echo $item->runcontact; ?>
		</td>
		<td>
			<?php echo $item->contactemail; ?>
		</td>
		<td>
			<?php if($item->active==1){echo 'Yes';} else{echo 'No';} ?>
		</td>
	</tr>
<?php } ?>