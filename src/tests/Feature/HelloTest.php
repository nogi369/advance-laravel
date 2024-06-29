<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HelloTest extends TestCase
{
  // データベースをテスト前の状態に戻す
  use RefreshDatabase;
  public function testHello()
  {
    // データ作成
    User::factory()->create([
        'name'=>'aaa',
        'email'=>'bbb@ccc.com',
        'password'=>'test12345'
    ]);
    // 該当データが存在するか確認
    $this->assertDatabaseHas('users',[
        'name'=>'aaa',
        'email'=>'bbb@ccc.com',
        'password'=>'test12345'
    ]);
  }
}