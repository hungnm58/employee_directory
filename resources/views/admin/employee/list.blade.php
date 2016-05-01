@extends('admin.master')
@section('action','Employees List')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Cell Phone</th>
            <th>Email</th>
            <th>Department</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 1?>
        @foreach($data as $item)
        <tr class="odd gradeX" align="center">
            <td><?php echo $stt ++?></td>
            <td><img src="{!! asset('resources/uploads/'.$item['image']) !!}" height="50px" width="50px" /></td>
            <td>{!! $item['name'] !!}</td>
            <td>{!! $item['job_title'] !!}</td>
            <td>{!! $item['cell_phone'] !!}</td>
            <td>{!! $item['email'] !!}</td>
            <td>
                <?php
                    $depart = DB::table('departments')->where('id',$item['depart_id'])->first();
                    echo $depart->name;
                ?>
            </td>
            <td class="center"><i class="fa fa-trash  fa-fw"></i><a onclick="return confirmDelete('Do you want delete this employee?')" href="{!! URL::route('admin.employee.getDelete',$item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.employee.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@endsection