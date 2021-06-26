<?php

namespace App\Http\Controllers;

use App\Models\Outcome;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\Output;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\OutcomeUpdateRequest;
use Carbon;


class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Bring the results

        $outcomes = Outcome::orderBy('name')->get();
        return view('outcomes.outcomes')->with('outcomes', $outcomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('outcomes.outcomes-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation

        $validated = $request->validate([
            'name' => 'required|unique:outcomes|max:255',
        ]);

        // Save

        $outcome = new Outcome;
        $outcome->name = $request->name;
        $outcome->description = $request->description;
        $outcome->save();
        return redirect('dashboard/outcomes')->with('success', 'Outcome created successfully');

        //Alternate

        // $outcome = Outcome::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ]);


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
        $outcome = Outcome::where('id', $id)->first();
        return view('outcomes.outcomes-edit')->with('outcome', $outcome);;
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
        // Validation (unique exception)

        $validated = $request->validate([
            'name' => "required|max:255|unique:outcomes,name,$id",
        ]);


        $outcome = Outcome::find($id);
        $outcome->name = $request->name;
        $outcome->description = $request->description;
        $outcome->save();
        return redirect('dashboard/outcomes')->with('success', 'Outcome updated successfully!');;
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
        $outcome = Outcome::find($id);
        $outcome->delete();
        return redirect('dashboard/outcomes')->with('success', 'Outcome deleted successfully!');;
    }
}
