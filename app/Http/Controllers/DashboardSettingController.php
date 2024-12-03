<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();  // Ganti dengan Auth::user() untuk konsistensi
        $categories = \App\Models\Category::all();
        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        if ($user === null) {
            abort(403, 'You are not authorized to access this page.');
        }

        $user = Auth::user();  // Ganti dengan Auth::user() untuk konsistensi
        return view('pages.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect_to)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',   // Contoh validasi untuk name
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),  // Validasi email
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        try {
            $item = Auth::user();
            $item->update($validatedData);  // Update hanya dengan data yang tervalidasi
            return redirect()->route($redirect_to)->with('success', 'Your profile has been updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update profile: ' . $e->getMessage()]);
        }
    }
}

