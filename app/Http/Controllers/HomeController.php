<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\VK;
use App\Person;
use App\Like;
use App\Unlike;

class HomeController extends Controller
{
//    protected $person;
//    public function __construct()
//    {
//        dd($this->getUsers());
//    }

    public function index()
    {
        $users=$this->getUsers();
        $liked=Like::leftjoin('people','likes.person_id','=','people.id')->paginate(4);
        $unliked=Unlike::leftjoin('people','unlikes.person_id','=','people.id')->paginate(4);
        $data['person'] = $this->getPerson($users);
        $data['liked'] = $liked;
        $data['unliked'] = $unliked;
        return view('home',$data);
    }

    private function getPerson($users)
    {
        $index=random_int(0,count($users)-1);
        $vk=new VK();
        $id=$users[$index]['id'];
        return $vk->getPerson($id);
    }
    private function getUsers()
    {
        $vk=new VK();

        while (!isset($users)) {
            $users=$vk->getUsers();
        }
        return $vk->getUsers()['response']['items'];
    }
}
