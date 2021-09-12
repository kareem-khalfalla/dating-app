<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from' => User::all()->random()->id,
            'to' => User::all()->random()->id,
            'content' => $this->faker->sentence(),
            'is_read' => rand(0, 1),
        ];
    }
}
