<?php

namespace App\Http\Controllers;

use App\Dtos\CreateSupportDTO;
use App\Dtos\UpdateSupportDTO;
use App\Http\Requests\CreateActionUpdate;
use App\Http\Services\SupportService;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {
        // $supports = $support->all();
        $supports = $this->service->getAll($request->filter);

        return view('admin/supports/index', [
            'supports' => $supports,
        ]);
    }

    public function show(string|int $id)
    {
        // $support = Support::find($id);
        $support = $this->service->findOne($id);

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

    public function createAction(CreateActionUpdate $request)
    {
        // $data = $request->all();
        // $data['status'] = 'a';

        // $support->create($data);
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        // $support = Support::where('id', $id)->first();
        $support = $this->service->findOne($id);

        if (!$support) {
            return redirect()->route('supports.index');
        }

        return view('admin/supports/edit', [
            'support' => $support,
        ]);
    }

    public function editAction(CreateActionUpdate $request, Support $support)
    {
        // $support = Support::where('id', $id)->first();
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return redirect()->route('supports.edit');
        }

        // $support->subject = $request->subject;
        // $support->subject = $request->body;
        // $support->save();

        // $support->update($request->only([
        //     'subject',
        //     'body',
        // ]));

        // Pegar os campos que somente foram validados
        // $support->update($request->validate());

        return redirect()->route('supports.index');
    }

    public function deleteAction(string $id)
    {
        // $support = Support::where('id', $id)->first();

        // if (!$support) {
        //     return redirect()->route('supports.index');
        // }

        // $support->delete();

        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
