<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventRegistration;

class EventRegistrationController extends Controller
{
    public function index()
    {
        return EventRegistration::all();
    }

    public function show($id)
    {
        return EventRegistration::find($id);
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {
        $eventRegistration = EventRegistration::findOrFail($id);
        $eventRegistration->update($request->all());

        return $eventRegistration;
    }

    public function delete(Request $request, $id)
    {
        $eventRegistration = EventRegistration::findOrFail($id);
        $eventRegistration->delete();

        return 204;
    }
}
