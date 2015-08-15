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

?>
<div id="trackclubs-content">
	<p><strong>Lastname</strong>: <?php echo $this->item->lastname; ?></p>
	<p><strong>Firstname</strong>: <?php echo $this->item->firstname; ?></p>
	<p><strong>Dob</strong>: <?php echo $this->item->dob; ?></p>
	<p><strong>Gender</strong>: <?php echo $this->item->gender; ?></p>
	<p><strong>Photoid</strong>: <?php echo $this->item->photoid; ?></p>
	<p><strong>Active</strong>: <?php echo $this->item->active; ?></p>
	<p><strong>Expirationdate</strong>: <?php echo $this->item->expirationdate; ?></p>
	<p><strong>Newmember</strong>: <?php echo $this->item->newmember; ?></p>
	<p><strong>Staff</strong>: <?php echo $this->item->staff; ?></p>
</div>