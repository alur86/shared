<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Note;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
           'title' => $this->faker->word,
           'link' => $this->faker->url,
           'body'=>$this->faker->text($maxNbChars = 200),
           'user_id' => User::factory(),
           'is_public'=>$this->faker->boolean,

        ];
    }
}
