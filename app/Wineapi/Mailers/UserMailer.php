<?php namespace Wineapi\Mailers;

/**
 * @watch https://laracasts.com/lessons/mailers
 */

use User;

class UserMailer extends Mailer {
  
  public function welcome(User $user)
  {
    $view = 'emails.welcome';
    $data = [];
    $subject = 'Welcome to Wineapi';
    
    return $this->sendTo($user, $subject, $view, $data);
  }
  
} 