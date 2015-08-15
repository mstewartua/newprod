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
	<p><strong>Firstname</strong>: <?php echo $this->item->firstname; ?></p>
	<p><strong>Lastname</strong>: <?php echo $this->item->lastname; ?></p>
	<p><strong>Age</strong>: <?php echo $this->item->age; ?></p>
	<p><strong>Gender</strong>: <?php echo $this->item->gender; ?></p>
	<p><strong>Active</strong>: <?php echo $this->item->active; ?></p>
	<p><strong>Ttcnum</strong>: <?php echo $this->item->ttcnum; ?></p>
</div>