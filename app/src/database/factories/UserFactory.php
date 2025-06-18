<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    protected $model = User::class;


    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $scheduled_date = $this->faker->dateTimeBetween('+1day', '1year');
        return [
            'name' => $this->faker->unique()->name(),
            'lvl' => $this->faker->numberBetween(1, 100),
            'exp' => $this->faker->randomNumber(3),
            'clan' => $this->faker->numberBetween(0, 3),
            'created_at' => $scheduled_date->format('Y-m-d H:i:s'),
            'updated_at' => $scheduled_date->modify('+1hour')->format('Y-m-d H:i:s')
        ];
    }
    /* public function definition(): array
     {
         return [
             'name' => fake()->name(),
             'email' => fake()->unique()->safeEmail(),
             'email_verified_at' => now(),
             'password' => static::$password ??= Hash::make('password'),
             'remember_token' => Str::random(10),
         ];
     }
    */

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
