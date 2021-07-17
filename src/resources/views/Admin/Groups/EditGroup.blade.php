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
									<div class="card-title">Edit Group</div>
                                    <!-- <p class="card-category">Add New Staff</p> -->
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
								<form class="card-body form-row" action="{{URL::to('/admin/groups/save-edit-group/'.$dataGroup->groupId)}}" method="POST">	
									@csrf																
                                    
                                        <div class="form-group col-sm-12 row">
                                            <div class="col-1"></div>
                                            <p for="inputNameGroup" class="col-form-label col-2" style="font-weight: 700;">Name Group</p>
                                            <div class="col-sm-8">
                                                <input type="namegroup" name="namegroup" class="form-control" id="inputNameGroup" value="{{$dataGroup->groupname}}" required>
                                            </div>
                                        </div>																											
                                        <div class="form-group col-sm-12 row">
                                            <div class="col-1"></div>
                                            <p for="Leader" class="col-form-label col-2" style="font-weight: 700;">Leader</p>
                                            <div class="col-sm-8">
                                                <input type="email" class="form-control" name="leader" value="{{$dataGroup->email}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 row">
                                            <div class="col-1"></div>
                                            <p for="Leader" class="col-form-label col-2" style="font-weight: 700;">Describe</p>																
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="intro" rows="3">{{$dataGroup->desc}} </textarea>
                                            </div>																
                                        </div>
						
								
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