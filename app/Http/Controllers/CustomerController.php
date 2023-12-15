<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $d['model']=User::get();
        return view('User.index',$d);
        
    }

    public function registerform(){
        return view('User.create');
    }

    public function create(Request $request){
        $model=new User;
        $model->name = $request->name;
        $model->address = $request->address;
        $model->pnumber = $request->pnumber;
        $model->password = $request->password;
        $model->email = $request->email;
        $model->datbirth = $request->datebirth;
        $model->save();
        return redirect()->route('index-user');
    }

    public function show($id){
        $model=User::where('id',$id)->first();
        return view('User.show',compact('model'));
    }

    public function editForm($id){
        $d['model']=User::where('id',$id)->first();
        return view('User.edit',$d);
    }

    public function update(Request $request,$id){
        $model=User::where('id',$id);
        $model->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'pnumber'=>$request->pnumber,
            'password'=>$request->password,
            'email' => $request->email,
            'datebirth' => $request->datebirth,
        ]);
        return redirect()->route('index-user');
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect()->route('index-user');
    } 
}
