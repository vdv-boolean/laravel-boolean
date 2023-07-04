<?php

namespace App\Http\Controllers\Guest;

use App\Models\Travel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravelController extends Controller
{
    public function index()
    {
        $comics = Travel::paginate(5);

        return view('travels.index', compact('travels'));
    }

    public function create()
    {
        return view('travels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:200',
            'date'           => 'required|string|max:100',
            'description'     => 'required|string|max:1000',
            'image'           => 'required|string|max:1000',
            'country'       => 'required|date',
            'address'            => 'required|string|max:100',
        ]);

        $data = $request->all();

        $newTravels = new Travel();
        $newTravels->date = $data['date'];
        $newTravels->title = $data['title'];
        $newTravels->text = $data['text'];
        $newTravels->image = $data['image'];
        $newTravels->country = $data['country'];
        $newTravels->address = $data['address'];
        $newTravels->save();

        return redirect()->route('travels.show', ['travel' => $newTravels->id]);
    }

    public function show($id)
    {
        $travel = Travel::findOrFail($id);

        return view('travels.show', compact('travel'));
    }

    public function edit(Travel $travel)
    {
        return view('travels.edit', compact('travel'));
    }

    public function update(Request $request, Travel $travel)
    {
        // Validate the data
        $request->validate([
            'date'           => 'required|string|max:100',
            'title'           => 'required|string|max:200',
            'text'          => 'required|string|max:100',
            'image'       => 'required|date',
            'country'            => 'required|string|max:100',
            'address'     => 'required|string|max:1000',
        ]);

        $data = $request->all();

        // Update the data in the database
        $travel->title = $data['title'];
        $travel->date = $data['date'];
        $travel->text = $data['text'];
        $travel->image = $data['image'];
        $travel->country = $data['country'];
        $travel->address = $data['address'];
        $travel->update();

        return redirect()->route('travels.show', ['travel' => $travel->id]);
    }

    public function destroy($id)
    {

        $travel = Travel::findOrFail($id);

        $travel->delete();

        return to_route('travels.index')->with('delete_completed', $travel);
    }
}
