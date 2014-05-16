<?php namespace Wineapi\Transformers;

abstract class Transformer {
  
  /**
   * Should probably look up what array_map() does
   */
  public function transformCollection(array $items)
  {
    return array_map([$this, 'transform'], $items);
  }
  
  /**
   * This requires every Transformer sub-class to have a transform method
   */
  public abstract function transform($item);
}
