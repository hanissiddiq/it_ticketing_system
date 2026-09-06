<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <!-- Nama -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="small text-warning">
                    Alamat email Anda belum diverifikasi.
                    <button form="send-verification" class="btn btn-link p-0 text-decoration-underline small">
                        Klik di sini untuk mengirim ulang email verifikasi.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="small text-success fw-bold">
                        Link verifikasi baru telah dikirim ke alamat email Anda.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <!-- Department -->
    <div class="mb-3">
        <label for="department_id" class="form-label">Departemen</label>
        <select id="department_id" name="department_id" class="form-select @error('department_id') is-invalid @enderror">
            <option value="">-- Pilih Departemen --</option>
            @foreach($departments as $department)
                <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
        @error('department_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Position -->
    <div class="mb-3">
        <label for="position" class="form-label">Jabatan / Position</label>
        <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position', $user->position) }}">
        @error('position')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Nomor Telepon</label>
        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone', $user->phone) }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Avatar -->
    <div class="mb-3">
        <label for="avatar" class="form-label">Foto Profil (Avatar)</label>
        @if($user->avatar)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="rounded-circle" width="80" height="80" style="object-fit: cover;">
            </div>
        @endif
        <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
        @error('avatar')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button & Flash Message -->
    <div class="d-flex align-items-center gap-3 mt-4">
        <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>

        <!--  -->
    </div>

    <!-- Toast Container -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 9999;">
        <div id="profileToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-2">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <span>Profil berhasil diperbarui!</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>


</form>
</section>
<!-- Load Bootstrap JS & Script Trigger -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

@if (session('status') === 'profile-updated')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.getElementById('profileToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl, {
                delay: 3000 // Toast akan otomatis menghilang dalam 3 detik
            });
            toast.show();
        }
    });
</script>
@endif
