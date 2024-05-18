<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_index()
    {
        User::factory(10)->create();

        $response = $this->getJson('/users_test');
        $response->assertStatus(200);
        $response
            ->assertJson(fn (AssertableJson $json) => $json
                ->has('data.0', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.1', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.2', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.3', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.4', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.5', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.6', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.7', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.8', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )
                ->has('data.9', fn (AssertableJson $json) => $json
                    ->has('name')
                    ->has('email')
                    ->has('description', fn (AssertableJson $json) => $json
                        ->hasAny(range(0, User::COUNT_SKILL))
                    )
                )

            )
            ->assertStatus(200);
    }
}
