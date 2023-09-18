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

    public function createAction(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function edit(string|int $id)
    {
        $support = Support::where('id', $id)->first();

        if (!$support) {
            return redirect()->route('supports.index');
        }

        return view('admin/supports/edit', [
            'support' => $support,
        ]);
    }

    public function editAction(string|int $id, Request $request, Support $support)
    {
        $support = Support::where('id', $id)->first();

        if (!$support) {
            return redirect()->route('supports.edit');
        }

        $support->update($request->only([
            'subject',
            'body',
        ]));

        return redirect()->route('supports.index');
    }
}
