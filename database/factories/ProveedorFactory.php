<?php

namespace Database\Factories;

use App\Models\Proveedor;
use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cliente_id' => Cliente::factory(),
            'nombres' => $this->faker->nombres,
            'apellidos' => $this->faker->apellidos, 
            'tipo_documento' => $this->faker->number(2),
            'nro_documento' => $this->faker->number(2),
            'genero' => $this->faker->genero,
            'celular1' => $this->faker->number(2),
            'celular2' => $this->faker->number(2),
            'diraccion' => $this->faker->number(2),
            'correo' => $this->faker->number(2),
        ];
    }
}
