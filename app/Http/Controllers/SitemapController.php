<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'url' => route('frontend'),
                'updated_at' => '2024-08-28 17:00:00',
                'freq' => 'daily',
                'priority' => '1'
            ],
            [
                'url' => route('frontend.bromo'),
                'updated_at' => '2024-08-28 17:00:00',
                'freq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => route('frontend.contact'),
                'updated_at' => '2024-08-28 17:00:00',
                'freq' => 'weekly',
                'priority' => '0.8'
            ],
            [
                'url' => route('frontend.kebijakan_privasi'),
                'updated_at' => '2024-08-28 17:00:00',
                'freq' => 'weekly',
                'priority' => '0.8'
            ],
        ];

        return response()->view('frontend.sitemap',compact('posts'))->header('Content-Type', 'text/xml');
    }
}
