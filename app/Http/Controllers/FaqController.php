<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function index()
    { 
        $faqs = Faq::where([['is_active', 1], ['soft_deleted', NULL]])->get();

        return view('public.faq', ['faqs' => $faqs]);
    }
}
