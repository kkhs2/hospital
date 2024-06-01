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
          //'title' => rtrim($this->faker->title(), '.'),
          'title' => 'Mr',
          'firstname' => $this->faker->firstNameMale(),
          'middlename' => $this->faker->firstNameMale(),
          'lastname' => $this->faker->lastName(),
          'address1' => $this->faker->buildingNumber(),
          'address2' => $this->faker->streetAddress(),
          'towncity' => $this->faker->city(),
          'postcode' => $this->faker->postcode(),
          'county' => $this->faker->county(),
        ];
    }
}
