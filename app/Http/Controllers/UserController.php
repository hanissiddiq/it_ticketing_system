<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
		$keyword = $request->keyword;

        $users = User::with([
                'department',
                'roles'
            ])
            ->when($keyword, function ($query) use ($keyword) {

                $query->where(function ($q) use ($keyword) {

                    $q->where('name', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%")
                        ->orWhere('employee_id', 'like', "%{$keyword}%")
                        ->orWhere('position', 'like', "%{$keyword}%");

                });

            })
            ->latest()
            //->paginate(10)
			->get();
            //->withQueryString();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
		$departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $roles = Role::orderBy('name')->get();

        return view(
            'users.create',
            compact(
                'departments',
                'roles'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
		DB::beginTransaction();

        try {

            $data = $request->validated();

            /**
             * Upload Avatar
             */

            if ($request->hasFile('avatar')) {

                $data['avatar'] = $request
                    ->file('avatar')
                    ->store('avatars', 'public');

            }

            /**
             * Encrypt Password
             */

            $data['password'] = Hash::make(
                $request->password
            );

            /**
             * Checkbox Active
             */

            $data['is_active'] = $request->boolean('is_active');

            /**
             * Create User
             */

            $user = User::create([

                'employee_id'  => $data['employee_id'],

                'name'         => $data['name'],

                'email'        => $data['email'],

                'password'     => $data['password'],

                'department_id'=> $data['department_id'],

                'position'     => $data['position'],

                'phone'        => $data['phone'],

                'avatar'       => $data['avatar'] ?? null,

                'is_active'    => $data['is_active'],

            ]);

            /**
             * Assign Roles
             */

            if ($request->filled('roles')) {

                $user->assignRole(
                    $request->roles
                );

            }

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with(
                    'success',
                    'User berhasil ditambahkan.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            /**
             * Delete uploaded avatar
             */

            if (
                isset($data['avatar']) &&
                Storage::disk('public')->exists($data['avatar'])
            ) {

                Storage::disk('public')
                    ->delete($data['avatar']);

            }

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
         $user->load([
            'department',
            'roles',
        ]);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $departments = Department::where('is_active', true)
            ->orderBy('name')
            ->get();

        $roles = Role::orderBy('name')->get();

        return view(
            'users.edit',
            compact(
                'user',
                'departments',
                'roles'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateUserRequest $request,
        User $user
    ) {
        DB::beginTransaction();

        try {

            $data = $request->validated();

            /**
             * Upload avatar baru
             */

            if ($request->hasFile('avatar')) {

                if (
                    $user->avatar &&
                    Storage::disk('public')->exists($user->avatar)
                ) {

                    Storage::disk('public')
                        ->delete($user->avatar);

                }

                $data['avatar'] = $request
                    ->file('avatar')
                    ->store('avatars', 'public');

            }

            /**
             * Password optional
             */

            if (!empty($request->password)) {

                $data['password'] = Hash::make(
                    $request->password
                );

            } else {

                unset($data['password']);

            }

            /**
             * Checkbox
             */

            $data['is_active'] = $request->boolean(
                'is_active'
            );

            /**
             * Update User
             */

            $user->update($data);

            /**
             * Sync Roles
             */

            if ($request->filled('roles')) {

                $user->syncRoles(
                    $request->roles
                );

            }

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with(
                    'success',
                    'User berhasil diperbarui.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(User $user)
    {
        /**
         * Tidak boleh menghapus akun sendiri
         */

        if ($user->id === auth()->id()) {

            return back()->with(
                'error',
                'Anda tidak dapat menghapus akun yang sedang digunakan.'
            );

        }

        /**
         * Jangan hapus Super Admin terakhir
         */

        if ($user->hasRole('Super Admin')) {

            $superAdminCount = User::role('Super Admin')->count();

            if ($superAdminCount <= 1) {

                return back()->with(
                    'error',
                    'Minimal harus ada satu Super Admin.'
                );

            }

        }

        DB::beginTransaction();

        try {

            /**
             * Hapus Avatar
             */

            if (
                $user->avatar &&
                Storage::disk('public')->exists($user->avatar)
            ) {

                Storage::disk('public')
                    ->delete($user->avatar);

            }

            /**
             * Hapus Role
             */

            $user->syncRoles([]);

            /**
             * Delete User
             */

            $user->delete();

            DB::commit();

            return redirect()
                ->route('users.index')
                ->with(
                    'success',
                    'User berhasil dihapus.'
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}
