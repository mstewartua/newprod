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
	<p><strong>Athleteid</strong>: <?php echo $this->item->athleteid; ?></p>
	<p><strong>Race ID</strong>: <?php echo $this->item->raceid; ?></p>
	<p><strong>Time</strong>: <?php echo $this->item->time; ?></p>
	<p><strong>Dnf</strong>: <?php echo $this->item->dnf; ?></p>
	<p><strong>Placeoverride</strong>: <?php echo $this->item->placeoverride; ?></p>
	<p><strong>Timepredecessor</strong>: <?php echo $this->item->timepredecessor; ?></p>
	<p><strong>Hidepace</strong>: <?php echo $this->item->hidepace; ?></p>
</div>