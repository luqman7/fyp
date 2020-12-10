<?php

namespace FYP\Http\Controllers;

use FYP\Http\Requests\CreateNewbornRequest;
use FYP\Newborn;
use FYP\Stage;
use Illuminate\Http\Request;

class NewbornsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newborns.index', [
            'newborns' => Newborn::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newborns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        auth()->user()->newborns()->create([
            'parents_name' => $request->name,
            'dob' => $request->dob,
            'sex' => $request->sex,
            'result' => $request->result,
            'stage_id' => $request->stage
        ]);

        session()->flash('success', 'Newborn added.');

        return redirect()->route('newborns.index');
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
    public function edit(Newborn $newborn)
    {
        return view('newborns.create')->with('newborn', $newborn);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newborn $newborn)
    {
        $newborn->parents_name = $request->name;
        $newborn->dob = $request->dob;
        $newborn->sex = $request->sex;
        $newborn->result = $request->result;
        $newborn->stage_id = $request->stage;

        $newborn->save();

        session()->flash('success', 'Successfully');

        return redirect(route('newborns.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newborn $newborn)
    {
        $newborn->delete();

        session()->flash('success', 'Deleted Successfully');

        return redirect(route('newborns.index'));
    }
}
