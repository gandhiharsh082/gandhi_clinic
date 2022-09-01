<html>
    
    <head class="no-printme">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        
        <META http-equiv="Content-Type" content="text/html; charset=UTF-8"> </META>
        
        <title>Chitti</title>
        <link href="{{asset('pdfassets')}}/chitti.css" rel="stylesheet">
        
    </head>
    <body>
        <div > 
            <br>
            <br>
            <br>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-5 brandname" ><b>GANDHI CLINIC DABRA</b></h1>
                        <small class="subhead">Vaidya Ram Narayan Gandhi Aushdhalaya </small><br>
                        <small class="subhead">near rassjb Balla ka dera gwaliour jhansi road dabra  </small>
                    </div>
                    <div class="col-4">
                        <img class="logo" src="{{asset('pdfassets')}}/logo.png" height="212px" width="212px">
                    </div>
                </div>
                
            </div>
            <br>
            <br>
            <br>
            <br>
            <hr class="hr-head">
            <div class="container intro">
                <div class="row justify-content-md-center">
                    <div class="col-4 col-offset-2">
                       <h3 class="name"> Dr Rajesh Gandhi</h3>
                       <h4 style="font-size: 17px; padding-top:3px;" >B.A.M.S,Jiwaji Uni. Gwl</h4>
                       <h4 style="font-size: 17px;padding-top:3px;" >[C.C.H Pune]</h4>
                       <h4 style="font-size: 17px;padding-top:3px;" >+91 8849886312</h4>
                    </div>
                    <div class="col-2">
                     
                    </div>
                    
                    <div  class="col-4">
                        <h4 style="font-size: 15px; float:right;">Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Carbon\Carbon::parse($p->date)->format('d/m/Y')}} </h4>
                        
                        
                    </div>
                </div>
            </div>
            <hr class="hr-head">
            <br>
            <br>
            <br>
            <br>
          
            <div class="container intro">
                <div class="row justify-content-md-center">
                    <div class="col-6 col-offset-2 ">
                       
                       <h4 style="font-size: 20px; padding-top:3px;" >D/o  {{$p->do}}</h4>
                       <h4 style="font-size: 20px;padding-top:3px;" >C/o {{$p->co}}</h4>
                       <h4 style="font-size: 20px;padding-top:3px;" >R/x {{$p->rx}}</h4>
                    </div>
                    <div  class="col-4">
<!--                        <h4 style="font-size: 15px; float:right;">Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14/6/2020</h4>-->
                        
                        
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
<!--
             <div class="container intro">
                <div class="row justify-content-md-center">
                    <div class="col-2  col-offset-2">
                       
                       <h4 class="name" style="font-size: 20px; padding-top:3px;" >Mr./MS/Mrs.</h4>
                       <h4 class="name" style="font-size: 20px;padding-top:3px;" >Age</h4>
                       <h4 class="name" style="font-size: 20px;padding-top:3px;" >Address</h4>
                       <h4 class="name" style="font-size: 20px;padding-top:3px;" >Contact Num</h4>
                    </div>
                    <div class="col-6">
                       <h4 style="font-size: 20px; padding-top:3px;" >{{$p->patient->name}}</h4>
                       <h4 style="font-size: 20px; padding-top:3px;" >{{$p->patient->age}}</h4>
                       <h4 style="font-size: 20px; padding-top:3px;" >{{$p->patient->address}}</h4>
                       <h4 style="font-size: 20px; padding-top:3px;" >{{$p->patient->phone}}</h4>
                     
                    </div>
                    
                    <div  class="col-2">
                        
                        
                    </div>
                </div>
            </div>
-->
            
              <div class="container intro">
                <div class="row justify-content-md-center">
                    <div class="col-6 col-offset-2 ">
                       <table>
                    <tbody>
                        <tr>
                        <td><h4 class="name" style="font-size: 20px; padding-top:3px;" >Mr./MS/Mrs.</h4>
</td>
                        <td><h4 style="font-size: 20px; padding-top:3px;" >: &nbsp;{{$p->patient->name}}</h4>
</td>
                        </tr>
                        
                        <tr>
                        <td><h4 class="name" style="font-size: 20px;padding-top:3px;" >Gender</h4>
</td>
                        <td><h4 style="font-size: 20px; padding-top:3px;" >: &nbsp;{{$p->patient->gender}}</h4>
</td>
                        </tr>
                        <tr>
                        <td><h4 class="name" style="font-size: 20px;padding-top:3px;" >Age</h4>
</td>
                        <td><h4 style="font-size: 20px; padding-top:3px;" >: &nbsp;{{$p->patient->age}}</h4>
</td>
                        </tr>
                        
                        <tr>
                        <td><h4 class="name" style="font-size: 20px;padding-top:3px;" >Address</h4>
</td>
                        <td><h4 style="font-size: 20px; padding-top:3px;" >: &nbsp;{{$p->patient->address}}</h4>
</td>
                        </tr>
                        
                        <tr>
                        <td><h4 class="name" style="font-size: 20px;padding-top:3px;" >Contact Number &nbsp;</h4>
</td>
                        <td><h4 style="font-size: 20px; padding-top:3px;" >: &nbsp;{{$p->patient->phone}}</h4>
</td>
                        </tr>
                        
                        </tbody>
                    </table>
                    </div>
                    <div  class="col-4">
<!--                        <h4 style="font-size: 15px; float:right;">Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;14/6/2020</h4>-->
                        
                        
                    </div>
                </div>
            </div>
            
                           
            
              <br>
            <br>
            <br>  <br>
            <br>
            <br>
            <br>
            <br>
                <div class="container-fluid footer">
                <div class="row">
                    <div class="col-6">
                        <h4 class="display-5 footer-text" ><i class="fa fa-phone footer-text"></i><b>+91 8849886312</b></h4>
                      </div>
                    <div class="col-6">
                        <h4 class=" display-5 footer-text" > <i class="fa fa-envelope footer-text"></i> <b>rajgandhi0301@gmail.com</b></h4>
                      </div>
                  
                </div>
                
            </div>
        </div>
       
     
        
        
    </body>  
    
    
    
    
    
    
    
    
    
</html>

