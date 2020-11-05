<div class="tab-pane fade fade-up" id="btabs-animated-assignments" role="tabpanel">

    <form action="/assignment/create/{{$virtual_class->id}}">
        @csrf
        <button type="submit" class="btn btn-alt-primary mr-5 mb-5">
            <i class="fa fa-plus mr-5"></i> Create Assignment
        </button>
    </form>

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                <tr>
                    <th class="text-center"></th>
                    <th>Title</th>
                    <th class="d-none d-sm-table-cell">Due Date</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Time due</th>
                    <th class="text-center" style="width: 15%;">View Assignment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($class_assignments as $assignments)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td class="font-w600">{{$assignments->title}}</td>
                        <td class="d-none d-sm-table-cell">{{$assignments->due_date}}</td>
                        <td class="d-none d-sm-table-cell">
                            <span class="badge badge-primary">{{$assignments->time}}</span>
                        </td>
                        <td class="text-center">
                            <form action="/assignment/{{$assignments->id}}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="View Assignment">
                                    <i class="fa fa-book"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->
</div>

