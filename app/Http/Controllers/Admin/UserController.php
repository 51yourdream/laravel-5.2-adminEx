<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        /*验证方法二*/
        if($this->authorize('user-list')){
            return view('admin.user.index')->withUsers(User::paginate(5));
        }else{
            return view('errors.authErrors');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        /*验证方法一*/
        if($request->user()->can('user-add')){
            return view('admin.user.create');
        }else{
            return view('errors.authErrors');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:225',
            'email'=>'required|unique:users|max:225',
            'password'=>'required|min:6|max:32|confirmed',
            'password_confirmation'=>'required|min:6'
        ]);

        if($this->authorize('user-add')){
            $user = new User();
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            if($user->save()){
                return Redirect::to('admin/users');
            }else{
                return Redirect::back()->withInput()->withErrors('保存失败!');
            }
        }else{
            return view('errors.authErrors');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        echo '展示 '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin.user.edit')->withUser(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title'=>'required|unique:pages,title,'.$id.'|max:225',
            'body'=>'required'
        ]);
        $page = Page::find($id);
        $page->title = Input::get('title');
        $page->body = Input::get('body');
        $page->user_id = 1;//Auth::user()->id;
        if($page->save()){
            return Redirect::to('admin');
        }else{
            return Redirect::back()->withInput()->withErrors('保存失败!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return Redirect::to('admin');
    }
}
