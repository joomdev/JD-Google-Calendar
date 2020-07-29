<?php
/*-------------------------------------------------------------------------------
# JD Google Calendar module for Joomla 3.x v2.1.6
# -------------------------------------------------------------------------------
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
--------------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die('Restricted access');
$document = JFactory::getDocument();
$path			= $params->get('path');
?>
<?php if ($calendarStyle == "1") : ?>
<style>
.gcf-item-title {color:<?php echo $params->get('titleColor') ?>; text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important;}
</style>
<div class="container" style="width:<?php echo $params->get('gcalWidth') ?> !important;">
<div id="gcf-simple-<?php echo $moduleID ?>" class="gCalFlow" style="height:<?php echo $params->get('gcalHeight') ?> !important; margin-bottom: <?php echo $params->get('bottomMargin') ?> !important; color: <?php echo $params->get('containerText') ?>; font-family: <?php echo $params->get('calendarFontFamily') ?> !important;">
	<?php if ($showHeader == "show"): ?>
		<div class="gcf-header-block" style="background: <?php echo $params->get('headerColor') ?>">
		<div class="gcf-title-block" style="color: <?php echo $params->get('headerText') ?>; font-size: <?php echo $params->get('headerSize') ?>;">
			<span class="gcf-title1"><?php echo $params->get('gcalTitle') ?></span>
		</div>
		</div>	
	<?php endif ; ?>
	<div class="gcf-item-container-block" style="height:<?php echo $containerHeight ?>; background: <?php echo $params->get('containerColor') ?>; font-size: <?php echo $params->get('containerSize') ?>; overflow-y: <?php echo $params->get('displayScroll') ?>;">
	<div class="gcf-item-block" style="border-bottom: <?php echo $params->get('seperatorSize') ?> <?php echo $seperatorLine ?> <?php echo $params->get('seperatorColor') ?>;">
	<div class="gcf-item-header-block">    
	<div class="gcf-item-title-block">
        
        <?php if ($timeFormat == "3"): ?>
            <span class="gcf-item-date" style="text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-weight: <?php echo $dateTimeDecoration ?>;"></span>&nbsp;&nbsp;<?php echo $lineSpacing ?>	
        <?php endif ; ?>
        
        <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>
            <span class="gcf-item-daterange" style="text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-weight: <?php echo $dateTimeDecoration ?>;"></span>&nbsp;&nbsp;<?php echo $lineSpacing ?>    
        <?php endif ; ?>
        <strong class="gcf-item-title"></strong>
        <?php if($showLocation == "2"):?>
            <br /><span class="gcf-item-location" style="color: <?php echo $params->get('locationColor') ?>; text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-size: <?php echo $params->get('locationSize') ?>;"></span>
        <?php endif ; ?>
		<?php if($showDescription == "2"):?>
			<div class="gcf-item-body-block">
			<?php if ($showDescription == "2"): ?>
			<span class="gcf-item-description" style="color: <?php echo $params->get('descriptionColor') ?>; text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-size: <?php echo $params->get('descriptionSize') ?>;"></span>
			<?php endif ; ?>
			</div>
		<?php endif ?>		
	</div>
	</div>
	</div>
	</div>
	<?php if ($showFooter == "show"): ?>
		<div class="gcf-last-update-block" style="color: <?php echo $params->get('footerText') ?>; background: <?php echo $params->get('footerColor') ?>; font-size: <?php echo $params->get('footerSize') ?>;">
		<?php echo $params->get('footerData') ?>: <span class="gcf-last-update"></span>
		</div>
	<?php endif ; ?>
</div>
<script type="text/javascript">
jQuery('#gcf-simple-<?php echo $moduleID ?>').gCalFlow({
	calid: '<?php echo $params->get('gcalID') ?>',
	maxitem: <?php echo $params->get('maxItems') ?>,
	apikey: '<?php echo $params->get('gcalAPI') ?>',
	auto_scroll: <?php echo $autoScroll ?>,
	mode: 'upcoming',
	scroll_interval: <?php echo $params->get('scrollSpeed') ?> * 1000,
	link_title: <?php echo $params->get('linkItem') ?>,
	link_item_title: <?php echo $params->get('linkItem') ?>,	
	link_target: '<?php echo $params->get('linkTarget') ?>',	
    item_description_as_html: <?php echo $params->get('HTMLDescriptions') ?>,   
	no_items_html: '<?php echo $params->get('noEvent') ?>',
    <?php if ($languagePack == "1") :?>
    globalize_culture: '<?php echo $params->get('countryCode') ?>',
    <?php endif ; ?>
	<?php if ($dateFormat == "1") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('monthFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('datingFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('yearFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
    
	<?php if ($dateFormat == "2") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('datingFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('monthFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('yearFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
    
	<?php if ($dateFormat == "3") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('yearFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('monthFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('datingFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
    
	});
</script>
</div>
<?php endif ; ?>
<?php if ($calendarStyle == "2") : ?>
<style type="text/css">
#gcf-ticker {width: <?php echo $params->get('gcalTickerWidth') ?>;}
@media only screen and (max-width: 768px) {
	#gcf-ticker {width: <?php echo $params->get('gcalTickerWidthTablet') ?>;}
}
@media only screen and (max-width: 480px) {
	#gcf-ticker {width: <?php echo $params->get('gcalTickerWidthPhone') ?>;}
}
#gcf-ticker .gcf-item-title {color:<?php echo $params->get('titleColor') ?>}
#gcf-ticker .gcf-header-block {
  -webkit-border-bottom-left-radius: 4px;
  -moz-border-bottom-left-radius: 4px;
  border-bottom-left-radius: 4px;
  float: left;
  height: 130%;
}
#gcf-ticker .gcf-item-container-block {
  margin-top: 0.2em;
  overflow: hidden;
} 
#gcf-ticker .gcf-item-block .gcf-item-description {
  padding-left: 1em;
  color: #888;
  font-size: 100%;
}
#gcf-ticker .gcf-item-description:before { content: " -- "; color: #aaa; }
.gCalFlow .gcf-header-block {
    -webkit-border-top-left-radius: 4px;
    -webkit-border-top-right-radius: 0px;
    -moz-border-top-left-radius: 4px;
    -moz-border-top-right-radius: 0px;
    border-top-left-radius: 4px;
    border-top-right-radius: 0px;
    font-size:<?php echo $params->get('headerSize') ?>;
    color:<?php echo $params->get('headerText') ?> !important;
    background:<?php echo $params->get('headerColor') ?>;
    /*
    background: -webkit-gradient(linear, left top, left bottom, from(#AAB1DC), to(#3B4CA5));
    background: -moz-linear-gradient(top, #AAB1DC, #3B4CA5);
    background: -o-linear-gradient(top, #AAB1DC, #3B4CA5);
    background: linear-gradient(to bottom, #AAB1DC, #3B4CA5);
    filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#ffAAB1DC,EndColorStr=#ff3B4CA5);
    */
    zoom: 1;
}
.gCalFlow {
    border-style: solid;
    border-width: 1px;
    border-color: #ccc #999 #999 #ccc;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    color: <?php echo $params->get('containerText') ?>;
    font-size: <?php echo $params->get('containerSize') ?>;
    background: <?php echo $params->get('containerColor') ?>;
    font-weight: <?php echo $dateTimeDecoration ?>;
    /*
    background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#eee));
    background: -moz-linear-gradient(top, #fff, #eee);
    background: -o-linear-gradient(top, #fff, #eee);
    background: linear-gradient(to bottom, #fff, #eee);
    filter: progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#ffffffff,EndColorStr=#ffeeeeee);*/
    zoom: 1;
}
</style>
<div id="gcf-ticker" style="height: <?php echo $params->get('gcalTickerHeight') ?>; margin-right: <?php echo $params->get('rightTickerMargin') ?> !important; font-family: <?php echo $params->get('calendarFontFamily') ?> !important;">
  <div class="gcf-header-block">
  	<?php if ($showHeader == "show"): ?>
    <div class="gcf-title-block"> <?php echo $params->get('gcalTickerTitle') ?></div>
    <?php endif ; ?>
  </div>
  <div class="gcf-item-container-block">
    <div class="gcf-item-block" style="border-bottom: <?php echo $params->get('seperatorSize') ?> <?php echo $seperatorLine ?> <?php echo $params->get('seperatorColor') ?>;">
      <div class="gcf-item-header-block">
        <div class="gcf-item-title-block"> 
            
        <?php if ($timeFormat == "3"): ?>
            <span class="gcf-item-date" style="text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-weight: <?php echo $dateTimeDecoration ?>;"></span>&nbsp;&nbsp;<?php echo $lineSpacing ?>	
        <?php endif ; ?>
        
        <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>
            <span class="gcf-item-daterange" style="text-shadow: 0 1px 0 <?php echo $params->get('containerTextShadow') ?> !important; font-weight: <?php echo $dateTimeDecoration ?>;"></span>&nbsp;&nbsp;<?php echo $lineSpacing ?>    
        <?php endif ; ?>
            
          <span class="gcf-item-title" style="font-weight:bold;"></span>
            <?php if($showLocation == "2"):?>
            <span class="gcf-item-location" style="color: <?php echo $params->get('locationColor') ?>; font-size: <?php echo $params->get('locationSize') ?>;"></span>
            <?php endif ; ?>
            <?php if ($showDescription == "2"): ?>
                <span class="gcf-item-description" style="color: <?php echo $params->get('descriptionColor') ?>; font-size: <?php echo $params->get('descriptionSize') ?>;"></span>
			<?php endif ; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    jQuery('#gcf-ticker').gCalFlow({
      calid: '<?php echo $params->get('gcalID') ?>',
      apikey: '<?php echo $params->get('gcalAPI') ?>',
      maxitem: <?php echo $params->get('maxItems') ?>,
	  auto_scroll: <?php echo $autoScroll ?>,
      scroll_interval: <?php echo $params->get('scrollSpeed') ?> * 1000,
      <?php if ($languagePack == "1") :?>
      globalize_culture: '<?php echo $params->get('countryCode') ?>',
      <?php endif ; ?>
      
	  /*date_formatter: function (date, allday_p) {
        function pad(n) { return n < 10 ? "0"+n : n; }
        return pad(date.getMonth()+1) + "/" + pad(date.getDate()) + "/" + date.getFullYear().toString().substr(-2);
      }*/
	  
	<?php if ($dateFormat == "1") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('monthFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('datingFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('yearFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
    
	<?php if ($dateFormat == "2") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('datingFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('monthFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('yearFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
    
	<?php if ($dateFormat == "3") : ?>
	globalize_fmt_datetime: "<?php echo $params->get('dayFormat') ?><?php echo $params->get('yearFormat') ?>'<?php if ($yearFormat == "yy" || $yearFormat == "yyyy"): ?><?php echo $dateSeparator ?><?php endif ; ?>'<?php echo $params->get('monthFormat') ?>'<?php echo $dateSeparator ?>'<?php echo $params->get('datingFormat') ?>' <?php if ($timeFormat == "h" || $timeFormat == "HH"): ?>'<?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>'<?php endif ; ?>",
	globalize_fmt_time: " <?php echo $params->get('timeFormat') ?>':'mm <?php echo $params->get('amPm') ?>"
	<?php endif ; ?>
	  
    });
</script>
<?php endif ; ?>
<?php if ($calendarStyle == "3") : ?>
<meta charset='utf-8' />
<link href='<?php echo $modbase ?>css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#calendar-<?php echo $moduleID ?>').fullCalendar({
            views: {
                month: {
                    eventLimit: <?php echo $params->get('eventLimit') ?> // 0=All events
                }
            },
			header: {
				left: '<?php echo $params->get('prevnextButtons') ?>today',
				center: 'title',
                right: '<?php echo $params->get('agendaWeek') ?><?php echo $params->get('agendaDay') ?><?php echo $params->get('listWeek') ?>month'
			},
            defaultView: '<?php echo $params->get('fullCalendarView') ?>',
            locale: '<?php echo $params->get('fullCalendarLanguage') ?>',
            weekNumbers: <?php echo $params->get('weekNumbers') ?>,
			editable: false,
			eventLimit: true, // allow link when too many events,
			height: 'auto',
			eventClick: function(event) {
     		   if (event.url) {
          		  return false;
        			}
    			},
                    eventRender: function (event, element) {
                    //var start = "\n" + moment(event.start).format("YYYY-MM-DD HH:mm") + "\n";
                    var start = moment(event.start).format("h:mma");
                    var end = moment(event.end).format("h:mma");
                    var description = event.description;
                    var location = event.location;
                    $(element).tooltip({
                        container: 'body',
                        html: true,
                        title: "Title: " + event.title + "<br/>" + start + " - " + end + "<br/>" + " Description: " + description + "<br/>" + " Location: " + location
                    });

                },

            googleCalendarApiKey: '<?php echo $params->get('gcalAPI') ?>',
            events: '<?php echo $params->get('gcalID') ?>',
                    
                eventClick: function(event) {
                    // opens events in a popup window
                    window.open(event.url, 'gcalevent', 'width=<?php echo $params->get('popupWidth') ?>,height=<?php echo $params->get('popupHeight') ?> target="_self"');
                    return false;
                    
                }
            
		});

	});
</script>
<style type="text/css">
    #calendar {max-width: 100%; margin-bottom: 10px;}
    .fc-event {background-color: <?php echo $params->get('fullCalendarEventsBackground') ?>; color: <?php echo $params->get('fullCalendarFontColor') ?>; border: 1px solid <?php echo $params->get('fullCalendarEventsBorder') ?>;}
    a.fc-more:hover {color: <?php echo $params->get('fullCalendarLinkHoverColor') ?>;}
    a.fc-more {color: <?php echo $params->get('fullCalendarLinkColor') ?>;}
    .fc button, .fc table, body .fc {background: <?php echo $params->get('fullCalendarBackgroundColor') ?>;}
    .fc-unthemed td.fc-today {background: <?php echo $params->get('fullCalendarTodayBackgroundColor') ?>;}
    .fc .fc-row {color: <?php echo $params->get('fullCalendarDaysTextColor') ?>;}
    .fc-center {color: <?php echo $params->get('fullCalendarHeaderTextColor') ?>;}
    .tooltip.in {opacity: 1.0 !important}
    .tooltip-inner {background: <?php echo $params->get('tooltipBackground') ?> !important; color: <?php echo $params->get('tooltipColor') ?> !important;}
    .tooltip-arrow {border-top-color: <?php echo $params->get('tooltipBackground') ?> !important;}
</style>
  <div id='calendar-<?php echo $moduleID ?>'></div>
<?php endif ; ?>