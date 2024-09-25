<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = Url::where('user_id', Auth::id())->get();

        return view('url.index', compact('urls'));
    }

    public function create()
    {
        return view('url.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UrlRequest $request)
    {
        $url = $request->validated();
        $url['user_id'] = Auth::id();
        $url['shorten_url'] = Str::random(7);
        Url::create($url);

        return redirect()->route('url.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        return view('url.edit', compact('url'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UrlRequest $request, Url $url)
    {
        $updateUrl = $request->validated();
        $updateUrl['shorten_url'] = Str::random(7);
        $url->update($updateUrl);

        return redirect()->route('url.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();

        return redirect()->route('url.index');
    }

    public function shortenLink($shorten_url)
    {
        $url = Url::where('shorten_url', $shorten_url)->first();

        if ($url) {
            $url->increment('click_count');

            return redirect($url->original_url);
        }
    }
}
