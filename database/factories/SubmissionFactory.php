<?php

namespace Database\Factories;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Submission>
 */
class SubmissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'father_name' => fake()->name('male'),
            'address' => fake()->address(),
            'city' => fake()->randomElement(['Lahore', 'Faisalabad', 'Karachi', 'Islamabad', 'Multan', 'Rawalpindi']),
            'whatsapp' => fake()->phoneNumber(),
            'photo_path' => null,
            'status' => fake()->randomElement(['Student', 'Employed', 'Business Owner', 'Freelancer']),
            'qualification' => fake()->randomElement(['BS Computer Science', 'BBA', 'MSc', 'FSc', 'Matric']),
            'batch' => fake()->numberBetween(2018, 2026),
            'job_role' => fake()->jobTitle(),
            'company' => fake()->company(),
            'skills' => fake()->words(4, true),
            'achievement' => fake()->sentence(),
            'contributions' => fake()->randomElements([
                'Teaching', 'Mentorship', 'Career Guidance', 
                'Social Media', 'Fundraising', 'Events', 'IT Support'
            ], fake()->numberBetween(1, 3)),
            'availability' => fake()->randomElement(['Weekly', 'Monthly', 'Only for Events', 'Online Only', 'As Needed']),
            'seriousness' => fake()->randomElement([
                'Yes, I am ready to contribute actively', 
                'Maybe, depending on the opportunity', 
                'No, only want to stay connected'
            ]),
            'suggestions' => fake()->optional()->sentence(),
        ];
    }
}
