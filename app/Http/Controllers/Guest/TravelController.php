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
            'thumb'           => 'required|string|max:1000',
            'country'       => 'required|date',
            'address'            => 'required|string|max:100',
        ]);

        $data = $request->all();

        $newTravels = new Travel();
        $newTravels->title = $data['title'];
        $newTravels->date = $data['date'];
        $newTravels->description = $data['description'];
        $newTravels->thumb = $data['thumb'];
        $newTravels->country = $data['country'];
        $newTravels->address = $data['address'];
        $newTravels->save();

        return redirect()->route('travels.show', ['comic' => $newTravels->id]);
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
            'title'           => 'required|string|max:200',
            'price'           => 'required|string|max:100',
            'series'          => 'required|string|max:100',
            'sale_date'       => 'required|date',
            'type'            => 'required|string|max:100',
            'description'     => 'required|string|max:1000',
            'thumb'           => 'required|string|max:1000',
        ]);

        $data = $request->all();

        // Update the data in the database
        $travel->title = $data['title'];
        $travel->price = $data['price'];
        $travel->series = $data['series'];
        $travel->sale_date = $data['sale_date'];
        $travel->type = $data['type'];
        $travel->description = $data['description'];
        $travel->thumb = $data['thumb'];
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
