<?php

namespace App\Http\Controllers;
use ilumintent\support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = auth()->user();
        $categories = \App\Models\Category::all();
        return view('pages.dashboard-settings',[
            'user' => $user,
            'categories' => $categories
        ]);

    }

    public function account()
    {
        $user = auth()->user();
        return view('pages.dashboard-account',[
            'user' => $user,
        ]);
    }
    
    public function update(Request $request, $redirect_to)
    {
        $data = $request->all();
        $item = auth()->user();
        $item->update($data);
        return redirect()->route($redirect_to);
    }
}
