@extends('layouts.admin')


@section('style')
@endsection
@section('modal')
<div class="modal fade" id="addmodal11" tabindex="-1" style="margin-top: 2%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="add" method="post" enctype="multipart/form-data" action="#">
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Create a {{$page_title}}</h4>
                        @csrf
                        <div class="form-group ">
                            <label>Profile Pic</label>
                            <input class="form-control" type="file" name="image" >
                        </div>
                        
                        <div class="form-group ">
                            <label>name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter Patient's name">
                        </div> 
                        <div class="form-group ">
                            <label>age</label>
                            <input class="form-control" type="tel" name="age" placeholder="Enter Patient's age">
                        </div> 
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Gander</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="gender">
                                <option>Male</option>
                                <option>female</option>
                                
                            </select>
                        </div> 
                        <div class="form-group ">
                            <label>phone</label>
                            <input class="form-control" type="tel" name="phone" placeholder="Enter Patient's phone">
                        </div> <div class="form-group ">
                            <label>address</label>
                            <input class="form-control" type="text" name="address" placeholder="Enter Patient's address">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button class="btn btn-default" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>
<div class="modal fade" id="updatemodal" tabindex="-1" style="margin-top: 1%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="update" method="post" enctype="multipart/form-data" action="#">
                <input type="hidden" name="_method" value="put" >
                <input type="hidden" name="id" value="" id="id" >
                @csrf
                <div class="card">
                    <div class="card-body" >
                        <h4 class="card-title">Update  {{$page_title}}</h4>
                
                        <div class="form-group ">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image"  id="image">
                        </div> 
                        
                        <div class="form-group ">
                            <label>name</label>
                            <input class="form-control" type="text" id="name" name="name" placeholder="Enter Title">
                        </div>
                        
                     <div class="form-group ">
                            <label>age</label>
                            <input class="form-control" type="text" id="age" name="age" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gander</label>
                            <select class="form-control" id="gender" name="gender">
                                <option>Male</option>
                                <option>female</option>
                                
                            </select>
                        </div>
                     <div class="form-group ">
                            <label>phone</label>
                            <input class="form-control" type="text" id="phone" name="phone" placeholder="Enter Title">
                        </div>
                     <div class="form-group ">
                            <label>address</label>
                            <input class="form-control" type="text" id="address" name="address" placeholder="Enter Title">
                        </div>
                    
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-theme pull-right">Submit</button>
                        <button class="btn btn-default" type="button" data-dismiss="modal" aria-label="Close">Close</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection


@section('content')



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if (session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>
            <div class="card-body">
                <div class="toolbar">
                    <button class="btn btn-info" data-toggle="modal" data-target="#addmodal11">Add {{$page_title}}</button>
                    <!--Here you can write extra buttons/actions for the toolbar-->
                </div>
                <table id="bootstrap-table" class="table">
                    <thead>
<!--                        <th data-field="state" data-checkbox="true"></th>-->
                        <th data-field="id" class="text-center">ID</th>
<!--                        <th data-field="image" width="100" data-sortable="true">Image</th>-->
         
                        <th data-field="name" data-sortable="true">Name</th>
                        <th data-field="age" data-sortable="true">Age</th>
                        <th data-field="gender" data-sortable="true">Gender</th>
                        <th data-field="phone" data-sortable="true">Phone</th>
                        <th data-field="address" data-sortable="true">Address</th>
                        <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                    </thead>
                    <tbody>
                    @foreach($patient as $p)
                        <tr>
<!--                            <td></td>-->
                            <td>{{$p->id}}</td>
                  
                            <td>{{$p->name}}</td>
                            <td>{{$p->age}}</td>
                            <td>{{$p->gender}}</td>
                            <td>{{$p->phone}}</td>
                            <td>{{$p->address}}</td>
                            <td></td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!--  end card  -->
    </div> <!-- end col-md-12 -->
    
</div>







@endsection

@section('script')



<script type="text/javascript">
    var $table = $('#bootstrap-table');
    
    function operateFormatter(value, row, index) {
        return [
            '<a rel="tooltip" data-toggle="modal" data-target="#updatemodal"  title="Edit" class="btn  btn-primary table-action edit mr-2" href="javascript:void(0)">',
            '<i class="fa fa-edit"></i>',
            '</a>',
           '<a rel="tooltip" title="Remove" class="btn btn-link btn-danger table-action remove" href="javascript:void(0)">',
            '<i class="fa fa-trash" aria-hidden="true"></i>',
            '</a>' ,
               '<a rel="tooltip" title="Detail" class="btn  btn-success table-action detail" href="javascript:void(0)">',
            '<i class="fa fa-eye" aria-hidden="true"></i>',
            '</a>'
            
        ].join('');
    }
    
    $().ready(function() {
        window.operateEvents = {
            'click .edit': function(e, value, row, index) {
                info = JSON.stringify(row);
                $('#name').val(row.name);
                $('#age').val(row.age);
                $('#gender').val(row.gender);
                $('#phone').val(row.phone);
                $('#address').val(row.address);
                $('#id').val(row.id);
            },
            
             'click .detail': function(e, value, row, index) {
                window.location='{{asset('patient')}}/'+row.id; 
            },
            'click .remove': function(e, value, row, index) {
                console.log(row);
                e.preventDefault();
                var data = {
                    id: row.id,
                    _method: 'delete',
                };
                
                $.ajax({
                    url: "{{url('patient')}}/"+(row.id),
                    type: "post",
                    data: data,
                    statusCode: {
                        422: function(data) {
                            console.log(data.responseJSON);
                            var errors = $.parseJSON(data.responseText);
                            $.each(errors['errors'], function (key, value) {
                                // $('#' + key).parent().addClass('error');
                                iziToast.error({
                                    position: 'topRight',
                                    title: key,
                                    message: value,
                                });
                            });
                        },
                    },
                    success: function (data) {
                        if(data.success==false){
                           iziToast.error({
                    position: 'topRight',
                    icon: 'icon-circle-check',
                    title: 'Error!',
                    message: data.msg,
                                });
                           }
                    else{
                        
                        iziToast.success({
                    color: 'green',
                    position: 'topRight',
                    icon: 'icon-circle-check',
                    title: 'Success!',
                    message: data.msg,
                });
                        $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
                });
            }
                        setTimeout(function(){  window.location.reload(); }, 1000); 
                    },
                    
                });
                
            }
        };
        
        $table.bootstrapTable({
            toolbar: ".toolbar",
            clickToSelect: true,
            showRefresh: true,
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: false,
            searchAlign: 'right',
            pageSize: 8,
            pageList: [8, 10, 25, 50, 100],
            
            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });
        
        //activate the tooltips after the data table is initialized
        $('[rel="tooltip"]').tooltip();
        
        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });
        
        
    });
</script>
<script>
    $("form#update").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
//        formData.append('description',CKEDITOR.instances.description.getData()) ;
        $.ajax({
            url: '{{url('patient')}}/'+$('#id').val(),
            type: 'post',
            data: formData,
            statusCode: {
                422: function(data) {
                    console.log(data.responseJSON);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors['errors'], function (key, value) {
                        iziToast.error({
                            position: 'topRight',
                            title: key,
                            message: value,
                        });
                    });
                },
            },
            success: function (data) {
                iziToast.success({
                    color: 'green',
                    position: 'topRight',
                    icon: 'icon-circle-check',
                    title: 'Success!',
                    message: data.success,
                });
                setTimeout(function(){  window.location.reload(); }, 1000); 
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
<script>
    $("form#add").submit(function(e) {
        e.preventDefault();    
        var formData = new FormData(this);
//        formData.append('description',CKEDITOR.instances.description2.getData()) ;
        $.ajax({ 
            url: "{{route('patient.store')}}",
            type: 'post',
            data: formData,
            statusCode: {
                422: function(data) {
//                    console.log(data.responseJSON);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors['errors'], function (key, value) {
                        iziToast.error({
                            position: 'topRight',
                            title: key,
                            message: value,
                        });
                    });
                },
            },
            success: function (data) {
                iziToast.success({
                    color: 'green',
                    position: 'topRight',
                    icon: 'icon-circle-check',
                    title: 'Success!',
                    message: data.success,
                });
                setTimeout(function(){  window.location.reload(); }, 1000); 
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    
    
     

    
    
</script>




@endsection