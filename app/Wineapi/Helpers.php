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
  return $errors->first($attribute, '<span class="text-danger">:message</span>');
}

/**
 * Helper function to link to a user's profile
 *
 * @param $text sting
 */
function link_to_profle($text = 'Profile') {
  return link_to_route('profiles.show', $text, Auth::user()->id);
}