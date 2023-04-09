<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(1, 3)),
            'slug' => $this->faker->slug(),
            'exerpt' => $this->faker->paragraph(),
            // 'body' => '<p>'.implode('</p><p>',$this->faker->paragraphs(mt_rand(5,50), true)).'</p>',
            // 'body' => collect($this->faker->paragraphs(mt_rand(5,50), true))
            //             ->map(function($prg)
            //             {
            //                 return "<p>$prg</p>";
            //             })->implode(''),
            'body' => collect($this->faker->paragraphs(mt_rand(5,50)))
                        ->map(fn($prg) => "<p style='text-align: justify;'>$prg</p>")
                        ->implode(''),
            'category_id' => rand(1, 3),
            'user_id' => rand(1, 5)
        ];
    }
}
