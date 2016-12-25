<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Like;
use App\Unlike;

class PersonController extends Controller
{
    public function destroy($id)
    {
        $like = Like::where('person_id', $id)->first();
        if (isset($like->id)) {
            Like::destroy($like->id);
        }
        $unlike = Unlike::where('person_id', $id)->first();
        if (isset($unlike->id)) {
            Unlike::destroy($unlike->id);
        }
        Person::destroy($id);
        return back();
    }
}
