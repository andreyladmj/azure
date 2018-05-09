<?php

namespace Tests\Feature;

use Prophecy\Argument;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MockCurlTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $curl = $this->mockCurlRequest(true);

        $config = $this->prophesize('Illuminate\Config\Repository')->reveal();

        // for mock dependency injection in other classes
        app()->instance('App\Utilities\Curl', $curl);
        app()->instance('Illuminate\Config\Repository', $config);

        (new Spam)->search($this->request($ttile, $body));

    }

    protected function mockCurlRequest($shouldSuccess)
    {
        $curl = $this->prophesize('App\Utilities\Curl');

        $curl->post(Argument::any(), Argument::any())
            ->willReturn(json_encode(['success' => $shouldSuccess]));

        return $curl->reveal();
    }
}
