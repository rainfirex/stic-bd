<?php namespace App\Http\Controllers;

use App\Http\Libs\Search;
use App\Http\Requests\RequestLoyalSponsor;
use App\Http\Requests\RequestSearch;
use App\Models\LoyalSponsors;
use App\Models\SocialEntities;

class LoyalSponsor extends Controller
{
    public function gets() {
        $searcher = Search::init(Search::ACTION_LOYAL_SPONSORS, Search::COLUMNS_LOYAL_SPONSORS);
        $loyalSponsors = LoyalSponsors::all();
        return view('loyal-sponsor.gets', ['loyalSponsors'=>$loyalSponsors, 'searcher'=>$searcher]);
    }

    public function get(int $id) {
        $sponsor = LoyalSponsors::findOrFail($id);
        $entities = SocialEntities::all();
        return view('loyal-sponsor.get', ['sponsor' => $sponsor, 'entities'=>$entities]);
    }

    public function formCreate() {
        $entities = SocialEntities::all();
        return view('loyal-sponsor.create', ['entities'=>$entities]);
    }

    public function create(RequestLoyalSponsor $request) {
            $loyal = new LoyalSponsors();
            $loyal->title = trim($request->input('title'));
            $loyal->contact_name = trim($request->input('contact_name'));
            $loyal->phone = trim($request->input('phone'));
            $loyal->email = trim($request->input('email'));
            $loyal->social_entities_id = trim($request->input('entity_id'));
            $loyal->url_site = trim($request->input('url_site'));
            $loyal->save();
            return redirect('loyal-sponsors');
    }

    public function update(RequestLoyalSponsor $request) {
        $loyal = LoyalSponsors::findOrFail($request->input('id'));
        $loyal->title = trim($request->input('title'));
        $loyal->contact_name = trim($request->input('contact_name'));
        $loyal->phone = trim($request->input('phone'));
        $loyal->email = trim($request->input('email'));
        $loyal->social_entities_id = trim($request->input('entity_id'));
        $loyal->url_site = trim($request->input('url_site'));
        $loyal->save();
        return redirect('loyal-sponsors');
    }

    public function delete(int $id) {
        $item = LoyalSponsors::findOrFail($id);
        $item->delete();
        return redirect('loyal-sponsors');
    }

    public function search(RequestSearch $request) {
        $text = $request->input('text');
        $column = $request->input('column');
        $searcher = Search::init(Search::ACTION_LOYAL_SPONSORS, Search::COLUMNS_LOYAL_SPONSORS);
        $loyalSponsors = LoyalSponsors::where($column, 'LIKE', '%'.$text.'%')->get();
        return view('loyal-sponsor.gets', ['loyalSponsors' => $loyalSponsors, 'searcher'=>$searcher]);
    }

    public function info(int $id) {
        $loyal = LoyalSponsors::findOrFail($id);
        return view('loyal-sponsor.info-form', ['loyal' => $loyal]);
    }

}
