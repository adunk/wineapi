<?php namespace Wineapi\Repositories;

use Illuminate\Support\ServiceProvider;

class WineServiceProvider extends ServiceProvider {
   
  public function register()
  {
    $this->app->bind(
      'Wineapi\Repositories\WineRepository',
      'Wineapi\Repositories\EloquentWineRepository'
    );
  }
}