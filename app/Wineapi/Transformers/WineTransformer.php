<?php namespace Wineapi\Transformers;

class WineTransformer extends Transformer {
  
  public function transform($wine)
  {
    return [
      'id' => $wine['id'],
      'name' => $wine['name'],
      'vintage' => $wine['vintage'],
      'notes' => $wine['body'],
      'winery_id' => $wine['winery_id'],
    ];
  }
}