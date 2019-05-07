<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialEntities;

class SocialEntity extends Controller
{
    public function formCreate() {
        $entities = SocialEntities::all();
        return view('social-entities.create', ['entities' => $entities]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required|unique:social_entities'
        ], [
            'title.required' => 'Поле заголовка обязательно для заполнения.',
            'title.unique' => 'Название уже занято.',
        ]);

        SocialEntities::create(['title' => trim($request->input('title'))]);
        return redirect(route('form-create-entity'));
    }

    public function delete(int $id) {
        $entity = SocialEntities::findOrFail($id);
        $entity->delete();
        return redirect(route('form-create-entity'));
    }
}
