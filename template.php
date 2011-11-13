<?php


/*
remove the classes from the div wrapper around each field
change the div class="description" to <small>
*/

function mothership_twitter_bootstrap_form_element($variables) {
  $element = &$variables['element'];

  // This is also used in the installer, pre-database setup.
  $t = get_t();

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  $attributes = array();
  //shouuld we add #id to an element...
//  if($element['#type'] == "checkbox" OR $element['#type'] == "radio"){

//  }else{
    // Add element #id for #type 'item'.
    if (isset($element['#markup']) && !empty($element['#id'])) {
      $attributes['id'] = $element['#id'];
    }
//  }

  $attributes['class'] = array();
  //base class form-item - do we need it ? ...
  if(! theme_get_setting('mothership_classes_form_wrapper_formitem')){
    $attributes['class'] = array('form-item');
  }
  //class form-type-[type]
  if(!theme_get_setting('mothership_classes_form_wrapper_formtype')){
    if (!empty($element['#type'])) {
      // Add element's #type and #name as class to aid with JS/CSS selectors.
      $attributes['class'][] = 'form-type-' . strtr($element['#type'], '_', '-');
    }
  }
  //form-item-xxx
  if(!theme_get_setting('mothership_classes_form_wrapper_formname')){
    if (!empty($element['#name'])) {
      $attributes['class'][] = 'form-item-' . strtr($element['#name'], array(' ' => '-', '_' => '-', '[' => '-', ']' => ''));
    }
  }

  // Add a class for disabled elements to facilitate cross-browser styling.
  if (!empty($element['#attributes']['disabled'])) {
    $attributes['class'][] = 'form-disabled';
  }

  //freeform css class killing
  $remove_class_form = explode(", ", theme_get_setting('mothership_classes_form_freeform'));
  $attributes['class'] = array_values(array_diff($attributes['class'],$remove_class_form));

  //test to see if we have any attributes aka classes here
  if($attributes){
    $output = '<div ' . drupal_attributes($attributes) . '>' . "\n";
  }else{
    $output =  "\n" . '<div>' . "\n";
  }

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }

  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      //if an elements is a checkbox or radio were wrapping the item in a label we can wrap em into an label for cleaner markup
      if(theme_get_setting('mothership_form_labelwrap') AND ($element['#type'] == "checkbox" OR $element['#type'] == "radio")){
        $output .= ' ' . $prefix . '<label>' . $element['#title'] .$element['#children'] . '</label>' . $suffix . "\n";
      }else{
        $output .= ' ' . theme('form_element_label', $variables);
        $output .= '<div class="input"> ' . $prefix .  $element['#children'] . $suffix . "\n";
      }

      if (!empty($element['#description'])) {
        //we dont really need a class for description so lets add small instead
        if(!theme_get_setting('mothership_classes_form_description')){
          $output .= "\n" . '<div class="help-block">' . $element['#description'] . "</div>\n";
        }else{
          $output .= "\n" . '<small>' . $element['#description'] . "</small>\n";
        }
      }
      $output .= "</div>";



      break;

    case 'after':
      //if an elements is a checkbox or radio were wrapping the item in a label we can wrap em into an label for cleaner markup
      if(theme_get_setting('mothership_form_labelwrap') AND ($element['#type'] == "checkbox" OR $element['#type'] == "radio")){
        $output .= ' ' . $prefix . '<label>' .$element['#children'] . $element['#title'];
        if (!empty($element['#description'])) {
          $output .= "\n" . '<small>' . $element['#description'] . "</small>\n";
        }
        $output .= '</label>' . $suffix . "\n";
      }else{
        $output .= ' ' . $prefix . $element['#children']  . $suffix;
        $output .= ' ' . theme('form_element_label', $variables) . "\n";

        if (!empty($element['#description'])) {
          //we dont really need a class for desctioption so lets add small instead
          if(!theme_get_setting('mothership_classes_form_description')){
            $output .= "\n" . '<div class="description 2">' . $element['#description'] . "</div>\n";
          }else{
            $output .= "\n" . '<small>' . $element['#description'] . "</small>\n";
          }
        }

      }
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

   $output .= "</div>\n";

  return $output;
}

