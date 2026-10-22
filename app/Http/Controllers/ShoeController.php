<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use Illuminate\Http\Request;

class ShoeController extends Controller
{
    public function index(Request $request)
    {
        $query = Shoe::query();

        if ($request->filled('sport')) {
            $query->where('sport_type', $request->sport);
        }

        if ($request->filled('search')) {
            $search = trim($request->input('search'));

            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%")
                    ->orWhere('sport_type', 'like', "%{$search}%");
            });
        }

        $shoes  = $query->orderBy('id')->paginate(8)->withQueryString();
        $sports = Shoe::select('sport_type')->distinct()->orderBy('sport_type')->pluck('sport_type');

        return view('shoes.index', compact('shoes', 'sports'));
    }

    public function show(Shoe $shoe)
    {
        return view('shoes.show', compact('shoe'));
    }
}
