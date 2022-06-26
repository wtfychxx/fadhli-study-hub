<?php

namespace Database\Factories;

use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'authors' => $this->faker->name(),
            'publisher' => $this->faker->text(),
            'release_year' => $this->faker->numberBetween(1990, 2022),
            'page' => $this->faker->randomNumber(4, false),
            'stock' => $this->faker->randomNumber(2, false)
        ];
    }
}
