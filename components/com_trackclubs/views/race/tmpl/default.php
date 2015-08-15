<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Race View
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

?>
<div id="trackclubs-content">
    
<table class="racetable">
<!--<table align="center" width="90%" border="1" cellspacing="1" cellpadding="1">-->
    <thead>
    <tr>
        <th colspan="2"><h2><?php echo $this->item->title; ?></h2></th>
    </tr>
    <?php if ($this->item->grandprix == 1){ ?>
        <tr>
            <th colspan="2" class="center">
                <img title="This run is part of the Tuscaloosa Track Club Grand Prix Series. You get points for this race!" alt="This run is part of the Tuscaloosa Track Club Grand Prix Series. You get points for this race!" src="components/com_trackclubs/assets/img/gp.JPG">

            </th>
        </tr>
    <?php } ?>
        <tr>
        <th colspan="2">
            <?php switch ($this->item->profile){
                case "1": ?>
                    <img title="This run is mostly if not all flat" alt="This run is mostly if not all flat" src="components/com_trackclubs/assets/img/flat2.JPG"> <?php break; ?>
                <?php case "2": ?>
                    <img title="This run is hilly.." alt="This run is hilly.." src="components/com_trackclubs/assets/img/hilly2.JPG"> <?php break; ?>
                <?php case "3": ?>
                    <img title="This run is all downhill" alt="This run is all downhill" src="components/com_trackclubs/assets/img/downhill2.JPG"> <?php break; ?>
                <?php case "4": ?>
                    <img title="This run is all uphill" alt="This run is all uphill" src="components/com_trackclubs/assets/img/uphill2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->route){
                case 1: ?>
                    <img title="This run is a loop route" alt="This run is a loop route" src="components/com_trackclubs/assets/img/loop.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This run is a true out and back route" alt="This run is a true out and back route" src="components/com_trackclubs/assets/img/outandback.JPG"> <?php break; ?>
                <?php case 3: ?>
                    <img title="This run starts at one place and ends at another" alt="This run starts at one place and ends at another" src="components/com_trackclubs/assets/img/straight.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->terrain){
                case 1: ?>
                    <img title="This run is on a paved surface" alt="This run is on a paved surface" src="components/com_trackclubs/assets/img/paved2.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This run is offroad" alt="This run is offroad" src="components/com_trackclubs/assets/img/dirt2.JPG"> <?php break; ?>
                <?php case 3: ?>
                    <img title="This run is partly offroad and on paved surface" alt="This run is partly offroad and on paved surface" src="components/com_trackclubs/assets/img/half2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->aid){
                case 1: ?>
                    <img title="This run offers water stations and/or medical assistance if needed" alt="This run offers water stations and/or medical assistance if needed" src="components/com_trackclubs/assets/img/aid2.JPG"> <?php break; ?>
                <?php case 2: ?>
                    <img title="This does not offer water stations or medical assistance but people will be there to help. Just nothing official" alt="This does not offer water stations or medical assistance but people will be there to help. Just nothing official" src="components/com_trackclubs/assets/img/noaid2.JPG"> <?php break; ?>
            <?php } ?>
            <?php switch ($this->item->prize){
                case 1: ?>
                    <img title="This run has doors prizes and/or monetary awards for winners!" alt="This run has doors prizes and/or monetary awards for winners!" src="components/com_trackclubs/assets/img/money.JPG"> <?php break; ?>
            <?php } ?>
            <?php if (($this->item->route == 0) && ($this->item->terrain == 0) && ($this->item->aid == 0) && ($this->item->prize == 0)) {
                echo "We don't have any information on this race.";
            } ?>
        </th>
    </thead>
    <tbody>
    </tr>
    <tr>
        <td class="racelabel"><strong>City</strong>:</td>
        <td><?php echo $this->item->city . ", " . $this->item->state ; ?></td>
    </tr>
    <tr>
        <td><strong>Date</strong>:</td>
        <td><?php echo date("l F j, Y g:i a", strtotime($this->item->datetime)); ?></td>
    </tr>
    <tr>
        <td><strong>Distance</strong>:</td>
        <td><?php echo $this->item->distance; ?></td>
    </tr>
    <tr>
        <td><strong>Director</strong>:</td>
        <td><?php echo $this->item->director; ?></td>
    </tr>
    <?php if(!empty($this->item->applicationfilename)){ ?>
    <tr>
        <td><strong>Application</strong>:</td> 
        <td><a href="images/apps/<?php echo $this->item->applicationfilename; ?>"/><?php echo $this->item->applicationfilename; ?></a></td>
    <?php } ?>
    </tr>
    <tr>
        <td><strong>Course Map</strong>:</td>
        <td><a href="images/maps/<?php echo $this->item->certifiedmap; ?>"/><?php echo $this->item->certifiedmap; ?></a></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Entry Fees</strong>:</td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $this->item->fees; ?></td>
    </tr>
    <tr>
        <td colspan="2"><strong>Info</strong>:</td>
    </tr>
    <tr>
        <td colspan="2"><?php echo $this->item->info; ?></td>
    </tr>
    </tbody>
</table>
</div>