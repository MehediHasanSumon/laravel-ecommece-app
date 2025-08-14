<?php

namespace Database\Seeders;

use App\Models\Newsletter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsletterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsletters = [
            [
                'email' => 'subscriber1@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(30),
                'created_at' => now()->subDays(30),
                'updated_at' => now()->subDays(30),
            ],
            [
                'email' => 'subscriber2@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(25),
                'created_at' => now()->subDays(25),
                'updated_at' => now()->subDays(25),
            ],
            [
                'email' => 'subscriber3@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(20),
                'created_at' => now()->subDays(20),
                'updated_at' => now()->subDays(20),
            ],
            [
                'email' => 'subscriber4@example.com',
                'is_active' => false,
                'subscribed_at' => now()->subDays(15),
                'created_at' => now()->subDays(15),
                'updated_at' => now()->subDays(5),
            ],
            [
                'email' => 'subscriber5@example.com',
                'is_active' => true,
                'subscribed_at' => now()->subDays(10),
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(10),
            ],
        ];
        
        foreach ($newsletters as $newsletter) {
            Newsletter::create($newsletter);
        }
    }
}