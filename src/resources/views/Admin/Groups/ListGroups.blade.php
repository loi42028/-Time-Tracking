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
								<a href="#">Groups</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">List of Group</h4>
										<form>
											<div class="input-group">									
												<input class="form-control" id="system-search" name="q" placeholder="Search for" required>
												<span type="submit" class="input-group-text"><i class="fas fa-search"></i>
												</span>
											</div>
										</form>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add Group
										</button>
									</div>								
								</div>
								<div class="card-body">
									<!-- Modal add group --------------------------------------------------- -->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div  class="modal-dialog ant-modal" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">														
														New Group														
													</h5>													
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>												
												<div class="modal-body">
													<form action="{{URL::to('/admin/groups/save-group')}}" method="post">
													@csrf
														<div class="row">
															<div class="form-group col-sm-12 row">
																<div class="col-2"></div>
																<p for="inputNameGroup" class="col-form-label col-2" style="font-weight: 700;">Name Group</p>
																<div class="col-sm-8">
																	<input type="namegroup" name="namegroup" class="form-control" id="inputNameGroup" required>
																</div>
															</div>														
															<div class="form-group col-sm-12 row">
																<div class="col-2"></div>
																<p for="Leader" class="col-form-label col-2" style="font-weight: 700;">Leader</p>
																<div class="col-sm-8">
																	<input type="email" class="form-control" name="leader" required>
																</div>
															</div>
															<div class="form-group col-sm-12 row">
																<div class="col-2"></div>
																<p for="Leader" class="col-form-label col-2" style="font-weight: 700;">Describe</p>																
																<div class="col-sm-8">
																	<textarea class="form-control" name="intro" rows="3"></textarea>
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
									
									@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									@if(session('message'))
                                        <div class="alert alert-success">
                                        {{session('message')}}
                                        </div>
                                    @endif
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover table-list-search" >
											<thead>
												<tr>
													<th>Group Name</th>
													<th>Leader</th>
													<th>Staff</th>
													<th>Creator</th>
													<th>Described</th>
													<th style="width: 10%">Function</th>
												</tr>
											</thead>
											<tbody>
                                                @foreach($dataGroups as $key=>$data)
												<tr>
													<td>{{$data->name}}</td>
                                                    <td class="ant-table-row-cell-break-word">
                                                        <div class="title">
                                                            <!-- <span class="ant-badge ant-badge-status"> -->
															<a href="">
																<span class="ant-avatar avatar ant-avatar-square ant-avatar-image ant-avatar-icon" style="width: 54px; height: 54px; line-height: 54px; font-size: 27px;">
																														
																		<img class="ant-avater-img" src="https://s3-acheckin.s3.kstorage.vn/7RBZqHCG2gRvCGw6.jpeg">
																</span>
															</a>

                                                            <a class="meta" href="{{URL::to('/admin/users/edit-user/'.$data->userId)}}">
                                                                <span class="ant-typography meta_name">
                                                                    <strong>{{$data->username}}</strong>
                                                                </span>
                                                                <small class="meta_sub">{{$data->leader}}</small>
                                                            </a>
                                                        </div>
                                                    </td>
													<td>													
														@foreach($countStaff as $key=>$staff)
															@if($staff->id == $data->id)
																{{$staff->staff}}
															@endif
														@endforeach
													</td>
													<td>
														{{$data->creatoremail}}														
													</td>
													<td>
														{{$data->desc}}														
													</td>
													<td>
														<div class="form-button-action">
														<!-- <button type="button" class="btn btn-primary editbtn">edit</button> -->
															<!-- <button class="btn btn-link btn-primary btn-lg editbtn">
																<i href="#" class="fa fa-edit"></i>
															</button> -->
															<a href="{{URL::to('/admin/groups/edit-group/'.$data->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-warning" data-original-title="Edit Group">
																<i class="fas fa-users-cog"></i>
															</a>
															<a href="{{URL::to('/admin/groups/list-user-group/'.$data->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Member of the group">
																<i class="fas fa-user-friends"></i>
															</a>
															<a href="{{URL::to('/admin/groups/delete-group/'.$data->id)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete Group">
																<i class="fa fa-times"></i>
															</a>
															
														</div>
													</td>
												</tr>
                                                @endforeach												
											</tbody>
											
										</table>										
									</div>
									{{$dataGroups->links()}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
@endsection