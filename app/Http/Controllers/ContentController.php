<?php

namespace App\Http\Controllers;

use App\Content;
use App\User;
use App\Section;
use App\Message;
use App\Subscriber;
Use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
    public function index()
    {
        $users = User::all();
        $sections = Section::all();
        $contents = Content::all();
        return view('diffuser.contents', compact('contents', 'sections', 'users'));
    }
    public function indexx()
    {
        $sections = Section::all();
        $contents = Content::all()/*->where('user_id', '=', Auth::user()->id)*/;
        return view('author.contents', compact('contents', 'sections'));
    }
    public function indexlist()
    {
        $proposals = Content::all()->where('user_id', '=', Auth::user()->id);
        return view('author.proposals', compact('proposals'));
    }
    public function indexlistall()
    {
        $allproposals = Content::all();
        $users = User::all();
        //$user = User::all()->where('id', '=', Auth::user()->id);
        return view('diffuser.allproposals', compact('allproposals', 'users'));
    }
    public function autlist()
    {
        $users = User::all()->where('rol', '=', 'aut');
        return view('diffuser.aut', compact('users'));
    }
    public function sublist()
    {
        $users = Subscriber::all();
        $contents = Content::all();
        return view('diffuser.sub', compact('users', 'contents'));
    }
    public function modifications()
    {
        $users = User::all();
        $contents = Content::all();
        return view('diffuser.mods', compact('contents', 'users'));
    }
    public function create()
    {
        $sections = Section::all();
        return view('author.create', compact('sections'));
    }
    public function store(Request $request)
    {
        $content = new Content();
        $content->fill($request->except('image1', 'image2', 'image3', 'user_id', 'updated_at'));
        $content->user_id = Auth::user()->id;
        $content->updated_at = NULL;
        if($request->hasFile('image1')){
            $file1 = $request->file('image1');
            $nuevo1 = time().$file1->getClientOriginalName();
            $content->image1 = $nuevo1;
            $file1->move(public_path().'/images/contents', $nuevo1);
        }else{
            $nuevo1 = NULL;
        }
        if($request->hasFile('image2')){
            $file2 = $request->file('image2');
            $nuevo2 = time().$file2->getClientOriginalName();
            $content->image2 = $nuevo2;
            $file2->move(public_path().'/images/contents', $nuevo2);
        }else{
            $nuevo2 = NULL;
        }
        if($request->hasFile('image3')){
            $file3 = $request->file('image3');
            $nuevo3 = time().$file3->getClientOriginalName();
            $file3->move(public_path().'/images/contents', $nuevo3);
            $content->image3 = $nuevo3;
        }else{
            $nuevo3 = NULL;
        }
        $content->save();
        return redirect('/cont')->with('success','La propuesta ha sido creada');
    }
    public function content_details(Content $content)
    {
        //$reasons = Message::all();
        $sections = Section::all();
        return view('author.edit', compact('content', 'sections'));
    }
    public function content_edit(Request $request, $id)
    {
        $now = now();
        $content = new Content();
        $content->fill($request->except('image1', 'image2', 'image3', 'updated_at', 'created_at', 'ver', 'user_id'));
        $othercontent = Content::find($id);
        $othercontent->fill($request->except('name', 'desc', 'image1', 'image2', 'image3', 'section_id'));
        /*if($othercontent->updated_at == NULL){
        }else{
            //return "<script type='text/javascript'>alert('No puedes actualizar este contenido');</script>";
            return redirect('/cont');
        }*/
        $content->status = "NULL";
        $content->user_id = Auth::user()->id;
        $content->updated_at = NULL;
        $content->created_at = $now;
        $n = $othercontent->ver;
        $n = $n+1;
        $content->ver = $n;
        $othercontent->updated_at = $now;
        if($content->section_id == NULL){
            $content->section_id = $othercontent->section_id;
        }
        if($request->hasFile('image1')){
            $file1 = $request->file('image1');
            $nuevo1 = time().$file1->getClientOriginalName();
            $content->image1 = $nuevo1;
            $file1->move(public_path().'/images/contents', $nuevo1);
        }else{
            $nuevo1 = NULL;
        }
        if($request->hasFile('image2')){
            $file2 = $request->file('image2');
            $nuevo2 = time().$file2->getClientOriginalName();
            $content->image2 = $nuevo2;
            $file2->move(public_path().'/images/contents', $nuevo2);
        }else{
            $nuevo2 = NULL;
        }
        if($request->hasFile('image3')){
            $file3 = $request->file('image3');
            $nuevo3 = time().$file3->getClientOriginalName();
            $file3->move(public_path().'/images/contents', $nuevo3);
            $content->image3 = $nuevo3;
        }else{
            $nuevo3 = NULL;
        }
        $othercontent->save();
        $content->save();
        return redirect('/cont')->with('success','El contenido ha sido editado');
    }

    public function details(Content $content)
    {
        //$reasons = Message::all();
        $sections = Section::all();
        return view('diffuser.details', compact('content', 'sections'));
    }
    public function propdetails(Content $content)
    {
        $reasons = Message::all();
        $sections = Section::all();
        return view('author.details', compact('content', 'sections', 'reasons'));
    }

    public function status(Request $request, $id)
    {
        $content = Content::find($id);
        $content->fill($request->all());
        if ($content->status == 'FALSE') {
            $reasons = new Message();
            $reasons->fill($request->all()); //Se necesita para saber el mensaje que se ha escrito en la vista details del difusor
            $reasons->content_id = $content->id;
            $reasons->save();
        }
        $content->save();
        return redirect('/prop-all')->with('success','El contenido ha sido actualizado');
    }
    public function propstatus(Request $request, $id)
    {
        $content = Content::find($id);
        $content->fill($request->all());

        if ($content->status == 'FALSE') {
            $reasons = new Message();
            $reasons->fill($request->all()); //Se necesita para saber el mensaje que se ha escrito en la vista details del difusor
            $reasons->content_id = $content->id;
            $reasons->save();
        }

        $content->save();
        return redirect('/prop-all')->with('success','El contenido ha sido actualizado');
    }

    public function show(Content $content)
    {
        //
    }
    public function edit(Content $content)
    {
        return view('author.edit', compact('content'));
    }
    public function update(Request $request, Content $content)
    {
        //
    }
    public function destroy(Content $content)
    {
        //
    }
}
