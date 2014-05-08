<?php

/**
 * Helper function to set an .active class to an element
 *
 * @link https://laracasts.com/lessons/active-states
 * @param $path string
 * @param $active string (default)
 */
function set_active($path, $active = 'active') {
  return Request::is($path) ? $active : '';
}

/**
 * Helper function to set error messages during form validation
 *
 * @param $attribute string
 * @param $errors object. Contains returned error messages
 */
function errors_for($attribute, $errors) {
  $errors->first($attribute, '<span class="text-danger">:message</span>'); 
}