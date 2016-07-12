<?php

namespace App\Providers;

use App\Models\Video;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class VideosRepositoryServiceProvider extends ServiceProvider {

  public function register() {
    $this->app->bind('videos.repository', 'App\Repositories\VideosRepository');
  }

  public function boot(DispatcherContract $events)
  {
    parent::boot($events);

    \App\Facades\Videos::shouldReceive('find')
      ->with(8)
      ->andReturn(new Video(
        8, 'A mocked video item', 'The description of a mocked video item.', 'http://www.google.com'));
    
    \App\Facades\Videos::shouldReceive('all')
      ->andReturn(array(
        new Video(3, 'A mocked video item', 'The description of a mocked video item.', 'http://www.google.com'),
        new Video(4, 'Another mocked video item', 'The description of a mocked video item.', 'http://www.google.com'),
        new Video(8, 'Yet another mocked video item', 'The description of a mocked video item.', 'http://www.google.com')
      ));
  }

}
