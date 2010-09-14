<?php

/**
 * Theme function for the 'colons' duration field formatter.
 */
function timezynk_duration_formatter_colons($element) {
  if (isset($element['#node']->duration)) { // loaded by duration_handler_field
    $element['#item']['duration'] = $element['#node']->duration;
  }
  return duration_format_custom($element['#item']['duration'], '%H:%M');
}
