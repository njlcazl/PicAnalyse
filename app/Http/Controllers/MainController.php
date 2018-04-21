<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Picture;

class MainController extends Controller
{
    public function index() {
        $pictures = Picture::paginate(50);
        return view('main', [
            'pictures' => $pictures,
            'keywords' => '',
        ]);
    }

    public function search(Request $request) {
        $keywords = $request->get("keywords");
        $pictures = Picture::where('title','like','%'.$keywords.'%')->paginate(50);
        return view('main', [
            'pictures' => $pictures,
            'keywords' => $keywords
        ]);
    }
}
