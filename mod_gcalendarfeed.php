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
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$LiveSite 	= JURI::base();
$calendarStyle	= $params->get('calendarStyle');
$langPack	= $params->get('langPack');
$document = JFactory::getDocument();
$modbase = JURI::base(true).'/modules/mod_gcalendarfeed/';
if ($calendarStyle == "1" || $calendarStyle == "2") {
$document->addScript ($modbase.'js/jquery.gcal_flow.js');
$document->addScript ($modbase.'js/globalize.js');
$document->addScript ($modbase.'js/cultures/'.$langPack.'.js');
$document->addStyleSheet($modbase.'css/jquery.gcal_flow.css');	
}
if ($calendarStyle == "3") {
$document->addStyleSheet($modbase.'css/fullcalendar.min.css');
$document->addScript ($modbase.'js/lib/moment.min.js');
$document->addScript ($modbase.'js/fullcalendar.unmin.js');
$document->addScript ($modbase.'js/gcal.unmin.js');
$document->addScript ($modbase.'js/locale-all.js');
}
$languagePack	= $params->get('languagePack');
$autoScroll	= $params->get('autoScroll', true);
$containerHeight	= $params->get('containerHeight');
$showHeader	= $params->get('showHeader');
$showFooter	= $params->get('showFooter');
$dateFormat	= $params->get('dateFormat');
if($showFooter == "hide") $containerHeight = "100%";
$seperatorLine	= $params->get('seperatorLine');
if($seperatorLine == "0") $seperatorLine = "dashed";
if($seperatorLine == "1") $seperatorLine = "solid";
if($seperatorLine == "2") $seperatorLine = "none";
$dateSeparator	= $params->get('dateSeparator');
if($dateSeparator == "1") $dateSeparator = "/";
if($dateSeparator == "2") $dateSeparator = ".";
if($dateSeparator == "3") $dateSeparator = "-";
if($dateSeparator == "4") $dateSeparator = "&nbsp;";
$dateTimeDecoration	= $params->get('dateTimeDecoration');
if($dateTimeDecoration == "2") $dateTimeDecoration = "bold";
if($dateTimeDecoration == "1") $dateTimeDecoration = "normal";
$lineSpacing	= $params->get('lineSpacing');
if($lineSpacing == "2") $lineSpacing = "<br />";
if($lineSpacing == "1") $lineSpacing = "";
$showLocation	= $params->get('showLocation');
$showDescription	= $params->get('showDescription');
$linkItem	= $params->get('linkItem');
$linkTarget	= $params->get('linkTarget');
$showDateTimeStamp	= $params->get('showDateTimeStamp');
$yearFormat	= $params->get('yearFormat');
$timeFormat	= $params->get('timeFormat');
$moduleID	= $module->id;
require JModuleHelper::getLayoutPath('mod_gcalendarfeed','default',$params);
?>