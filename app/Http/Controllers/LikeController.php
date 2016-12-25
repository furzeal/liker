<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\VK;
use App\Person;
use App\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class LikeController extends Controller
{
    public function store($id)
    {
        $vk = new VK();
        $vk_user = $vk->getPerson($id);
        // Create person
        $person = new Person();
        $person->name = $vk_user['first_name'];
        $person->surname = $vk_user['last_name'];
        $person->save();
        $filename = "person-$person->id.jpg";
        $directory = "img\\people\\";
        $filename = "\\" . $directory . $filename;
        $fileContent = file_get_contents($vk_user['photo_400_orig']);
        if (Storage::put('\\public'.$filename, $fileContent)) {
            $person->photo = "\\storage".$filename;
            $person->save();
        }
        // Like person
        $like = new Like();
        $like->person_id = $person->id;
        $like->save();
        return back();
    }
}
