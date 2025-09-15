<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
     */

    public function definition(): array
    {
        // ---------- OPÇÃO 1: URL FAKE (sem criar arquivo) ----------
        $thumbUrl = $this->faker->imageUrl(640, 480, 'people');

        // ---------- OPÇÃO 2: ARQUIVO REAL NA PASTA PUBLIC ----------
        $path = public_path('images/users');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $thumbFile = $this->faker->image($path, 640, 480, null, false); 
        $thumbPath = 'images/users/' . $thumbFile; // caminho relativo para usar no navegador

        return [
            'firstName' => $this->faker->firstName(),
            'lastName'  => $this->faker->lastName(),
            'email'     => $this->faker->unique()->safeEmail(),
            
            // Escolha a opção que você quer usar:
            // 'thumb' => $thumbUrl,   // opção URL fake
            'thumb' => $thumbPath,    // opção arquivo real
            
            'password'  => bcrypt('123'),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
