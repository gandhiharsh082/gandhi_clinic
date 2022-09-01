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
                            <label>C/o</label>
                            <input class="form-control" type="text" name="co" placeholder="Enter Patient's co">
                        </div> 
                        <div class="form-group ">
                            <label>D/o</label>
                            <input class="form-control" type="text" name="do" placeholder="Enter Patient's do">
                        </div> 
                   <div class="form-group ">
                            <label>Rx</label>
                            <input class="form-control" type="text" name="rx" placeholder="Enter Patient's rx">
                        </div> 
                   <div class="form-group ">
                            <label>Fee</label>
                            <input class="form-control" type="text" name="fee" placeholder="Enter Patient's fee">
                        </div> 
                   <div class="form-group ">
                            <label>Patient doc (report)</label>
                            <input class="form-control" type="file" name="image"  id="image">
                            
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
                            <label>co</label>
                            <input class="form-control" type="text" id="co" name="co" placeholder="Enter coco">
                        </div>
                           <div class="form-group ">
                            <label>do</label>
                            <input class="form-control" type="text" id="do" name="do" placeholder="Enter dodo">
                        </div>
                           <div class="form-group ">
                            <label>rx</label>
                            <input class="form-control" type="text" id="rx" name="rx" placeholder="Enter rxrx">
                        </div>
                           <div class="form-group ">
                            <label>fee</label>
                            <input class="form-control" type="text" id="fee" name="fee" placeholder="Enter freefree">
                        </div>
                           <div class="form-group ">
                            <label>Patient doc (report)</label>
                            <input class="form-control" type="file" name="image"  id="image">

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
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{asset('paperassets')}}/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                      @if($patient->image)
                      <img class="shadow-large" src="{{asset('storage')}}/{{$patient->image}}" alt="img">
                      @else
                    <img class="avatar border-gray" src="https://cdn.pixabay.com/photo/2017/07/18/23/23/user-2517433_960_720.png" alt="...">
                      @endif
                    <h5 class="title">{{$patient->name}}</h5>
                      
                  </a>
                   
                  <p class="description">
                    Age {{$patient->age}}
                  </p>
                </div>
                <p class="description text-center">
                 contact - {{$patient->phone}}
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-6 ml-auto">
                      <h5>{{$patient->Patientdetail->count()}}<br><small>Appointment</small></h5>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 ml-auto mr-auto">
                      <h5>₹{{$patient->Patientdetail->sum('fee')}}<br><small>fee</small></h5>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
        <div class="card card-user">
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
                    <button class="btn btn-info" data-toggle="modal" data-target="#addmodal11">Add Appointment</button>
                    <!--Here you can write extra buttons/actions for the toolbar-->
                </div>
                <table id="bootstrap-table" class="table">
                    <thead>
<!--                        <th data-field="state" data-checkbox="true"></th>-->
                        <th data-field="id" data-visible="false">id</th>
                        <th data-field="created_at" data-sortable="true">Date</th>
                        <th data-field="co" data-sortable="true">C/o</th>
                        <th data-field="do" data-sortable="true">D/o</th>
                        <th data-field="rx" data-sortable="true">Rx</th>
                        <th data-field="fee" data-sortable="true">fee</th>
                            <th data-field="image" width="100" data-sortable="true">Patient doc (report)</th>
                        <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">Actions</th>
                    </thead>
                    <tbody>
                    @foreach($patient->Patientdetail->sortByDesc('id') as $p)
                        <tr>

                            <td>{{$p->id}}</td>
                            <td>{{ $p->created_at->diffforhumans()}}</td> 
                            <td>{{$p->co}}</td>
                            <td>{{$p->do}}</td>
                            <td>{{$p->rx}}</td>
                            <td>{{$p->fee}}</td>
                             <td><img width="100%" src="{{asset('storage')}}/{{$p->image}}"></td>
                            <td></td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
              '<a   href="{{asset('pdf')}}/'+row.id+'"  class="btn btn-danger"> <i class="fas fa-fw fa-file-pdf"></i> PDF</a>',
         
            
        ].join('');
    }
    
    $().ready(function() {
        window.operateEvents = {
            'click .edit': function(e, value, row, index) {
                info = JSON.stringify(row);
                $('#co').val(row.co);
                $('#do').val(row.do);
                $('#rx').val(row.rx);
                $('#fee').val(row.fee);
                $('#id').val(row.id);
            },
            
             'click .detail': function(e, value, row, index) {
                window.location='{{asset('patientdetail')}}/'+row.id; 
            },
            'click .remove': function(e, value, row, index) {
                console.log(row);
                e.preventDefault();
                var data = {
                    id: row.id,
                    _method: 'delete',
                };
                
                $.ajax({
                    url: "{{url('patientdetail')}}/"+(row.id),
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
                        iziToast.success({
                    color: 'green',
                    position: 'topRight',
                    icon: 'icon-circle-check',
                    title: 'Success!',
                    message: data.success,
                });
                        setTimeout(function(){  window.location.reload(); }, 1000); 
                    },
                    
                });
                $table.bootstrapTable('remove', {
                    field: 'id',
                    values: [row.id]
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
        formData.append('patient_id','{{$patient->id}}');
        
//        formData.append('description',CKEDITOR.instances.description.getData()) ;
        $.ajax({
            url: '{{url('patientdetail')}}/'+$('#id').val(),
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
          formData.append('patient_id','{{$patient->id}}');
//        formData.append('description',CKEDITOR.instances.description2.getData()) ;
        $.ajax({ 
            url: "{{route('patientdetail.store')}}",
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