<?php namespace App\Http\Controllers;

use App\Http\Libs\Search;
use App\Http\Requests\RequestSearch;
use App\Http\Requests\RequestTourOperator;
use App\Models\SocialEntities;
use App\Models\TourOperators;

class TourOperator extends Controller
{
    public function gets() {
        $searcher = Search::init(Search::ACTION_TOUR_OPERATORS, Search::COLUMNS_TOUR_OPERATORS);
        $operators = TourOperators::all();
        return view('tour-operator.gets', ['operators'=>$operators, 'searcher'=>$searcher]);
    }

    public function get(int $id) {
        $operator = TourOperators::findOrFail($id);
        $entities = SocialEntities::all();
        return view('tour-operator.get', ['operator' => $operator, 'entities'=>$entities]);
    }

    public function formCreate() {
        $entities = SocialEntities::all();
        return view('tour-operator.create', ['entities'=>$entities]);
    }

    public function create(RequestTourOperator $request) {
        $operator = new TourOperators();
        $operator->title = trim($request->input('title'));
        $operator->contact_name = trim($request->input('contact_name'));
        $operator->phone = trim($request->input('phone'));
        $operator->email = trim($request->input('email'));
        $operator->social_entities_id = trim($request->input('entity_id'));
        $operator->url_site = trim($request->input('url_site'));
        $operator->save();
        return redirect('tour-operators');
    }

    public function update(RequestTourOperator $request) {
        $operator = TourOperators::findOrFail($request->input('id'));
        $operator->title = trim($request->input('title'));
        $operator->contact_name = trim($request->input('contact_name'));
        $operator->phone = trim($request->input('phone'));
        $operator->email = trim($request->input('email'));
        $operator->social_entities_id = trim($request->input('entity_id'));
        $operator->url_site = trim($request->input('url_site'));
        $operator->save();
        return redirect('tour-operators');
    }

    public function delete(int $id) {
        $operator = TourOperators::findOrFail($id);
        $operator->delete();
        return redirect('tour-operators');
    }

    public function search(RequestSearch $request) {
        $text = $request->input('text');
        $column = $request->input('column');
        $searcher = Search::init(Search::ACTION_TOUR_OPERATORS, Search::COLUMNS_TOUR_OPERATORS);
        $operators = TourOperators::where($column, 'LIKE', '%'.$text.'%')->get();
        return view('tour-operator.gets', ['operators' => $operators, 'searcher'=>$searcher]);
    }

    public function info(int $id) {
        $operator = TourOperators::findOrFail($id);
        return view('tour-operator.info-form', ['operator' => $operator]);
    }
}
