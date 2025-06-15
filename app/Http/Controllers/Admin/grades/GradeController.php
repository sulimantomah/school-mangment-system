<?php

namespace App\Http\Controllers\Admin\grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradesRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Grades=Grade::all();
        return view('pages.Grades.grades',compact('Grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradesRequest $request)
    {
        if(Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name_en)->exists()){
          return redirect()->back()->withErrors(trans('Grades_trans.exists'));

        }

        try{
             $Grade=new Grade();
        $Grade->Name=['en'=>$request->Name_en,'ar'=>$request->Name];
        $Grade->Notes=$request->Notes;
        $Grade->save();
        toastr()->success('messages.success');

    return redirect()->route('grades.index');
        }

        catch(\Exception $e) {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradesRequest $request)
    {
        try{
            $Grades=Grade::findOrFail($request->id);
            $Grades->Name=['en'=>$request->Name_en,'ar'=>$request->Name];
            $Grades->Notes=$request->Notes;
            $Grades->save();
         toastr()->success('messages.Update');
        return redirect()->route('grades.index');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         $Grades=Grade::findOrFail($request->id)->delete();
          toastr()->success('messages.Delete');
           return redirect()->route('grades.index');
    }
}
