<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index(Request $req)
    {
        $user = $req->user();

        // SuperAdmin → cannot view all
        if ($user->hasRole('SuperAdmin')) {
            return response()->json(['message' => 'SuperAdmin cannot view all URLs'], 403);
        }

        // Admin → cannot see own company URLs
        if ($user->hasRole('Admin')) {
            return ShortUrl::where('company_id', '!=', $user->company_id)->get();
        }

        // Member → cannot see URLs created by themselves
        if ($user->hasRole('Member')) {
            return ShortUrl::where('created_by', '!=', $user->id)->get();
        }

        // Sales + Manager → can view all
        return ShortUrl::all();
    }


    public function store(Request $req)
    {
        $user = $req->user();

        if (
            $user->hasRole('SuperAdmin') ||
            $user->hasRole('Admin') ||
            $user->hasRole('Member')
        ) {
            return response()->json(['message' => 'You cannot create short URLs'], 403);
        }

        $req->validate([
            'original_url' => 'required|url'
        ]);

        $slug = Str::random(6);

        return ShortUrl::create([
            'slug' => $slug,
            'original_url' => $req->original_url,
            'created_by' => $user->id,
            'company_id' => $user->company_id,
        ]);
    }


    public function resolve($slug)
    {
        $short = ShortUrl::where('slug', $slug)->first();

        if (!$short) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return ['redirect_to' => $short->original_url];
    }
}
