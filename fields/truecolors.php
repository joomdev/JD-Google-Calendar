<?php
/**
 * Custom Joomla! form field to generate minicolors input with optional opacity slider
 *
 * NOTE: replace PATH_TO_CUSTOM_MINICOLORS with path to minicolors files. See below.
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('color');

class JFormFieldTruecolors extends JFormFieldColor {

  protected $type = 'Truecolors';

  /**
   * Method to get the field input markup.
   *
   * @return  string  The field input markup.
   *
   * @since   11.3
   */
  protected function getInput()
  {
    // Translate placeholder text
    $hint = $this->translateHint ? JText::_($this->hint) : $this->hint;

    // Control value can be: hue (default), saturation, brightness, wheel
    $control = $this->control;

    // Valid options are hex and rgb.
    $format  = $this->element['format'];

    // Set to true to enable the opacity slider.
    $opacity = $this->element['opacity'];

    // Position of the panel can be: right (default), left, top or bottom
    $position = ' data-position="' . $this->position . '"';

    $onchange  = !empty($this->onchange) ? ' onchange="' . $this->onchange . '"' : '';
    $class     = $this->class;
    $required  = $this->required ? ' required aria-required="true"' : '';
    $disabled  = $this->disabled ? ' disabled' : '';
    $autofocus = $this->autofocus ? ' autofocus' : '';

    $color = strtolower($this->value);

    if (!$color || in_array($color, array('none', 'transparent')))
    {
      $color = 'none';
    }

    $class        = ' class="' . trim('truecolors ' . $class) . '"';
    $control      = $control ? ' data-control="' . $control . '"' : '';
    $format       = $format ? ' data-format="' . $format . '"' : '';
    $opacity      = $opacity ? ' data-opacity="' . $opacity . '"' : '';
    $readonly     = $this->readonly ? ' readonly' : '';
    $hint         = $hint ? ' placeholder="' . $hint . '"' : ' placeholder="rgba(0, 0, 0, 1)"';
    $autocomplete = !$this->autocomplete ? ' autocomplete="off"' : '';

    // Including fallback code for HTML5 non supported browsers.
    JHtml::_('jquery.framework');
    JHtml::_('script', 'system/html5fallback.js', false, true);

    // Include jQuery
    JHtml::_('jquery.framework');

    // We must include our custom minicolors, since Joomla! has outdated version
    // See: https://github.com/claviska/jquery-minicolors/

    $LiveSite = JURI::base();
    $dirname = basename(dirname(dirname(__FILE__)));
    $document = JFactory::getDocument();
    
    $document->addStyleSheet("../modules/$dirname/css/jquery.truecolors.css");
    $document->addScript("../modules/$dirname/js/jquery.truecolors.min.js");

    JFactory::getDocument()->addScriptDeclaration("
        jQuery(document).ready(function (){
          jQuery('input.truecolors').each(function() {
            jQuery(this).truecolors({
              control: jQuery(this).attr('data-control') || 'hue',
              position: jQuery(this).attr('data-position') || 'right',
              format: jQuery(this).attr('data-format') || 'hex',
              opacity: jQuery(this).attr('data-opacity') || false,
              theme: 'bootstrap'
            });
          });
        });
      "
    );

    return '<input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="'
      . htmlspecialchars($color, ENT_COMPAT, 'UTF-8') . '"' . $hint . $class . $position . $control . $format . $opacity
      . $readonly . $disabled . $required . $onchange . $autocomplete . $autofocus . '/>';
  }
}