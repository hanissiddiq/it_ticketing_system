<?php

namespace App\Services;

use App\Models\Department;
use App\Repositories\DepartmentRepository;
use Illuminate\Support\Facades\DB;

class DepartmentService
{
    public function __construct(
        protected DepartmentRepository $repository
    ) {
    }

    public function create(array $data): Department
    {
        return DB::transaction(
            fn () => $this->repository->create($data)
        );
    }

    public function update(Department $department, array $data): Department
    {
        return DB::transaction(
            fn () => $this->repository->update($department, $data)
        );
    }

    public function delete(Department $department): void
    {
        DB::transaction(
            fn () => $this->repository->delete($department)
        );
    }
}