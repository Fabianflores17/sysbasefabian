<?php

namespace Database\Factories;

use App\Models\Servicio;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\SoporteCliente;
use App\Models\SoporteEquipo;
use App\Models\User;

class ServicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servicio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'usuario_id' => $this->faker->word,
            'cliente_id' => $this->faker->word,
            'equipo_id' => $this->faker->word,
            'problema' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'solucion' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'recomendaciones' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'fecha_recibido' => $this->faker->date('Y-m-d H:i:s'),
            'fecha_inicio' => $this->faker->date('Y-m-d H:i:s'),
            'fecha_fin' => $this->faker->date('Y-m-d H:i:s'),
            'fecha_entrega' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
