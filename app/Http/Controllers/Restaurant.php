<?php namespace App\Http\Controllers;

use App\Http\Libs\Search;
use App\Http\Requests\RequestRestaurant;
use App\Http\Requests\RequestSearch;
use App\Models\Restaurants;
use App\Models\SocialEntities;

class Restaurant extends Controller
{
    public function gets() {
        $searcher = Search::init(Search::ACTION_RESTAURANTS, Search::COLUMNS_RESTAURANTS);
        $restaurants = Restaurants::all();
        return view('restaurant.gets', ['restaurants'=>$restaurants, 'searcher'=>$searcher]);
    }

    public function get(int $id) {
        $restaurant = Restaurants::findOrFail($id);
        $entities = SocialEntities::all();
        return view('restaurant.get', ['restaurant'=> $restaurant, 'entities'=> $entities]);
    }

    public function formCreate() {
        $entities = SocialEntities::all();
        return view('restaurant.create', ['entities'=>$entities]);
    }

    public function create(RequestRestaurant $request) {
        $restaurant = new Restaurants();
        $restaurant->title = trim($request->input('title'));
        $restaurant->contact_name = trim($request->input('contact_name'));
        $restaurant->phone = trim($request->input('phone'));
        $restaurant->email = trim($request->input('email'));
        $restaurant->social_entities_id = trim($request->input('entity_id'));
        $restaurant->url_site = trim($request->input('url_site'));
        $restaurant->save();
        return redirect('restaurants');
    }

    public function update(RequestRestaurant $request) {
        $restaurant = Restaurants::findOrFail($request->input('id'));
        $restaurant->title = trim($request->input('title'));
        $restaurant->contact_name = trim($request->input('contact_name'));
        $restaurant->phone = trim($request->input('phone'));
        $restaurant->email = trim($request->input('email'));
        $restaurant->social_entities_id = trim($request->input('entity_id'));
        $restaurant->url_site = trim($request->input('url_site'));
        $restaurant->save();
        return redirect('restaurants');
    }

    public function delete(int $id) {
        $item = Restaurants::findOrFail($id);
        $item->delete();
        return redirect('restaurants');
    }

    public function search(RequestSearch $request) {
        $text = $request->input('text');
        $column = $request->input('column');
        $searcher = Search::init(Search::ACTION_RESTAURANTS, Search::COLUMNS_RESTAURANTS);
        $restaurants = Restaurants::where($column, 'LIKE', '%'.$text.'%')->get();
        return view('restaurant.gets', ['restaurants' => $restaurants, 'searcher'=>$searcher]);
    }

    public function info(int $id) {
        $restaurant = Restaurants::findOrFail($id);
        return view('restaurant.info-form', ['restaurant' => $restaurant]);
    }
}
