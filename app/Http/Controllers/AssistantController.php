<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}

