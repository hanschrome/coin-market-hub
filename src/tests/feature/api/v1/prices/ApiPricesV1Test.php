<?php

namespace App\Tests\feature\api\v1\prices;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApiPricesV1Test extends WebTestCase
{
    public function testGet(): void
    {
        $client = static::createClient();

        $client->request('GET', '/api/v1/prices');
        $content = json_decode($client->getResponse()->getContent(), 1);

        $this->assertResponseIsSuccessful();
        $this->assertArrayHasKey('binance', $content);
    }
}
