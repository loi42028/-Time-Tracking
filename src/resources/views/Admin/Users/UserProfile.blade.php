@extends('Admin.AdminLayout')
@section('admincontent')
        <div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<h4 class="page-title">User Profile</h4>
					<div class="row">
					@foreach($dataUser as $key=>$dataUser)
						<div class="col-md-8">
							<div class="card card-with-nav">
								<!-- <div class="card-header">
									<div class="row row-nav-line">
										<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
											<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
											<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
										</ul>
									</div>
								</div> -->
								
								<form class="card-body" action="{{URL::to('/admin/users/edit-user/'.$dataUser->id)}}" method="POST">
									@csrf
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									<div class="row mt-3">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Name</label>
												<input type="text" class="form-control" name="name" placeholder="Name" value="{{$dataUser->name}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Email</label>
												<input type="email" class="form-control" name="email" placeholder="Name"  value="{{$dataUser->email}}">
											</div>
										</div>
										
										
									</div>
									<div class="row mt-2">										
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Date Of Birth</label>
												<input type="text" class="form-control" id="datepicker" name="dob"  value="{{$dataUser->dob}}" placeholder="Birth Date">
											</div>
										</div>

										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Gender</label>
												<select class="form-control" name="gender" id="gender">
													@if($dataUser->gender == 0)				
														<option selected value="0">Male</option>
														<option value="1">Female</option>
													@else
														<option value="0">Male</option>
														<option selected value="1">Female</option>
													@endif
													

												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Phone</label>
												<input type="text" class="form-control"  value="{{$dataUser->phone}}" name="phone" placeholder="Phone">
											</div>
										</div>
										
									</div>	
									<div class="row mt-2">
										<div class="col-md-6">
											<div class="form-group form-group-default">
												<label>Address</label>
												<input type="text" class="form-control" value="{{$dataUser->address}}" name="address" placeholder="Address">
											</div>
										</div>	
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Identify Number</label></label>
												<input type="text" class="form-control"  value="{{$dataUser->identifynumber}}" name="identifynumber" placeholder="identifynumber">
											</div>
										</div>									
									</div>																

									<div class="row mt-2">
										
										
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label >Roles</label>
												<select class="form-control" name="rolesId">
													@foreach($dataroles as $key=>$data)												
														@if($data->id == $dataUser->rolesId)				
															<option selected value="{{$data->id}}">{{$data->name}}</option>
														@else
															<option value="{{$data->id}}">{{$data->name}}</option>
														@endif
													@endforeach												
												</select>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Working</label>
												<select class="form-control" name="action" id="action">
													@if($dataUser->action == 0)				
														<option selected value="0">No</option>
														<option value="1">Yes</option>
													@else
														<option value="0">No</option>
														<option selected value="1">Yes</option>
													@endif										

												</select>
											</div>
										</div>
									</div>
									
									<!-- <div class="row mt-2">							
									
											
										<div class="col-md-4">
											<div class="form-group form-group-default">
												<label>Personal Image</label>
												<input type="file" name="image" id="image" class="form-control-file">
											</div>
										</div>																	
																				
									</div> -->
									<div class="row mt-2">
										<div class="col-md-8">
											<div class="form-group form-group-default">
												<label>Intro</label>
												<textarea class="form-control" name="intro" placeholder="About Me" rows="3">{{$dataUser->intro}}</textarea>
											</div>
										</div>		
									</div>
													
									<div class="text-right mt-2 mb-3">
										<button type="submit" class="btn btn-success">Save</button>										
									</div>
								</form>
								
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-profile card-secondary">
								<div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
									<div class="profile-picture">
										<div class="avatar avatar-xl">
											<img src="https://s3-acheckin.s3.kstorage.vn/7RBZqHCG2gRvCGw6.jpeg" alt="..." class="avatar-img rounded-circle">
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="user-profile text-center">
										<div class="name">{{$dataUser->name}}</div>
										<div class="">Email: {{$dataUser->email}}</div>
										<div class="">Phone: {{$dataUser->phone}}</div>
										
										<div class="desc">{{$dataUser->intro}}</div>										
										
									</div>
									<div class="card-footer ml-3">
										<li class="row">
											<div class="col-4">Group:</div>											
											<div class="col">
												@foreach($datagroup as $key => $data)					
													{{$data->name}}	<br>																					
												@endforeach

											</div>	
										</li>										
										<li class="row">																				
											<div class="col-4">Roles:</div>											
											<div class="col-8">
												@foreach($dataroles as $key=>$data)								
													@if($data->id == $dataUser->rolesId)
													{{$data->name}}
													@endif
												@endforeach
											</div>													
										</li>
									</div>
								</div>								
							</div>
						</div>
						<!-- and col-4 -->
					@endforeach
					</div>
					
				</div>
			</div>
			
		</div>
       
		



@endsection