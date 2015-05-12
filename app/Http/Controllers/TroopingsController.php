<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\StoreTroopingRequest;
use App\Models\Trooping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TroopingsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$troopings = Trooping::all();

		return view('admin.troopings.index', compact('troopings'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.troopings.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreTroopingRequest $request)
	{
		$trooping = new Trooping;

		//save all inputs for upcoming event
		$trooping->title = $request->input('title');
		$trooping->started_at = $request->input('started_at');
		$trooping->ended_at = $request->input('ended_at');
		$trooping->place = $request->input('place');
		$trooping->website_link = $request->input('website_link');
		$trooping->teaser = $request->input('teaser');
		//check if event will be published
		if ($request->input('published_status')) {
			$trooping->published_as_upcoming_at = Carbon::now();
		}

		$trooping->save();

	    Flash::message('Událost úspěšně vytvořena!');
		return redirect()->route('troopings.index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$trooping = Trooping::findOrFail($id);

		return view('admin.troopings.edit', compact('trooping'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$trooping = Trooping::findOrFail($id);
		$trooping->delete();

		Flash::message('Událost byla úspěšně smazána!');
		return redirect()->route('troopings.index');
	}

}
