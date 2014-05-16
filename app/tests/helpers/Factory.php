<?php

trait Factory {
  
  /**
   * Make a fake record
   */
  protected function make($type, array $fields = [])
  {
    $stub = array_merge($this->getStub(), $fields);
    
    $type::create($stub);  
  }
  
  /**
   * getStub() is a required dependency of make(). By throwing an exception here we can
   * effectively require that a getStub() method be defined in all child classes 
   */
  protected function getStub()
  {
    throw new BadMethodCallException('Create your own getStub method to declare your fields.');
  }
  
}