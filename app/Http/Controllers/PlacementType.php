<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePlacements;
use App\Http\Requests\RequestPlacementType;

class PlacementType extends Controller
{
    public function gets() {
        $types = TypePlacements::all();
        return view('placement-type.form-create-type', ['types'=>$types]);
    }

    public function create(RequestPlacementType $request) {
        $title = $request->input('title');
        TypePlacements::create(['title'=>$title]);
        return redirect(route('form-create-type'));
    }

    public function delete(int $id) {
        $type = TypePlacements::findOrFail($id);
        $type->delete();
        return redirect(route('form-create-type'));
    }
}
