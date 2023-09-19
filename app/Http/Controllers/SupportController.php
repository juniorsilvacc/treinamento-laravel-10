<?php

namespace App\Http\Controllers;

use App\Dtos\Supports\CreateSupportDTO;
use App\Dtos\Supports\UpdateSupportDTO;
use App\Http\Requests\CreateActionUpdate;

use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/supports/index', [
            'supports' => $supports,
            'filters' => $filters,
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
