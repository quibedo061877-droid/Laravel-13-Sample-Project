<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Department</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <!-- Edit Department Form -->
            <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="code">Department Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $department->code }}" autofocus>
                    @error('code')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $department->name }}" autofocus>
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror  
                </div>
                <button type="submit" class="btn btn-primary">Update Department</button>
            </form>
        </div>
    </div>
</x-app-layout>