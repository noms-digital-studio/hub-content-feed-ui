<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VideosRepositoryServiceProvider extends ServiceProvider {
  public function register() {
    $this->app->bind('videos.repository', 'App\Repositories\VideosRepository');
  }
}
