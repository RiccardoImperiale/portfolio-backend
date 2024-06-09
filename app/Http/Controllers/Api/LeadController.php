<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLeadMessageMd;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        };

        $newLead = Lead::create($data);
        $newLead->fill($data);
        $newLead->save();

        Mail::to('io@example.com')->send(new NewLeadMessageMd($newLead));

        return response()->json([
            'success' => true,
            'message' => 'new message sent correctly'
        ]);
    }
}
