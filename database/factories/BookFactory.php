<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dom = new \DOMDocument();
        $dom->loadHTML($this->faker->randomHtml(1, 1));
        $items = $dom->getElementsByTagName("title");
        $title = $items->item(0)->nodeValue;
        $status = $this->faker->randomElement(['NA', 'A']);

        return [
            'customer_id' => Customer::factory(),
            'author' => $this->faker->name(),
            'title' => $title,
            'status' => $status,
            'given_date' => $status == 'NA' ? $this->faker->dateTimeThisMonth() : NULL
        ];
    }
}
