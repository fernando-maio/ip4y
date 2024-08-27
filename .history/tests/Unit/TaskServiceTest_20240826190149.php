<?php

namespace Tests\Unit;

use App\Interfaces\ProjectRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use Tests\TestCase;
use App\Services\TaskService;
use Mockery;

class TaskServiceTest extends TestCase
{
    protected $taskService;
    protected $projectRepositoryMock;
    protected $userRepositoryMock;
    protected $taskRepositoryMock;

    protected function setUp(): void
    {
        parent::setUp();

        $this->projectRepositoryMock = Mockery::mock(ProjectRepositoryInterface::class);
        $this->userRepositoryMock = Mockery::mock(UserRepositoryInterface::class);
        $this->taskRepositoryMock = Mockery::mock(TaskRepositoryInterface::class);

        $this->taskService = new TaskService(
            $this->taskRepositoryMock,
            $this->projectRepositoryMock,
            $this->userRepositoryMock
        );
    }

    public function testGetAllProjects()
    {
        $projects = collect([['id' => 1, 'name' => 'Project 1'], ['id' => 2, 'name' => 'Project 2']]);

        $this->projectRepositoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn($projects);

        $result = $this->taskService->getAllProjects();

        $this->assertEquals($projects, $result);
    }

    public function testGetAllUsers()
    {
        $users = collect([['id' => 1, 'name' => 'User 1'], ['id' => 2, 'name' => 'User 2']]);

        $this->userRepositoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn($users);

        $result = $this->taskService->getAllUsers();

        $this->assertEquals($users, $result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
