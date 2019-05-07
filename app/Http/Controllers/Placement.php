<?php namespace App\Http\Controllers;

use App\Http\Libs\Search;
use App\Http\Middleware\GuardPages;
use App\Http\Requests\RequestPlacementCreate;
use App\Http\Requests\RequestPlacementUpdate;
use App\Http\Requests\RequestSearch;
use App\Models\Placements;
use App\Models\SocialEntities;
use App\Models\TypePlacements;


class Placement extends Controller
{
    public function gets() {
        $searcher = Search::init(Search::ACTION_PLACEMENTS, Search::COLUMNS_PLACEMENTS);
        $placements = Placements::all()->sortBy('title');
        return view('placement.gets', ['placements'=>$placements,'searcher'=>$searcher]);
    }

    public function get(int $id) {
        $placement = Placements::findOrFail($id);
        $entities = SocialEntities::all()->sortBy('title');
        $types = TypePlacements::all()->sortBy('title');
        return view('placement.get', ['placement' => $placement,'types'=>$types, 'entities'=> $entities]);
    }

    public function formCreate() {
        $types = TypePlacements::all()->sortBy('title');
        $entities = SocialEntities::all()->sortBy('title');
        return view('placement.create', ['types'=>$types, 'entities'=>$entities]);
    }

    public function create(RequestPlacementCreate $request) {
            $placement = new Placements();
            $placement->title = trim($request->input('title'));
            $placement->type_id  = trim($request->input('type_id'));
            $placement->number_of_stars = $request->input('number_of_stars');
            $placement->address         = trim($request->input('address'));
            $placement->contact_name    = trim($request->input('contact_name'));
            $placement->phone = trim($request->input('phone'));
            $placement->email = trim($request->input('email'));
            $placement->social_entities_id = trim($request->input('entity_id'));
            $placement->url_site = trim($request->input('url_site'));
            $placement->save();
            return redirect(route('placements'));
    }

    public function update(RequestPlacementUpdate $request) {
        $placement = Placements::findOrFail($request->input('id'));
        $placement->title = trim($request->input('title'));
        $placement->type_id  = trim($request->input('type_id'));
        $placement->number_of_stars = $request->input('number_of_stars');
        $placement->address         = trim($request->input('address'));
        $placement->contact_name    = trim($request->input('contact_name'));
        $placement->phone = trim($request->input('phone'));
        $placement->email = trim($request->input('email'));
        $placement->social_entities_id = trim($request->input('entity_id'));
        $placement->url_site = trim($request->input('url_site'));
        $placement->save();
        return redirect(route('placements'));
    }

    public function delete(int $id) {
        $placement = Placements::findOrFail($id);
        $placement->delete();
        return redirect(route('placements'));
    }

    public function search(RequestSearch $request) {
        $text = $request->input('text');
        $column = $request->input('column');
        $searcher = Search::init(Search::ACTION_PLACEMENTS, Search::COLUMNS_PLACEMENTS);
        if ($column === 'type_id') {
            $type = TypePlacements::where('title', 'LIKE', '%'.$text.'%')->first();
            $placements = $type->placements;
        } else
            $placements = Placements::where($column, 'LIKE', '%'.$text.'%')->get();

        return view('placement.gets', ['placements'=>$placements, 'searcher'=>$searcher]);
    }

    public function info(int $id) {
        $placement = Placements::findOrFail($id);
        return view('placement.info-form', ['placement' => $placement]);
    }
}