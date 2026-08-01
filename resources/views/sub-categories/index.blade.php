@extends('template.main')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Sub Category Management</h3>

        <a
            href="{{ route('sub-categories.create') }}"
            class="btn btn-primary">

            + Add Sub Category

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <div class="card">

        <div class="card-body">
		<div class="table-responsive">

            <table id="example2" class="table table-bordered table-hover">

                <thead>

                <tr>

                    <th width="50">No</th>

                    <th>Category</th>

                    <th>Code</th>

                    <th>Name</th>

                    <th width="100">Status</th>

                    <th width="220">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($subCategories as $subCategory)

                    <tr>

                        <td>

                           {{ $loop->iteration }}

                        </td>

                        <td>

                            {{ $subCategory->category->name }}

                        </td>

                        <td>

                            {{ $subCategory->code }}

                        </td>

                        <td>

                            {{ $subCategory->name }}

                        </td>

                        <td>

                            @if($subCategory->is_active)

                                <span class="badge bg-success">

                                    Active

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Inactive

                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('sub-categories.show',$subCategory) }}"
                                class="btn btn-info btn-sm">

                                Detail

                            </a>

                            <a
                                href="{{ route('sub-categories.edit',$subCategory) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('sub-categories.destroy',$subCategory) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete this data?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No Data Available

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            

        </div>
		</div>

    </div>

</div>

@endsection
@push('scripts')
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

 <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- DataTables Buttons Extension (Wajib ada jika menggunakan opsi buttons) -->
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

	 <script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	{{-- <script> 
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script> --}}
    <script>
      $(document).ready(function() {
          var table = $('#example2').DataTable({
              // 1. Aktifkan perubahan jumlah data per halaman
              lengthChange: true, 
              
              // 2. Tentukan pilihan opsi jumlah data (10, 20, 50, dan Semua)
              lengthMenu: [
                  [10, 20, 50, -1],
                  [10, 20, 50, "Semua"]
              ],
              
              // 3. Tentukan susunan elemen (dom): 
              // B = Buttons, l = length changing input, f = filtering input (search), 
              // r = processing, t = table, i = information, p = pagination
              dom: '<"row mb-3"<"col-md-6"l><"col-md-6"f>>' +
                   '<"row mb-3"<"col-md-6"B>>' +
                   '<"row"<"col-md-12"tr>>' +
                   '<"row mt-3"<"col-md-5"i><"col-md-7"p>>',
                   
              buttons: ['copy', 'excel', 'pdf', 'print']
          });
        
          table.buttons().container()
              .appendTo('#example2_wrapper .col-md-6:eq(0)');
      });
  </script>
  <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @endpush