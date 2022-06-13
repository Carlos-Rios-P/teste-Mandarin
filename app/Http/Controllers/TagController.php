<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::all();

        return response()->json($tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, TagRequest $request)
    {
       $tag = Tag::create([
        'tag_name' => $request->tag_name,
        'task_id' => $id
       ]);

        return response()->json($tag, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $tag = Tag::findOrFail($id);

            return response()->json($tag, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Não possui nenhuma tag com o id $id"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TagRequest $request)
    {
        try {

            $tag = Tag::findOrFail($id);
            $tag->update([
                'tag_name' => $request->tag_name,
            ]);

            return response()->json($tag, 200);

        } catch (\Throwable $th) {
            return response()->json(['erro' => "Não possui nenhuma tag com o id $id"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);

        return response()->json(['sucess' => 'Tag excluída com sucesso']);
    }
}
