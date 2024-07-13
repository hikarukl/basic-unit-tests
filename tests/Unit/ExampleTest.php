<?php

namespace Tests\Unit;

use App\Http\Controllers\StudentController;
use App\Services\StudentService;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public int $randomNumber;

    public function setUp() : void
    {
        $this->randomNumber = random_int(1, 100);
        parent::setUp();
    }

    public function tearDown() : void
    {
        parent::tearDown();
    }

    /**
     * A basic test example.
     */
    public function test_that_true_is_true(): void
    {
        // Use random number in test
        $this->assertIsInt($this->randomNumber);
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     */
    public function test_that_false_is_false(): void
    {
        // Use random number in test
        $this->assertIsInt($this->randomNumber);
        $this->assertFalse(false);
    }

    /**
     * A basic stub test example.
     */
    public function test_use_product_service_stub()
    {
        $productServiceStub = new ProductServiceStub();
        $this->assertTrue($productServiceStub->functionCanStub());
    }

    /**
     * A basic mock test example.
     */
    public function test_use_product_service_mock()
    {
        $mock = \Mockery::mock(StudentService::class, function ($mock) {
            $result = [
                ['name' => 'John Doe', 'age' => 20],
                ['name' => 'Jane Doe', 'age' => 21],
            ];
            $mock->shouldReceive('getAllStudents')->once()->andReturn(collect($result));
        });

        $studentController = new StudentController($mock);
        $result = $studentController->getAllStudents();
        $content = $result->getContent();
        $this->assertJson($content);
    }

    /**
     * A basic exception test example.
     */
    public function test_get_student_has_exception()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Student name is required');

        $studentController = new StudentController(new StudentService());
        $studentController->getStudentHasException('');
    }
}

class ProductServiceStub
{
    public function functionCanStub(): bool
    {
        return true;
    }
}
