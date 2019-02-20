<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MaternalGuide;

class DatatableController extends Controller
{
    public function getUsers(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'first_name',
            1 => 'last_name',
            2 => 'birth_date',
            3 => 'phone',
            4 => 'email',
            5 => 'created_at',
            6 => 'updated_at',
        );

        $totalData = User::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = User::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = User::count();
        }else{
            $search = $request->input('search.value');
            $posts = User::where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name','like',"%{$search}%")
                ->orWhere('birth_date','like',"%{$search}%")
                ->orWhere('phone','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = User::where('first_name', 'like', "%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('last_name','like',"%{$search}%")
                ->orWhere('birth_date','like',"%{$search}%")
                ->orWhere('phone','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->count();
        }

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['first_name'] = $r->first_name;
                $nestedData['last_name'] = $r->last_name;
                $nestedData['birth_date'] = $r->birth_date;
                $nestedData['phone'] = $r->phone;
                $nestedData['email'] = $r->email;
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $nestedData['updated_at'] = date('d-m-Y H:i:s',strtotime($r->updated_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"			=> intval($request->input('draw')),
            "recordsTotal"	=> intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"			=> $data
        );

        echo json_encode($json_data);
    }

    public function getArticles(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'id',
            1 => 'title',
            2 => 'body',
            3 => 'cover_image',
            4 => 'created_at',
            5 => 'updated_at',
        );

        $totalData = MaternalGuide::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = MaternalGuide::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = MaternalGuide::count();
        }else{
            $search = $request->input('search.value');
            $posts = MaternalGuide::where('id', 'like', "%{$search}%")
                ->orWhere('title','like',"%{$search}%")
                ->orWhere('body','like',"%{$search}%")
                ->orWhere('cover_image','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = MaternalGuide::where('id', 'like', "%{$search}%")
                ->orWhere('title','like',"%{$search}%")
                ->orWhere('body','like',"%{$search}%")
                ->orWhere('cover_image','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->count();
        }

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['id'] = $r->id;
                $nestedData['title'] = $r->title;
                $nestedData['body'] = $r->body;
                $nestedData['cover_image'] = $r->cover_image;
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $nestedData['updated_at'] = date('d-m-Y H:i:s',strtotime($r->updated_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"			=> intval($request->input('draw')),
            "recordsTotal"	=> intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"			=> $data
        );

        echo json_encode($json_data);
    }

    public function getDoctors(Request $request){
        //print_r($request->all());
        $columns = array(
            0 => 'first_name',
            1 => 'last_name',
            2 => 'email',
            3 => 'created_at',
            4 => 'updated_at',
        );

        $totalData = User::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $posts = User::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = User::count();
        }else{
            $search = $request->input('search.value');
            $posts = User::where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = User::where('first_name', 'like', "%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('last_name','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhere('created_at','like',"%{$search}%")
                ->orWhere('updated_at','like',"%{$search}%")
                ->count();
        }

        $data = array();

        if($posts){
            foreach($posts as $r){
                $nestedData['first_name'] = $r->first_name;
                $nestedData['last_name'] = $r->last_name;
                $nestedData['email'] = $r->email;
                $nestedData['created_at'] = date('d-m-Y H:i:s',strtotime($r->created_at));
                $nestedData['updated_at'] = date('d-m-Y H:i:s',strtotime($r->updated_at));
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"			=> intval($request->input('draw')),
            "recordsTotal"	=> intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"			=> $data
        );

        echo json_encode($json_data);
    }


}

