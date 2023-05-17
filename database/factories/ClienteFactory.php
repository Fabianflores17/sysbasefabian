<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;


class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'nombres' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'apellidos' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'dpi' => $this->faker->text($this->faker->numberBetween(5, 13)),
            'telefono' => $this->faker->text($this->faker->numberBetween(5, 20)),
            'direccion' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'correo' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
