<?php
/**
 * @file
 * Theme functions for iTimeZynk theme
 */

/**
 * Implementation of hook_theme
 */
function itimezynk_theme() {
  return array(
    'user_login_block' => array(
      'arguments' => array(),
    )
  );
}

function itimezynk_user_login_block(&$form) {
  // Remove the "request new password" link
  unset($form['links']);
  return drupal_render($form);
}

function itimezynk_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = "menu" . ($menu ? ' expanded' : ($has_children ? ' collapsed' : ' leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
  return '<li class="'. $class .'">'. $link . $menu ."</li>\n";
}

function itimezynk_menu_item_link($link) {
  $link['html'] = TRUE;
  $title = check_plain($link['title']);
  $link['title'] = '<span class="name">' . $title . '</span><span class="arrow"></span>';
  return l($link['title'], $link['href'], $link);
}

function itimezynk_menu_tree($tree) {
  return $tree;
}