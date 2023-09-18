<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin/supports/index', [
            'supports' => $supports,
        ]);
    }

    public function show(string|int $id)
    {
        // Support::where('id', $id)->first();
        // Support::where('id', '!=', $id)->first();
        $support = Support::find($id);

        if (!$support) {
            return redirect()->route('supports.index');
        }

        return view('admin/supports/show', [
            'support' => $support,
        ]);
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }
}
