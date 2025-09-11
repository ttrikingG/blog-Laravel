<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        // ---------- OPÇÃO 1: URL FAKE (sem criar arquivo) ----------
        $thumbUrl = $this->faker->imageUrl(640, 480, 'cats');

        // ---------- OPÇÃO 2: ARQUIVO REAL NA PASTA PUBLIC ----------
        $path = public_path('images/posts');
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $thumbFile = $this->faker->image($path, 640, 480, null, false); 
        $thumbPath = 'images/posts/' . $thumbFile; // caminho relativo para navegador

        return [
            'title'   => $title,
            'slug'    => Str::slug($title),
            'user_id' => User::pluck('id')->random(),
            'content' => $this->faker->paragraph(),

            // Escolha a opção que quer usar:
            // 'thumb' => $thumbUrl,   // opção URL fake
            'thumb' => $thumbPath,    // opção arquivo real
        ];
    }
}
