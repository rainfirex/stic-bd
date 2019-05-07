<?php namespace App\Http\Controllers;

use App\Http\Libs\Search;
use App\Http\Requests\RequestGuide;
use App\Http\Requests\RequestSearch;
use App\Models\Guides;

class Guide extends Controller
{
    public function gets() {
        $searcher = Search::init(Search::ACTION_GUIDES, Search::COLUMNS_GUIDES);
        $guides = Guides::all();
        return view('guide.gets', ['guides' => $guides, 'searcher'=>$searcher]);
    }

    public function get(int $id) {
        $guide = Guides::findOrFail($id);
        return view('guide.get', ['guide' => $guide]);
    }

    public function create(RequestGuide $request) {
        $guide = new Guides();
        $guide->company_name = $request->input('company_name');
        $guide->fullname = $request->input('fullname');
        $guide->Education = $request->input('education');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');
        $guide->save();
        return redirect('guides');
    }

    public function update(RequestGuide $request) {
        $id = $request->input('id');
        $guide = Guides::findOrFail($id);
        $guide->company_name = $request->input('company_name');
        $guide->fullname = $request->input('fullname');
        $guide->Education = $request->input('education');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');
        $guide->save();
        return redirect('guides');
    }

    public function delete(int $id) {
        $item = Guides::findOrFail($id);
        $item->delete();
        return redirect('guides');
    }

    public function search(RequestSearch $request) {
        $text = $request->input('text');
        $column = $request->input('column');
        $searcher = Search::init(Search::ACTION_GUIDES, Search::COLUMNS_GUIDES);
        $guides = Guides::where($column, 'LIKE', '%'.$text.'%')->get();

        return view('guide.gets', ['guides' => $guides, 'searcher'=>$searcher]);
    }

    public function info(int $id) {
        $guide = Guides::findOrFail($id);
        return view('guide.info-form', ['guide' => $guide]);
    }

}
