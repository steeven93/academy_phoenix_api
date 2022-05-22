<?php

namespace App\Http\Controllers;

use App\Models\ExpressionNumberCategory;
use Illuminate\Http\Request;

class ExpressionNumberCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ExpressionNumberCategory::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = ExpressionNumberCategory::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpressionNumberCategory  $expressionNumberCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpressionNumberCategory $expressionNumberCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpressionNumberCategory  $expressionNumberCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpressionNumberCategory $expressionNumberCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpressionNumberCategory  $expressionNumberCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpressionNumberCategory $expressionNumberCategory)
    {
        $expressionNumberCategory->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpressionNumberCategory  $expressionNumberCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpressionNumberCategory $expressionNumberCategory)
    {
        $expressionNumberCategory->delete();
    }
}
