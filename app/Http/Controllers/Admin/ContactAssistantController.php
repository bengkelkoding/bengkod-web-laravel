<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactAssistant;
use App\Models\Kursus;
use App\Http\Requests\Admin\ContactAssistant\PostRequest;
use App\Http\Controllers\Controller;


class ContactAssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactAssistant = ContactAssistant::with('course')->get();
        return view('admin/contactAssistant/index', compact('contactAssistant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/contactAssistant/create', ['courses' => Kursus::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $data = [
                'id_kursus' => $request->course,
                'name' => $request->name,
                'phone_number' => $request->phone_number,

            ];
            ContactAssistant::create($data);
            return response()->redirectToRoute('admin.contact-assistant.index');

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\ContactAssistant  $contactAssistant
     * @return \Illuminate\Http\Response
     */
    public function show(ContactAssistant $contactAssistant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\ContactAssistant  $contactAssistant
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactAssistant $contactAssistant)
    {
        return view('admin/contactAssistant/edit', compact('contactAssistant'), ['courses' => Kursus::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  \App\Models\Admin\ContactAssistant  $contactAssistant
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, ContactAssistant $contactAssistant)
    {
        try{
            $data = [
                'id_kursus' => $request->course,
                'name' => $request->name,
                'phone_number' => $request->phone_number,

            ];
            $contactAssistant->update($data);
            return response()->redirectToRoute('admin.contact-assistant.index');
        }catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\ContactAssistant  $contactAssistant
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactAssistant $contactAssistant)
    {
        $contactAssistant->delete();
        return response()->redirectToRoute('admin.contact-assistant.index');
    }
}
