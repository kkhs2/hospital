<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Patient::class;

    public function definition(): array
    {
        return [
            //
          'title' => rtrim($this->faker->title(), '.'),
          'firstname' => $this->faker->firstName(),
          'middlename' => $this->faker->firstName(),
          'lastname' => $this->faker->lastName(),
          'address1' => $this->faker->buildingNumber(),
          'address2' => $this->faker->streetName(),
          'towncity' => $this->faker->city(),
          'postcode' => $this->faker->postcode(),
          'county' => $this->faker->county(),
          
          
        ];
    }
}
