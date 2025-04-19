<?php

namespace App\Http\Controllers;

use App\Models\SslcommerzCredential;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SSLCommerzCredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = SslcommerzCredential::first();
        /*
        return inertia('Settings', [
            'settings' => $settings,
        ]);
        */
        return Inertia::render('Settings', [
            'settings' => $settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'store_id' => 'required',
                'store_password' => 'required',
                'currency' => 'required',
                'success_url' => 'required',
                'fail_url' => 'required',
                'cancel_url' => 'required',
                'ipn_url' => 'required',
                'init_url' => 'required',
            ]);
            /*
            $settings = SslcommerzCredential::find($id);
            $settings->store_id = $request->store_id;
            $settings->store_password = $request->store_password;
            $settings->currency = $request->currency;
            $settings->success_url = $request->success_url;
            $settings->fail_url = $request->fail_url;
            $settings->cancel_url = $request->cancel_url;
            $settings->ipn_url = $request->ipn_url;
            $settings->init_url = $request->init_url;
            $settings->save();
            */
            $settings = SslcommerzCredential::first();
            $settings->update($request->all());
            return redirect()->back()->with('success', 'SSLCommerz settings updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Settings not found.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
