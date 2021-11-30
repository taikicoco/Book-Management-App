<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers;
use Response;
use App\User;
use Illuminate\Support\Facades\Validator;//バリデーション
use Illuminate\Support\Facades\Auth;//ログインユーザー取得

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    public function users_list()
    {
        $users=User::all();
        return view('users.list',[
                    'users'=>$users,
                    ]);
    }
    
    public function users_add()
    {
        
    }
    
     public function users_edit($id)
    {
        $auth = Auth::user();
        $user_id = $auth->id;
        $users=User::all();
        if ($id != $user_id){
            $messages = ['ログインアカウントのみ編集可能です'];
            return view('users.list',[
                'messages' => $messages,
                'users' => $users,
                ]);
        }
        $user=User::find($id);
        return view('users.edit',[
                    'user'=>$user,
                    ]);
    }
    
    //ユーザー詳細変更put
    public function users_update(Request $request,$id)
    {
        $state = $request->state;
        $auth = Auth::user();
        $user_id = $auth->id;
        $users = User::all();
        $user = User::find($id);
       
        if($id == $user_id)
        {
            if($state=='DELETE'){
                $user_name = User::find($id);
                $user_name = $user_name->email;
                $this->user_delete($id);
               
                $messages = [$user_name.'を削除しました'];
                return view('auth.login',[
                        'messages' => $messages,
                        ]);
                            
            }else{
               
                $this->validate($request,[
                    'name' => 'required',
                    'password' => 'confirmed',
                    ]);
                    
                if(($request->password) != ($request->password_confirmation))
                {
                    $messages = ['passwordとconfirmationが異なります'];
                    return view('users.edit',[
                            'user'=>$user,
                            'messages' => $messages,
                             ]);
                }
            
                
                $user->name = $request->name;
                $ps = $request->password;
                
                if(filled($ps)){
                    $user->password = bcrypt($request->password);
                    $messages = ['パスワードを更新しました'];
                }
                
                $user->save();
                
                array_push($messages,'ユーザー名を'.$user->name.'に変更しました');
               
            
            return view('users.edit',[
                'user'=>$user,
                'messages' => $messages,
                 ]);
            }
            
        }else{
            
            $messages = ['ログインアカウントのみ変更可能です'];
            return view('users.list',[
                'messages' => $messages,
                'users' => $users,
                ]);
           
        }
        
       
    }
    //ユーザー削除delete
    public function user_delete($id)
    {
        $user=User::find($id);
        $user->delete();
    }
    
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
