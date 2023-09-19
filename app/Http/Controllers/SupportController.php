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
        $supports = $this->service->getAll($request->filter);

        return view('admin/supports/index', [
            'supports' => $supports,
        ]);
    }

    public function show(string|int $id)
    {
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
        $this->service->create(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
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
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return redirect()->route('supports.edit');
        }

        return redirect()->route('supports.index');
    }

    public function deleteAction(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
