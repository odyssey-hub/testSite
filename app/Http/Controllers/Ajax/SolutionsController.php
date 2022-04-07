<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionsController extends Controller
{
    public function send(Request $request)
    {
        $solution = new Solution();
        $solution->header = $request->input('header');
        $solution->content= $request->input('content');
        $solution->save();

        return $solution->id;
    }

    public function edit(Request $request)
    {
        $id = $request->input('id');
        $solution = Solution::find($id);
        $solution->header = $request->input('header');
        $solution->content = $request->input('content');
        $solution->save();
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $solution = Solution::find($id);
        $solution->delete();
    }
}
