<?php

namespace App\Http\Controllers;

use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket.index');
    }

    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }
}
