<?php

namespace App\Http\Controllers;

class TicketTemplateController extends Controller
{
    public function index()
    {
        return view('ticket-template.index');
    }
}
