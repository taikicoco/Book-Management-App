<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers;

use App\Application;
use App\AccessId;
use App\AccessUrl;
use App\User;
use App\Task;
use App\Note;
use Response;
use App\AccessMnagement;
use Illuminate\Support\Facades\Validator;//バリデーション
use Illuminate\Support\Facades\Auth;//ログインユーザー取得


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_login');
    }
    
    public function index()
    {
        return view('index');
    }
    
    public function task_list(Request $request)
    {
        $tasks=Task::all();
                        //paginate(10);
        //dd(1);
        return view('admin.task.list', [
            'tasks' => $tasks,
            ]);
    }
    
    public function task_add($id)
    {
        $note_number = 1;
        $task = Task::firstOrNew(['id' => '0']);
      
        return view('admin.task.add',[
            'task' => $task,
            'note_number' => $note_number,
            ]);
    }
    
        public function task_add_form(Request $request)
    {
        if($request->id != 0){
            $task = Task::find($request->id);
            
            if($task->note_number < $request->note_number)
            {
                $task->note_number = $request->note_number;
            }elseif($task->note_number > $request->note_number){
                $messages = ['既存のフォーム数より減らすことは出来ません'];
                return view('admin.task.edit',[
                'task' => $task,
                'messages' => $messages,
                ]);
            }
            
            $task->save();
            return view('admin.task.edit',[
                'task' => $task,
                ]);
                
        }else{
            $note_number = $request->note_number;
          
            return view('admin.task.add',[
                'note_number' => $note_number,
                ]);
        }
        
    }
    
    public function task_create(Request $request, $id)
    {
        $this->validate($request,[
            'task_name' => 'required',
            'task_details' => 'required',
            'state' => 'required',
            'deadline' => 'required',
            'completion_date' => 'required',
            ]);
        $task = Task::firstOrNew(['id' => $id]);
       
        $task->task_name = $request->task_name;
        $task->task_details = $request->task_details;
        $task->deadline = $request->deadline;
        $task->state = $request->state;
        $task->completion_date = $request->completion_date;
        $task->note_number = $request->note_number;
        $task->active = $request->active;
       
        $task->save();
        $sid=$task->id;
        
        for($i = 1; $i <= $request->note_number; $i++){
            $alt='note'.$i;
            $$alt=new Note;
        }
     
        
        for($i = 1; $i <= $request->note_number; $i++){
            $alt = 'note'.$i;
            $alt_note = 'note'.$i;
            $$alt->task_id = $task->id;
            $$alt->note = $request->$alt_note;
            $$alt->save();
        }
        
        
        //$this->access_management('task-'.$id.'-create');
        return redirect()->route('task.edit',['id'=>$task->id]);
    }
    
    public function task_update(Request $request, $id)
    {
        $this->validate($request,[
            'task_name' => 'required',
            'task_details' => 'required',
            'state' => 'required',
            'deadline' => 'required',
            'completion_date' => 'required',
            ]);
            
        $task = Task::firstOrNew(['id' => $id]);
       
       
        $task->task_name = $request->task_name;
        $task->task_details = $request->task_details;
        $task->deadline = $request->deadline;
        $task->state = $request->state;
        $task->completion_date = $request->completion_date;
        $task->active = $request->active;
        
        if($task->note_number < $request->note_number){
            $task->note_number = $request->note_number;
        }
       
        $task->save();
        $sid=$task->id;
        
        for($i = 1;$i <= $task->note_number; $i++)
        {
            if((count($task->notes) >= $i))
            {
                $alt ='note'.$i;
                $$alt = Task::find($id)->notes[$i-1];
            }
            else
            {
                $alt = 'note'.$i;
                $$alt = new Note;
            }
        }
        
        for($i=1 ;$i <= $task->note_number; $i++){
            $alt = 'note'.$i;
            $alt_note = 'note'.$i;
            $$alt->task_id = $task->id;
            $$alt->note = $request->$alt_note;
            $$alt->save();
        }
        
        //$this->access_management('management-'.$sid.'-update');
        return redirect()->route('task.edit',['id'=>$task->id]);
    }
    
    
    
    public function task_edit(Request $request, $id)
    {
        $task = Task::firstOrNew(['id' => $id]);
        //dd($task);
        return view('admin.task.edit', [
            'task' => $task,
        ]);
    }
    
    public function qr_list()
    {
        return view('admin.qr.list');
    }
    
    public function qr_download(Request $request)
    {
        $url_word = $request->qr_url;
        //$qr_name = $request->qr_name;
        $keywordurl = urlencode($url_word);
        $url="http://chart.apis.google.com/chart?chs=150x150&cht=qr&chl=$keywordurl";
        
        //$fileName = $qr_name.'-qr.png';
        $fileName = 'qr.png';
        
        $img = file_get_contents($url);
        $headers = [
            'Content-Type' => 'image/png',
            'Content-Disposition' => 'attachment; filename="'.$fileName .'"'
        ];
        return response::make($img, 200, $headers);
    }
    
    
    
    
   
    public function users_list()
    {
        $users=User::all();
        return view('admin.users.list',[
                    'users'=>$users,
                    ]);
    }
    
    public function users_add()
    {
        
    }
    
     public function users_edit($id)
    {
        $user=User::find($id);
        return view('admin.users.edit',[
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
                $this->access_management('users-'.$id.'-delete');
                $messages = [$user_name.'を削除しました'];
                return view('auth.login',[
                        'messages' => $messages,
                        ]);
                            
            }else{
                //$this->validator($request->password())->validate();
                //$validatedData = $request->validate([
                $this->validate($request,[
                    'name' => 'required',
                    'password' => 'confirmed',
                    ]);
                    
                if(($request->password) != ($request->password_confirmation))
                {
                    $messages = ['passwordとconfirmationが異なります'];
                    return view('admin.users.edit',[
                            'user'=>$user,
                            'messages' => $messages,
                             ]);
                }
            
                
                $user->name = $request->name;
                $ps = $request->password;
                
                if(filled($ps)){
                    $user->password = bcrypt($request->password);
                }
                
                $user->save();
               
            $this->access_management('users-'.$id.'-update');
            return view('admin.users.edit',[
                'user'=>$user,
                 ]);
            }
            
        }else{
            
            $messages = ['ログインアカウントのみ変更可能です'];
            return view('admin.users.list',[
                'messages' => $messages,
                'users' => $users,
                ]);
            //return redirect()->route('users.list');
        }
        
       
    }
    //ユーザー削除delete
    public function user_delete($id)
    {
        $user=User::find($id);
        $user->delete();
    }

    
    
    public function invalid()
    {
        return view('invalid');
    }
    
    
    //検索機能
    public function getSearch(Request $request)
    {
        $key = $request->key_word;
        $on = $request->on;
        $off = $request->off;
        
        if (($on == "on") && ($off == "off"))
        {
            if(filled($key))
            {
                $tasks = Task::where('task_name', 'LIKE', "%$key%")
    		                    ->orWhere('state', 'LIKE', "%$key%")
    		                    //->paginate(10);
    		                    ->get();
            }
        	else
        	{
        		$tasks = Task::all();
    	    }
        }
        elseif($on == "on")
        {
            if ($key!=null)
            {
    		    $tasks = Task::Where('active',1)		 //->where('appname', 'LIKE', "%$key%")
    		                     
    		                        ->where('task_name', 'LIKE', "%$key%")
    		                        ->Where('state', 'LIKE', "%$key%")
                                    ->get();
        	}
        	else
        	{
        		$tasks = Task::where('active',1)
        		                    ->get();
    	    }
        }
        
        elseif($off == "off")
        {
            if ($key!=null)
            {
    		    $tasks = Task::Where('active',null)   
    		                        ->where('task_name', 'LIKE', "%$key%")
    		                        ->Where('state', 'LIKE', "%$key%")
    		                        ->get();
    	    }else
    	    {
                $tasks = Task::where('active',null)
                                    ->get();
    		}
        }
        else
        {
            $tasks = Task::all();
    	   
        }
      
	    return view('admin.task.list', [
            'tasks' => $tasks,     
        ]);
    }
    

    //アクセス管理
    public function access_management($action){
        $user = Auth::user();
        //dd($user);
        $record= new AccessMnagement;
        $record->who=$user->email;
        $record->when=$user->id;
        $record->action=$action;
        $record->save();
    }
    
}
