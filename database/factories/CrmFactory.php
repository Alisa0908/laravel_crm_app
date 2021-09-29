<?php

namespace Database\Factories;

use App\Models\Crm;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Crm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('ja_JP');
        
        return [
            'name' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'crm' => $faker->postcode(),
            'address' => $faker->prefecture() . $faker->city() . $faker->streetAddress(),
            'phone' => $faker->phoneNumber()
        ];
    }
}
