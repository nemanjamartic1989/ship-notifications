@section('title')
Users
@endsection

@extends('includes.master')

@section('main')
<div class="container custom-container">    
    <div class="row justify-content-center">        
        <div class="col-md-12">        
            <a href=" /dashboard">Dashboard</a> /         
            <a href=" /users">Users</a> / Show            
            <br><br>            
            <div class="card">                
                <div class="card-header bg-primary">                    
                    <label class="white">Detail for User: {{ $user->fullname }}</label>                                    
                </div>
                                
                <div class="card-body">                                        
                    <div class="container">                    
                        <table class="table col-md-10">            
                            <thead>                
                                <tr>                
                                    <th scope="col"><label for="form_name">Full Name</label></th>                    
                                    <td>                        
                                        <div class="col-md-12">                            
                                            <div class="form-group">  
                                                @if(isset($user->fullname))                              
                                                    {{ $user->fullname }} 
                                                @endif                           
                                            </div>                       
                                        </div>                    
                                    </td>                
                                </tr>                
                                <tr>                
                                    <th scope="col"><label for="form_name">Email</label></th>                
                                    <td>
                                        <div class="col-md-12">                        
                                            <div class="form-group"> 
                                                @if(isset($user->email))                            
                                                    {{ $user->email }} 
                                                @endif                       
                                            </div>                    
                                        </div>
                                    </td>                
                                </tr>                
                                <tr>                
                                    <th scope="col"><label for="form_name">Access level</label></th>                
                                    <td>
                                        <div class="col-md-12">                        
                                            <div class="form-group">   
                                                @if(isset($user->access_level_name))                         
                                                    {{ $user->access_level_name }}
                                                @endif                        
                                            </div>                    
                                        </div>
                                    </td>                
                                </tr>                            
                            </thead>            
                        </table>                       
                    </div>            
                </div>                        
                <a href=" /users" class="btn btn-primary">Back</a>                
            </div>            
        </div>        
    </div>    
</div>
</div>
@endsection