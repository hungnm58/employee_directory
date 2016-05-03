@extends('admin.master')
@section('action','Department List')
@section('content')
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>STT</th>
            <th>Name</th>
            <th>Office Phone</th>
            <th>Manager</th>
            <th>View Employees</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php $stt = 0; ?>
        @foreach($data as $item )
        <?php $stt++ ;?>
        <tr class="odd gradeX" align="center">
            <td>{!! $stt !!}</td>
            <td>{!! $item['name'] !!}</td>
            <td>{!! $item['office_phone'] !!}</td>
            <td>
                @if($item['em_id'] == 0)
                    {!! 'Empty' !!}
                @else
                    <?php
                        $depart = DB::table('employees')->where('id',$item['em_id'])->first();
                        echo $depart->name;
                    ?>
                @endif
            </td>
            <td class="center"><i class="fa fa-users fa-fw"></i><a href="{!! URL::route('admin.department.getView',$item['id']) !!}"> View</a></td>
            <td class="center"><i class="fa fa-trash  fa-fw"></i><a onclick="return confirmDelete('Do you want delete this department?')" href="{!! URL::route('admin.department.getDelete',$item['id']) !!}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.department.getEdit',$item['id']) !!}">Edit</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@endsection