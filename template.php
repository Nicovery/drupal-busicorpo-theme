<?php

/**
 * @file
 * template.php
 */

/**
 * Implements hook_element_info_alter().
 */
function busicorpo_element_info_alter(&$elements) {
    foreach ($elements as & $element) {
        if (!empty($element['#input'])) {
            $element['#process'][] = '_busicorpo_process_input';
        }
    }
}

/**
 * Process input elements.
 * Note : the webform email field was not formatted like a bootstrap input
 * so I need to had my own process input
 */
function _busicorpo_process_input(&$element, &$form_state) {
  // Only add the "form-control" class for specific element input types.
  $types = array(
    'webform_email',
  );
  if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
    $element['#attributes']['class'][] = 'form-control';
  }
  return $element;
}