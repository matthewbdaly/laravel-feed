<?php

namespace Tests\Unit\Providers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\Strategy\MockClientStrategy;

class FeedServiceProviderTest extends TestCase
{
    /**
     * Test instantiating the reader
     *
     * @return void
     */
    public function testInstantiateReader()
    {
        HttpClientDiscovery::prependStrategy(MockClientStrategy::class);
        $client = $this->app->make('Zend\Feed\Reader\ReaderImportInterface');
        $this->assertInstanceOf('Zend\Feed\Reader\ReaderImportInterface', $client);
        $this->assertInstanceOf('Zend\Feed\Reader\Reader', $client);
    }
}
