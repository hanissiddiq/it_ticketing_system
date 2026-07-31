<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\Department;
use App\Repositories\DepartmentRepository;
use App\Services\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct(
        protected DepartmentRepository $repository,
        protected DepartmentService $service
    ) {
    }

    public function index()
    {
        return view('departments.index', [
            'departments' => $this->repository->all(),
        ]);
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(StoreDepartmentRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department berhasil ditambahkan.');
    }

    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $this->service->update($department, $request->validated());

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department berhasil diperbarui.');
    }

    public function destroy(Department $department)
    {
        $this->service->delete($department);

        return redirect()
            ->route('departments.index')
            ->with('success', 'Department berhasil dihapus.');
    }
}