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
								<a href="#">Group {{$dataGroup->name}}</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">List of Employees of Group {{$dataGroup->name}}</h4>
										<div class="col-md-3">
											<form>
												<div class="input-group">									
													<input class="form-control" id="system-search" name="q" placeholder="Search for" required>
													<span type="submit" class="input-group-text"><i class="fas fa-search"></i>
													</span>
												</div>
											</form>
										</div>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add Member
										</button>									

									</div>
								
									@if(count($errors)>0)
										<div class="alert alert-danger mt-3">
											@foreach($errors->all() as $err)
											{{$err}}<br>
											@endforeach
										</div>
                                    @endif
									@if(session('message'))
                                        <div class="alert alert-success mt-3">
                                        {{session('message')}}
                                        </div>
                                    @endif
								</div>
								<div class="card-body">
								
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div  class="modal-dialog ant-modal" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">														
														Add New Member														
													</h5>													
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>												
												<div class="modal-body">
													<form action="{{URL::to('/admin/groups/save-new-member/'.$dataGroup->id)}}" method="post">
													@csrf
														<div class="row">																													
															<div class="form-group col-sm-12 row">
																<div class="col-2"></div>
																<p for="member" class="col-form-label col-2" style="font-weight: 700;">Email Member</p>
																<div class="col-sm-8">
																	<input type="email" class="form-control" name="member" required>
																</div>
															</div>											

														</div>
														<div class="modal-footer no-bd">
															<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
												
											</div>
										</div>
									</div>

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover table-list-search" >
											<thead>
												<tr>
													<th>Staff's name</th>
													<th>Roles</th>										
													<th>Position</th>
													<th style="width: 10%">Function</th>
												</tr>
											</thead>
											<!-- <tfoot>
												<tr>
													<th>Name</th>
													<th>Position</th>
													<th>Office</th>
													<th>Action</th>
												</tr>
											</tfoot> -->
											<tbody>
                                                @foreach($dataUsers as $key=>$data)
												<tr>
                                                    <td class="ant-table-row-cell-break-word">
                                                        <div class="title">
                                                        
                                                            <a class="meta" href="{{URL::to('/admin/users/edit-user/'.$data->userId)}}">
                                                                <span class="ant-typography meta_name">
                                                                    <strong>{{$data->profileName}}</strong>
                                                                </span>
                                                                <small class="meta_sub">{{$data->email}}</small>
                                                            </a>
                                                        </div>
                                                    </td>
													<td>{{$data->rolesName}}</td>
													<td>@if($data->userId == $dataGroup->leader)
															Leader
														@else
															Member
														@endif
													</td>
													
													<!-- <td>Edinburgh</td> -->
													<td>
														<div class="form-button-action">
															<a href="{{URL::to('/admin/users/edit-user/'.$data->userId)}}"  class="btn btn-link btn-primary btn-lg">
																<i href="#" class="fa fa-edit"></i>
															</a>
															<a href="{{URL::to('/admin/groups/dlt-user-group/'.$data->userId.'/'.$data->groupId)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
												</tr>
                                                @endforeach												
											</tbody>
										</table>										
									</div>
									{{$dataUsers->links()}}
								</div>
								

							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>		
@endsection