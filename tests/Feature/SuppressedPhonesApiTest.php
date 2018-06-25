<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SuppressedPhonesApiTest extends TestCase
{
  use WithFaker;
  use RefreshDatabase;

  public function testPostingNewSuppressedPhone()
  {
    $header = [];
    $phone = factory('App\SuppressedPhone')->make();
    $response = $this->json('post', '/api/v1/suppressed-phones', $phone->toArray(), $header);
    
    $response 
      ->assertStatus(201)
      ->assertJsonStructure([
        'id',
        'trunk_code',
        'phone',
        'sms',
        'voicemail',
        'created_at',
        'updated_at'
      ])
      ->assertJson($phone->toArray());

  }

  public function testListingSuppressedPhones()
  {
    $phones = factory('App\SuppressedPhone', 3)->make();
    $phones->each(function($phone) {
      $header = [];
      $this->json('post', '/api/v1/suppressed-phones', $phone->toArray(), $header);
    });

    $response = $this->json('get', '/api/v1/suppressed-phones');

    $response
      ->assertStatus(200)
      ->assertJsonStructure([
        'total',
        'results'
      ])
      ->assertJson([
        'total' => count($phones),
        'results' => $phones->toArray(),
      ]);
  }

  public function testDeletingExistingSuppressedPhone()
  {
    $phone = factory('App\SuppressedPhone')->create();
    $header = [];

    $response = $this->json('delete', '/api/v1/suppressed-phones/'.$phone->id, [], $header);
    $response->assertStatus(204);

    $response = $this->json('get', '/api/v1/suppressed-phones', [], $header);
    $response
      ->assertStatus(200)
      ->assertJson([
        'total' => 0,
        'results' => [],
      ]);
  }
}
