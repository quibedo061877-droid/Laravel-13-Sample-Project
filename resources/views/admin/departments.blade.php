<x-app-layout>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Departments</h1>
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <!-- Display success message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-building fa-fw"></i> Departments List
                    <div class="pull-right">
                        <a href="{{ route('admin.departments.create') }}" class="btn btn-success btn-xs">Add Department</a>
                    </div> 
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Department Code</th>
                                <th>Department Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr class="odd gradeX">
                                    <td>{{ $department->code }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td class="center">
                                        <!-- Add your action buttons here -->
                                        <a href="{{ route('admin.departments.edit', $department->id) }}" class="btn btn-primary btn-xs">Edit</a>
                                        <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</x-app-layout>