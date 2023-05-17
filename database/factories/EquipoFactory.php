<?php

namespace Database\Factories;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\SoporteEquipoTipo;

class EquipoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $soporteEquipoTipo = SoporteEquipoTipo::first();
        if (!$soporteEquipoTipo) {
            $soporteEquipoTipo = SoporteEquipoTipo::factory()->create();
        }

        return [
            'tipo_id' => $this->faker->word,
            'numero_serie' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'imei' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'observaciones' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
