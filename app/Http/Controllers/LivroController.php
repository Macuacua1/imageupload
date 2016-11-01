<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Livro;
use Illuminate\Support\Facades\Input;

class LivroController extends Controller
{

    public function index()
    {
        $livros = Livro::all();
        return view('Livro.index',compact('livros'));
    }

    public function create()
    {
        return view('Livro.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'titulo' => 'required|max:255|min:3',
            'autor' => 'required|min:3',
            'editora' => 'required|min:3',
            'publicacao' => 'required|min:3',
        ]);
        $livro= new Livro(array (
            "titulo" => $request->get("titulo"),
            "autor"=> $request->get("autor"),
            "editora"=> $request->get("editora"),
            "publicacao"=> $request->get("publicacao"),
            "descricao"=>$request->get("descricao"),
            "image"=>$request->file("image")->getClientOriginalName()
        ));

        $request->file("image")->move( base_path() . '/public/img' , $request->file("image")->getClientOriginalName());

        $livro->save();
        return back()
            ->with('success','You have successfully upload images.');
//            ->with('image',$livro);

    }


    public function show($id)
    {
        $livro=Livro::find($id);
        return view('Livro.show',compact('livro'));
    }


    public function edit($id)
    {
        $livro=Livro::find($id);
        return view('Livro.edit',compact('livro'));
    }


    public function update(Request $request, $id)
    {
        $livro2= array (
            "titulo" => $request->get("titulo"),
            "autor"=> $request>get("autor"),
            "editora"=> $request->get("editora"),
            "publicacao"=> $request->get("publicacao"),
            "descricao"=>$request->get("descricao"),
        );

        if(!($request->file("image")===NULL)) {
            error_log($request->file("image")->getClientOriginalName());
            $request->file("image")->move(base_path() . '/public/img', $request->file("image")->getClientOriginalName());
            $livro2["image"]  = $request->file("image")->getClientOriginalName();

        }

        $livro=Livro::find($id);
        $livro->update($livro2);
        return redirect('livros');
    }


    public function destroy($id)
    {
        Livro::find($id)->delete();
        return redirect('livros');
    }
}
