<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers;
use Response;

use App\Book;
use App\BookHistory;
use Illuminate\Support\Facades\Validator;//バリデーション
use Illuminate\Support\Facades\Auth;//ログインユーザー取得
use RakutenRws_Client; //楽天api////


class LibraryController extends Controller
{
   
    public function index()
    {
        return view('library.index');
    }
    
    public function all_list()
    {
        $books = Book::all();
        return view('library.list.list',[
            'books' => $books,
            ]);
    }
    
    
    //検索機能
    public function search(Request $request)
    {
        $key = $request->key_word;
        $on = $request->on;//貸出中
        $off = $request->off;//貸出可能
        
        //dd($on,$off);
        
        if (($on == "on") && ($off == "off"))
        {
            $text = "貸出可能&貸出中";
            if(filled($key))
            {
                $books = Book::where('title', 'LIKE', "%$key%")
    		                    ->get();
            }
        	else
        	{
        		$books = Book::all();
    	    }
        }
        elseif(($on == "on") && ($off == null))
        {
            $text = "貸出中";
            if(filled($key))
            {
    		    $books = Book::Where('book_flag',1)
    		                        ->where('title', 'LIKE', "%$key%")
                                    ->get();
        	}
        	else
        	{
        		$books = Book::where('book_flag',1)
        		                    ->get();
    	    }
        }
        elseif(($off == "off") && ($on == null))
        {
            $text = "貸出可能";
            if (filled($key))
            {
    		    $books = Book::Where('book_flag',0)   
    		                        ->where('title', 'LIKE', "%$key%")
    		                        ->get();
    	    }else
    	    {
                $books = Book::where('book_flag',0)
                                    ->get();
    		}
        }
        else
        {
            $books = Book::all();
            $text = "条件が当てはまらないため全件表示します";
        }
        
        if(!filled($key)){
            $key = "なし";
        }
        
        $text = "条件:".$text.": key_word:".$key."の検索結果";
        
        $messages = [$text];
        return view('library.list.list',[
                    'books' => $books,
                    'messages' => $messages,
                    ]);
      
    }
    
    public function detail($id)
    {
        $book = Book::find($id);
        return view('library.list.detail',[
            'book' => $book,
            ]);
    }
    
    public function borrow($id)
    {
        $auth = Auth::user();
        $book = Book::firstOrNew(['id' => $id]);
        $book->book_flag = 1;
        $book->borrow_acount = $auth->email;
        $book->save();
        
        //貸出履歴を登録
        $history = BookHistory::firstOrNew(['id' => 0]);
        $history->book_id = $id;
        $history->borrow_acount =  $auth->email;
        $history->save();
        
        $books = Book::all();
        $messages = [$book->title.'を貸出登録しました'];
        return view('library.list',[
            'books' => $books,
            'messages' => $messages,
            ]);
        
    }
    
    

    
    public function return_book($id)
    {
        $book = Book::firstOrNew(['id' => $id]);
        $book->book_flag = 0;
        $book->borrow_acount = 'None';
        $book->save();
        
        $books = Book::all();
        $messages = [$book->title.'を返却しました'];
        return view('library.list',[
            'books' => $books,
            'messages' => $messages,
            ]);
        return redirect()->route('library.index');
    }
    
    
    public function my_books()
    {
        $auth = Auth::user();
       
        $books = Book::Where('borrow_acount',$auth->email)->get();
       
        return view('library.mybooks.my_books',[
            'books' => $books,
            ]);
    }
    
    //register機能
    public function register_add()
    {
        return view('library.register.add');
    }
    
    public function register_search(Request $request)
    {
        $request->validate([
            'isbn' => 'required|integer|digits:13',
            ],
            [
            'isbn.required' => 'ISBNコードを入力してください',
            'isbn.integer' => '数字で入力してください',
            'isbn.digits' => '13桁の数字で入力してください',
            ]);
            
            
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成
        $client = new RakutenRws_Client();
      
        //$client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $client->setApplicationId(1030866254718995179);
        

        $isbn = $request->isbn;

        // IchibaItemSearch API から、指定条件で検索
        if(!empty($isbn)){ 
        $response = $client->execute('BooksTotalSearch', array(
            'isbnjan' => $isbn,
        ));
       
        // レスポンスが正しいかを isOk() で確認
        if ($response->isOk()) {
        $items = array();
       
        foreach ($response as $item){
            $items[] = array(
                'title' => $item['title'],
                'author' => $item['author'],
            );
        }
        if (empty($items)){
            //echo 'Error:'.$response->getMessage();
            $messages = ['ヒットする情報がありませんでした。もう一度やり直してください'];
            return view('library.add',[
            'messages' => $messages,
            ]);
        }
        } else {
            //echo 'Error:'.$response->getMessage();
            $messages = ['正しく取得出来なかったためもう一度やり直してください'];
            return view('library.add',[
            'messages' => $messages,
            ]);
          }
        }
       
        return view('library.register.search',[
            'items' => $items,
            ]);
       
    }
    
    
    public function register(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->save();
        
        $books = Book::all();
        
        $messages = [$book->title.'を登録しました'];
        return view('library.list',[
            'books' => $books,
            'messages' => $messages,
            ]);
    }
    
    

    
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