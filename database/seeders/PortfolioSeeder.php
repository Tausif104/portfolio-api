<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('portfolios')->insert([
            [
                'title' => 'Project 1',
                'description' => 'Description 1',
                'image_url' => 'https://images.unsplash.com/photo-1671211359905-36bfec02f1e6?q=80&w=2670&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project 2',
                'description' => 'Description 2',
                'image_url' => 'https://images.unsplash.com/photo-1651234131825-5b415e44411e?q=80&w=2570&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project 3',
                'description' => 'Description 3',
                'image_url' => 'https://images.unsplash.com/photo-1713725869503-a3514dd41eab?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
