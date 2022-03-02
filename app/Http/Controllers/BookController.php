<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\ModelBook;
use App\Models\User;

class BookController extends Controller
{

    private $objUser;
    private $objBook;

    public function __construct()
    {
        $this->objUser=new User();
        $this->objBook=new ModelBook();



    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //  dd($this->objUser->find(1)->relBooks); 
       // $book=ModelBook::all();
        $book=$this->objBook->all();
     
         $book=$this->objBook->all()->sortBy('id_user');
         return view("index",compact("book")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view("create",compact("users"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
      /*  $aviso = "y";
        $aviso = preg_replace('/(\b[a-z])/i',
        
        
        '<body style="background-color: #121111; color:#64db1a">
        <a href="{{url("http://localhost:8000/books")}}">
        <button class="btn btn-dark">Voltar</button>
        </a>'
        
        
        ,$aviso); */

        $this->objBook->create([
           'title'=>$request->title,
           'pages'=>$request->pages,
           'price'=>$request->price,
           'id_user'=>$request->id_user
        ]);
        
        return redirect('books')->with('successo','Livro adastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book=$this->objBook->find($id);
        return view("show",compact("book"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=$this->objBook->find($id);
        $users=$this->objUser->all();
        return view('create',compact('book','users'));
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
       $edit= $this->objBook->where(['id'=>$id])->update([
            'title'=>$request->title,
            'pages'=>$request->pages,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        if ($edit) {

            return redirect('books');

        }
            return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $del=$this->objBook->destroy($id);
    return($del)?"sim":"não";
}
}
