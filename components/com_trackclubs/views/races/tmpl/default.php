<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * Races View
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>

<script type="text/javascript">
    $(function () {
            $('.footable').footable();
    });
</script>

<div id="trackclubs-races">
<!--begin race table-->      
    <table class="footable ttcfootable">
        <thead>
<!--            <tr>
                Headers
                <th colspan="7">Race Schedule</th>
            </tr>-->
            <tr>
                <th data-toggle="true" align="center"><strong>Event</strong</th>
                <th data-hide="phone" align="center"><strong>Grand Prix Race</strong</th>
                <th data-hide="phone" align="center"><strong>Certified Course</strong</th>
                <th data-hide="phone" align="center"><strong>Race Director</strong</th>
                <th align="center"><strong>Distance</strong</th>
                <th align="center"><strong>Location</strong</th>
                <th align="center"><strong>Date</strong</th>
            </tr>
        </thead>
        <tbody>
            <!--begin loop-->
            <?php foreach($this->items as $item){ ?>
            <?php
            if (date("n", strtotime($item->datetime))<=6){
                $item->season="Spring";
            }
            else{
                $item->season="Fall";
            }
            ?>
            <?php if(empty($previous->datetime)){ ?>
                <tr>
                    <td colspan="7" align="center">
                        <strong><?php echo $item->season." ".date("Y", strtotime($item->datetime)); ?></strong>
                    </td>
                </tr>
            <?php } 
            else {?>
                <?php if ( ($item->season != $previous->season) or (date("Y", strtotime($previous->datetime)) != date("Y", strtotime($item->datetime)))) { ?>
                <tr>
                    <td colspan ="7" align="center">
                        <strong><?php echo $item->season." ".date("Y", strtotime($item->datetime)); ?></strong>
                    </td>
                </tr> 
                <?php } ?>

            <?php } ?>
            <?php
            if(empty($item->alias)){
                    $item->alias = $item->title;
            };
            $item->alias = JFilterOutput::stringURLSafe($item->alias);
            $item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=race&id='.$item->id.':'.$item->alias);
            ?>
            <tr>
                <td align="center"><a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></td>
                <td align="center"><?php if ($item->grandprix == 1){echo "Yes";} else {echo "No";} ; ?></td>
                <td align="center"><?php if ($item->certified == 1){echo "Yes";} else {echo "No";} ; ?></td>
                <td align="center"><?php echo $item->director; ?></td>
                <td align="center"><?php echo $item->distance; ?></td>
                <td align="center"><?php echo $item->city; ?></td>
                <td align="center"><?php echo date("m/d/y", strtotime($item->datetime)); ?></td>
            </tr>
            <?php $previous = $item; ?>
            <!--end loop-->
            <?php }; ?>
            <tr>
                <td colspan="7">
                    <?php echo $this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tbody>
    </table>
    <!--end race table-->
</div>
