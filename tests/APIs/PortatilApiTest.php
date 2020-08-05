<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Portatil;

class PortatilApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_portatil()
    {
        $portatil = factory(Portatil::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/portatils', $portatil
        );

        $this->assertApiResponse($portatil);
    }

    /**
     * @test
     */
    public function test_read_portatil()
    {
        $portatil = factory(Portatil::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/portatils/'.$portatil->id
        );

        $this->assertApiResponse($portatil->toArray());
    }

    /**
     * @test
     */
    public function test_update_portatil()
    {
        $portatil = factory(Portatil::class)->create();
        $editedPortatil = factory(Portatil::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/portatils/'.$portatil->id,
            $editedPortatil
        );

        $this->assertApiResponse($editedPortatil);
    }

    /**
     * @test
     */
    public function test_delete_portatil()
    {
        $portatil = factory(Portatil::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/portatils/'.$portatil->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/portatils/'.$portatil->id
        );

        $this->response->assertStatus(404);
    }
}
