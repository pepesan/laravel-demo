<?php namespace Tests\Repositories;

use App\Models\Portatil;
use App\Repositories\PortatilRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PortatilRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PortatilRepository
     */
    protected $portatilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->portatilRepo = \App::make(PortatilRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_portatil()
    {
        $portatil = factory(Portatil::class)->make()->toArray();

        $createdPortatil = $this->portatilRepo->create($portatil);

        $createdPortatil = $createdPortatil->toArray();
        $this->assertArrayHasKey('id', $createdPortatil);
        $this->assertNotNull($createdPortatil['id'], 'Created Portatil must have id specified');
        $this->assertNotNull(Portatil::find($createdPortatil['id']), 'Portatil with given id must be in DB');
        $this->assertModelData($portatil, $createdPortatil);
    }

    /**
     * @test read
     */
    public function test_read_portatil()
    {
        $portatil = factory(Portatil::class)->create();

        $dbPortatil = $this->portatilRepo->find($portatil->id);

        $dbPortatil = $dbPortatil->toArray();
        $this->assertModelData($portatil->toArray(), $dbPortatil);
    }

    /**
     * @test update
     */
    public function test_update_portatil()
    {
        $portatil = factory(Portatil::class)->create();
        $fakePortatil = factory(Portatil::class)->make()->toArray();

        $updatedPortatil = $this->portatilRepo->update($fakePortatil, $portatil->id);

        $this->assertModelData($fakePortatil, $updatedPortatil->toArray());
        $dbPortatil = $this->portatilRepo->find($portatil->id);
        $this->assertModelData($fakePortatil, $dbPortatil->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_portatil()
    {
        $portatil = factory(Portatil::class)->create();

        $resp = $this->portatilRepo->delete($portatil->id);

        $this->assertTrue($resp);
        $this->assertNull(Portatil::find($portatil->id), 'Portatil should not exist in DB');
    }
}
