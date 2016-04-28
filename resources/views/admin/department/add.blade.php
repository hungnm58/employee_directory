    @extends('admin.master')
@section('action','Add Department')
@section('content')
    <div class="col-lg-7 panel-body" style="padding-bottom:120px">
    <form action="{!! route('admin.department.getAdd') !!}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
        <div class="form-group">
            <label>Department Name</label>
            <input class="form-control" name="txtName" placeholder="Please Enter Department Name" />
            @if(count($errors->get('txtName')) > 0)
            <div class="text-danger">
                <ul>
                    @foreach($errors->get('txtName') as $error)
                    {!! $error !!}
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="form-group">
            <label>Office Phone</label>
            <input class="form-control" name="txtPhone" placeholder="Please Enter Office Phone" />
        </div>
        <div class="form-group">
            <label>Manager</label>
            <select class="form-control" name="txtManager">
                <option value="">Please Choose Manager</option>
                <option value="">Hùng</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </form>
</div>
@endsection
@endsection