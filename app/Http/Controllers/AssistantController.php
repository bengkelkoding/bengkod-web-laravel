<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AssistantController extends Controller
{
    public function index()
    {
        return view('assistant.dashboard');
    }

    public function indexAdmin(Request $request)
    {
        $search = $request->search ?? "";
        $per_page = $request->per_page ?? 10;
        $assistants = User::role('assistant')->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->paginate($per_page);
        return view('admin.assistant.index', compact('assistants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assistant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = [
                // 'id_course' => $request->course,
                // 'id_asisten' => $request->assistant,
                'code' => $request->nim,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('password'),
            ];

            $user = User::create($data);
            $user->assignRole('assistant');

            return response()->redirectToRoute('admin.admin-assistant-index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assistant = User::find($id);
        return view('admin.assistant.edit', compact('assistant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            User::updateOrCreate(
                ['id' => $id],
                $request->all()
            );
            return response()->redirectToRoute('admin.admin-assistant-index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::find($id)->delete();
            return response()->redirectToRoute('admin.admin-assistant-index');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ]);
        }
    }

}

