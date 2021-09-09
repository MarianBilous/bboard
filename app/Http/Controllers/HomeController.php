<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.pages.main');
    }

    /**
     * Return the markup of the updated page.
     *
     * @param Request $request
     * @return string
     */
    public function renderView(Request $request)
    {
        $message = now()->format('Y-m-d H:i:s');

        return view('admin.includes.chat_body', compact('message'))->render();
    }
}
