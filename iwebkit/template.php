<?php
/**
 * @file
 * Theme functions for iWebKit theme
 */

/**
 * Implementation of theme_textfield
 * @param unknown_type $element
 */
function iwebkit_textfield($element) {
  return iwebkit_format_bigfield($element, "text");
}

function iwebkit_password($element) {
  return iwebkit_format_bigfield($element, "password");
}

function iwebkit_button($element) {
  // Make sure not to overwrite classes.
  if (isset($element['#attributes']['class'])) {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'] .' '. $element['#attributes']['class'];
  }
  else {
    $element['#attributes']['class'] = 'form-'. $element['#button_type'];
  }

  $output = '<li class="button">';
  $output .= '<input type="submit" '. (empty($element['#name']) ? '' : 'name="'. $element['#name'] .'" ') .'id="'. $element['#id'] .'" value="'. check_plain($element['#value']) .'" '. drupal_attributes($element['#attributes']) ." />\n";
  $output .= '</li>';

  return $output;
}

function iwebkit_form($element) {
  $action = $element['#action'] ? 'action="'. check_url($element['#action']) .'" ' : '';
  return '<form '. $action .' accept-charset="UTF-8" method="'. $element['#method'] .'" id="'. $element['#id'] .'"'. drupal_attributes($element['#attributes']) .">\n". $element['#children'] ."\n</form>\n";
}

/**
 * Implementation of theme_breadcrumb
 * @param $breadcrumb
 */
function iwebkit_breadcrumb($breadcrumb) {
  // Implode all breadcrumbs to make a iPhone like return link
  if (!empty($breadcrumb)) {
    return implode(' ', $breadcrumb);
  }
}

function iwebkit_item_list($items = array(), $title = NULL, $type = 'ul', $attributes = NULL) {
  $output = '';
  if (!empty($items)) {
    foreach ($items as $i => $item) {
      $output .= '<li class="menu">' . $item . '</li>';
    }
  }
  return $output;
}

function iwebkit_links($links, $attributes = array('class' => 'links')) {
  global $language;
  $output = '';

  $attributes['class'] = 'pageitem';

  if (!empty($links)) {
    $output = '<ul '. drupal_attributes($attributes) .'>';

    foreach ($links as $key => $link) {
      $class = "menu ";

      if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))
          && (empty($link['language']) || $link['language']->language == $language->language)) {
        $class .= ' active';
      }
      $output .= '<li'. drupal_attributes(array('class' => $class)) .'>';

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $link['html'] = TRUE;
        $title = check_plain($link['title']);
        $link['title'] = '<span class="name">' . $title . '</span><span class="arrow"></span>';
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}

function iwebkit_format_bigfield($element, $type) {
  $size = empty($element['#size']) ? '' : ' size="'. $element['#size'] .'"';
  $maxlength = empty($element['#maxlength']) ? '' : ' maxlength="'. $element['#maxlength'] .'"';
  $class = array('form-text');
  $extra = '';
  $output = '';
  $placeholder = '';

    /* Wrap in iWebKit li */
  $output .= '<li class="bigfield">';
  if (!empty($element['#title'])) {
    $title = filter_xss_admin($element['#title']);
    $placeholder = 'placeholder="' . $title . '"';
  }

  if ($element['#autocomplete_path'] && menu_valid_path(array('link_path' => $element['#autocomplete_path']))) {
    drupal_add_js('misc/autocomplete.js');
    $class[] = 'form-autocomplete';
    $extra =  '<input class="autocomplete" type="hidden" id="'. $element['#id'] .'-autocomplete" value="'. check_url(url($element['#autocomplete_path'], array('absolute' => TRUE))) .'" disabled="disabled" />';
  }
  _form_set_class($element, $class);

  if (isset($element['#field_prefix'])) {
    $output .= '<span class="field-prefix">'. $element['#field_prefix'] .'</span> ';
  }

  $output .= '<input type="' . $type . '"'. $maxlength .' name="'. $element['#name'] .'" id="'. $element['#id'] .'"'. $size .' value="'. check_plain($element['#value']) .'"'. drupal_attributes($element['#attributes']) . ' ' . $placeholder .' />';

  if (isset($element['#field_suffix'])) {
    $output .= ' <span class="field-suffix">'. $element['#field_suffix'] .'</span>';
  }

  $output .= '</li>';

  return $output . $extra;
}


