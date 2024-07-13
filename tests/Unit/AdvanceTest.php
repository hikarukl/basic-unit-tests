<?php

namespace Tests\Unit;

use App\Http\Controllers\AdvanceController;
use Tests\TestCase;

class AdvanceTest extends TestCase
{
    public function test_function_doSomething_exists(): void
    {
        $advanceController = new AdvanceController();
        $this->assertTrue(method_exists($advanceController, 'doSomething'));
    }
}
