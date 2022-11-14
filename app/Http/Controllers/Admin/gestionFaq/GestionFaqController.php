<?php

namespace App\Http\Controllers\Admin\gestionFaq;

use App\Models\Faq;
use App\Models\FaqTheme;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GestionFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::with('faqTheme')->where('soft_deleted', NULL)->get();
        $faqThemes = FaqTheme::all();
        return view('admin.gestionFaq.faq-index', ['faqs' => $faqs, 'faqThemes' => $faqThemes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $request['user_id'] = Auth::user()->id;
        $faq = Faq::create($request->all());
        return back()->with('FaqCreated', "La question/réponse a été créé");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $faq = Faq::firstWhere('id', $request->id);
        $faqs = Faq::with('faqTheme')->where('soft_deleted', NULL)->get();
        $faqThemes = FaqTheme::all();

        return view('admin.gestionFaq.faq-edit', ['faqs' => $faqs, 'faq' => $faq, 'faqThemes' => $faqThemes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        $validatedData = $request->validated();
        $request['user_id'] = Auth::user()->id;
        if (empty($request['is_active'])) {
            $request['is_active'] = 0;
        }
        Faq::find($request->faq_id)->update($request->all());
        return back()->with('FaqCreated', "La question/réponse a été modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::find($id);
        $faq->soft_deleted = date('Y-m-d h:i:s');
        $faq->save();
        return back()->with('faqDeleted',  "La question à été supprimée");
    }
}
