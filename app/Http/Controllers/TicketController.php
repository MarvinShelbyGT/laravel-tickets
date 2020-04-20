<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Permission;
use App\Ticket;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        abort_unless(\Gate::allows('tickets_index'), 403);
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        abort_unless(\Gate::allows('tickets_create'), 403);
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return Redirect::route('tickets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        abort_unless(\Gate::allows('tickets_show'), 403);
        //Récupération des fichiers
        $ticket = Ticket::find($id);
        $files = Activity::where('ticket_id', $ticket->id)->where('filename', '!=', null)->get();
        $activities = Activity::where('ticket_id', $ticket->id)->get();

        return view('tickets.show', compact('ticket', 'activities', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        abort_unless(\Gate::allows('tickets_delete'), 403);
        $ticket = Ticket::find($id);
        $ticket->delete();
        return Redirect::route('tickets.index');
    }
}
