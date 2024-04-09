<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Staff::class;
    
    public function definition()
    {
        return [
            //
          'title' => rtrim($this->faker->title(), '.'),
          'firstname' => $this->faker->firstName(),
          'lastname' => $this->faker->lastName(),
          'address1' => $this->faker->streetAddress(),
          'address2' => '',
          'towncity' => $this->faker->city(),
          'county' => '',
          'postcode' => $this->faker->postcode(),
          'email' => $this->faker->unique()->safeEmail(),
          'password' => password_hash('password', PASSWORD_DEFAULT),
          'position_id' => $this->faker->numberBetween(1, 8)
        ];
    }
}
