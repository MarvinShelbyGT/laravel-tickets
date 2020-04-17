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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
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
        $storeTicket = Ticket::find($request->get('ticket_id'));
        if($storeTicket->state == $request->get('state')) {
            $activity = Activity::create([
               'user_id' => Auth::user()->id,
               'ticket_id' => $request->get('ticket_id'),
               'content' => $request->get('content')
            ]);
        } else {
            $activity = Activity::create([
                'user_id' => Auth::user()->id,
                'ticket_id' => $request->get('ticket_id'),
                'content' => $request->get('content'),
                'status' => $request->get('state')
            ]);
            $storeTicket->state = $request->get('state');
            $storeTicket->save();
        }

        return Redirect::route('tickets.show', $storeTicket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        return view('tickets.show', compact('ticket'));
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
        $ticket = Ticket::find($id);
        $ticket->delete();
        return Redirect::route('tickets.index');
    }
}
