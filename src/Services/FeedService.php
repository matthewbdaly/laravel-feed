<?php

namespace Matthewbdaly\LaravelFeed\Services;

use Http\Client\HttpClient;
use Http\Message\MessageFactory;
use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;
use Zend\Feed\Reader\Http\ClientInterface as FeedReaderHttpClientInterface;
use Zend\Feed\Reader\Http\Psr7ResponseDecorator;

class FeedService implements FeedReaderHttpClientInterface
{
    /**
     * HTTPlug client
     *
     * @var $client
     */
    protected $client;

    /**
     * HTTPlug message factory
     *
     * @var $messageFactory
     */
    protected $messageFactory;

    /**
     * Constructor
     *
     * @param HttpClient     $client         HTTPlug client instance.
     * @param MessageFactory $messageFactory HTTPlug message factory instance.
     * @return void
     */
    public function __construct(HttpClient $client = null, MessageFactory $messageFactory = null)
    {
        $this->client = $client ?: HttpClientDiscovery::find();
        $this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();
    }

    /**
     * {@inheritdoc}
     */
    public function get($uri)
    {
        $request = $this->messageFactory->createRequest(
            'GET',
            $uri
        );
        return new Psr7ResponseDecorator($this->client->sendRequest($request));
    }
}
