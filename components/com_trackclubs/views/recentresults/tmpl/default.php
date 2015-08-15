<!--<link rel="stylesheet" href="components/com_trackclubs/assets/css/responsive-tables.css">
<script src=components/com_trackclubs/assets/js/responsive-tables.js"></script>-->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link href="components/com_trackclubs/assets/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css"/>
<link href="components/com_trackclubs/assets/css/footable.standalone.css" rel="stylesheet" type="text/css"/>
<script src="components/com_trackclubs/assets/js/footable.js?v=2-0-1"></script>-->

<?php
/*------------------------------------------------------------------------
# default.php - TrackClub Component
# ------------------------------------------------------------------------
# author    Michael
# copyright Copyright (C) 2014. All Rights Reserved
# license   GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html
# website   tuscaloosatrackclub.com
 * recent results
-------------------------------------------------------------------------*/

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filter.output');
?>
<script type="text/javascript">
    $(function () {
        $('.footable').footable();
    });
//    $(function () {
//        $('footable').footable({
//             toggleHTMLElement: '<span><img src="components/com_trackclubs/assets/img/plus.png" class="footable-toggle footable-expand" border="0" alt="Expand">'
//             + '<img src="components/com_trackclubs/assets/img/minus.png" class="footable-toggle footable-contract" border="0" alt="Contract"></span>'
//    });
</script>

<div id="trackclubs-recentresults">
<!--begin race table-->      
    <table class="footable ttcfootable">
        <thead>
<!--            <tr>
                Headers
                <th colspan="8">Race Schedule</th>
            </tr>-->
            <tr>
                <th data-toggle="true"><strong>Event</strong</td>
                <th data-hide="phone"><strong>Grand Prix Race</strong</td>
                <th data-hide="phone"><strong>Certified Course</strong</td>
                <th data-hide="phone,tablet"><strong>Race Director</strong</td>
                <th align="center"><strong>Distance</strong</td>
                <th align="center"><strong>Location</strong</td>
                <th align="center"><strong>Date</strong</td>
                <!--<th data-hide="all" align="center"><strong>Complete</strong</td>-->
            </tr>
        </thead>
        <!--begin loop-->
        <?php foreach($this->items as $item){ ?>
        <tbody>
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
        $item->linkURL = JRoute::_('index.php?option=com_trackclubs&view=raceresult&id='.$item->id.':'.$item->alias);
        ?>
        <tr>
            <td align="center"><a href="<?php echo $item->linkURL; ?>"><?php echo $item->title; ?></td>
            <td align="center"><?php if ($item->grandprix == 1){echo "Yes";} else {echo "No";} ; ?></td>
            <td align="center"><?php if ($item->certified == 1){echo "Yes";} else {echo "No";} ; ?></td>
            <td align="center"><?php echo $item->director; ?></td>
            <td align="center"><?php echo $item->distance; ?></td>
            <td align="center"><?php echo $item->city; ?></td>
            <td align="center"><?php echo date("m/d/y", strtotime($item->datetime)); ?></td>
            <!--<td align="center"><?php echo $item->complete; ?></td>-->
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
