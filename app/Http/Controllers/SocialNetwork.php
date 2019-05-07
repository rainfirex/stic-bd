<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPlacementUpdate;
use App\Http\Requests\RequestSocialNetworks;
use App\Models\SocialEntities;
use Illuminate\Http\Request;
use \App\Models\SocialNetworks;

class SocialNetwork extends Controller
{
    public function gets() {
        $socials = SocialNetworks::all();
        return view('social-networks.gets', ['socials'=>$socials]);
    }

    public function formCreate() {
        $entities = SocialEntities::all();
        return view('social-networks.create', [
            'entities'=>$entities
        ]);
    }

    public function create(RequestSocialNetworks $request) {
        SocialNetworks::create([
            'title_id' => trim($request->input('title_id')),
            'type'  => trim($request->input('type')),
            'url'   => trim($request->input('url'))
        ]);
        return redirect(route('social-networks'));
    }

    public function update(RequestPlacementUpdate $request) { }

    public function delete(int $id) {
        $social = SocialNetworks::findOrFail($id);
        $social->delete();
        return redirect(route('social-networks'));
    }
}
