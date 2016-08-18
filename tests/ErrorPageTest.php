<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Facades\Videos;
use App\Models\Video;

class ErrorPageTest extends TestCase
{
    /**
     * Tests for a 404 against the front end's routes.
     */
    public function testRouting404()
    {
        try {
            $this->visit('/notavalidroute');
        } catch (Exception $e) {
            $this->assertContains("Received status code [404]", $e->getMessage());
        }
    }

    /**
     * Tests for an API 404 error.
     */
    public function testApi404()
    {
        \App\Facades\Videos::shouldReceive('find')
          ->with(12345)
          ->once()
          ->andThrow(new \App\Exceptions\VideoNotFoundException('Video not found: 12345'));
        
        try {
            $this->visit('/video/12345');
        } catch (Exception $e) {
            $this->assertContains("Received status code [404]", $e->getMessage());
        }
    }

    /**
     * Tests for an API 403 error.
     */
    public function testApi403()
    {
        \App\Facades\Videos::shouldReceive('find')
          ->with(12345)
          ->once()
          ->andThrow(new \App\Exceptions\ForbiddenException('Forbidden'));
        
        try {
            $this->visit('/video/12345');
        } catch (Exception $e) {
            $this->assertContains("Received status code [403]", $e->getMessage());
        }
    }

    /**
     * Tests for an API 500 error.
     */
    public function testApi500()
    {
        \App\Facades\Videos::shouldReceive('find')
          ->with(12345)
          ->once()
          ->andThrow(new Symfony\Component\HttpKernel\Exception\HttpException(500, 'Server error'));
        
        try {
            $this->visit('/video/12345');
        } catch (Exception $e) {
            $this->assertContains("Received status code [500]", $e->getMessage());
        }
    }
}