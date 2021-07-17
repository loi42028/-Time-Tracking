@extends('Admin.AdminLayout')
@section('admincontent')
<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Users</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add Users</a>
							</li>
						</ul>
					</div>
                    <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">More Staff</div>
                                    <p class="card-category">Add New Staff</p>
								</div>
								@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
								<form class="card-body form-row" action="{{URL::to('/admin/users/save-user')}}" method="POST">	
									@csrf																
									<div class="form-group col-md-4">
										<label for="nameuser">Name</label>
										<input type="nameuser" name="name" class="form-control" required>
									</div>	
                                    <div class="form-group col-md-4">
										<label for="dob">Date Of Birth</label>
										<input type="dob" name="dob" class="form-control" required>
									</div>	
                                    <div class="form-group col-md-4">
										<label >Gender</label>
										<select class="form-control" name="gender" >
											<option value="0">Male</option>
											<option value="1">Female</option>
										</select>
									</div>
                                    
                                    <div class="form-group col-md-4">
										<label for="email">Email</label>
										<input type="email" name="email" class="form-control" required>
									</div>	
                                    <div class="form-group col-md-4">
										<label for="phone">Phone</label>
										<input type="phone" name="phone" class="form-control" required>
									</div>
                                    <div class="form-group col-md-4">
										<label for="address">Address</label>
										<input type="address" name="address" class="form-control" required>
									</div>
									<div class="form-group col-md-4">
										<label for="identify">Identify Number</label>
										<input type="identify" name="identifynumber" class="form-control" required>
									</div>

                                    <div class="form-group col-md-4">
										<label >Group</label>
										<select class="form-control" name="groupId" >
											<option value="">Not</option>
											@foreach($datagroup as $key=>$data)												
												<option value="{{$data->id}}">{{$data->name}}</option>
											@endforeach
										</select>
									</div>
									
									<div class="form-group col-md-4">
										<label >Roles</label>
										<select class="form-control" name="rolesId">
											@foreach($dataroles as $key=>$data)												
												<option value="{{$data->id}}">{{$data->name}}</option>
											@endforeach
										</select>
									</div>


                                    <div class="form-group col-md-4">
										<label>Intro</label>
										<textarea class="form-control" id="intro" rows="3"></textarea>
									</div>
                                   
                                    <div class="form-group col-md-4">
										<label >Working</label>
										<select name="action" class="form-control" >
											<option value="0">No</option>
											<option selected value="1">Yes</option>
										</select>
									</div>
									<!-- <div class="form-group">
										<label for="disableinput">Disable Input</label>
										<input type="text" class="form-control" id="disableinput" placeholder="Enter Input" disabled>
									</div> -->

									
									
									<div class="card-action col-md-12">
									<button type="submit" class="btn btn-success">Submit</button>
									<!-- <button class="btn btn-danger">Cancel</button> -->
									</div>
								</form>
								
							</div>
							
						</div>


				</div>
			</div>
			
		</div>
@endsection