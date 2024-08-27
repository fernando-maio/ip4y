<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\UserService;
use App\Interfaces\UserRepositoryInterface;
use Mockery;

class UserServiceTest extends TestCase
{
    protected $userService;
    protected $userRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userRepositoryMock = Mockery::mock(UserRepositoryInterface::class);
        $this->userService = new UserService($this->userRepositoryMock);
    }

    public function testGetAllUsers()
    {
        $users = collect([['id' => 1, 'name' => 'User 1'], ['id' => 2, 'name' => 'User 2']]);

        $this->userRepositoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn($users);

        $result = $this->userService->getAllUsers();

        $this->assertEquals($users, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
