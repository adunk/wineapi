<?php namespace Wineapi\Transformers;

class WineryTransformer extends Transformer {
  
  public function transform($winery)
  {
    return [
      'id' => $winery['id'],
      'winery' => $winery['name'],
      'short' => $winery['body'],
      'street_address_1' => $winery['street_address_1'],
      'street_address_2' => $winery['street_address_2'],
      'city' => $winery['city'],
      'state' => $winery['state'],
      'zip' => $winery['zip'],
      'country' => $winery['country'],
      'email' => $winery['email'],
      'phone' => $winery['phone'],
      'url' => $winery['url'],
    ];
  }
}
