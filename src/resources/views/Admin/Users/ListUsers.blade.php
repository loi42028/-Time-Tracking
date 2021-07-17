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
								<a href="#">Staff</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">List of Employees</h4>
										<div class="col-md-3">
											<form>
												<div class="input-group">									
													<input class="form-control" id="system-search" name="q" placeholder="Search for" required>
													<span type="submit" class="input-group-text"><i class="fas fa-search"></i>
													</span>
												</div>
											</form>
										</div>
										<a href="{{URL::to('/admin/users/add-user/')}}" class="btn btn-primary btn-xs ml-auto">
											<i class="fa fa-plus"></i>
                                            Add Employee
										</a>

									</div>
								</div>
								<div class="card-body">
									<!-- Modal -->
									<!-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Row
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Create a new row using this form, make sure you fill them all</p>
													<form>
														<div class="row">
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Name</label>
																	<input id="addName" type="text" class="form-control" placeholder="fill name">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Position</label>
																	<input id="addPosition" type="text" class="form-control" placeholder="fill position">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Office</label>
																	<input id="addOffice" type="text" class="form-control" placeholder="fill office">
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div> -->

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover table-list-search" >
											<thead>
												<tr>
													<th>Staff's name</th>
													<th>Roles</th>
													<th>Group</th>
													<!-- <th>Action</th> -->
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
													<td>
														<?php
															for ($i = 0 ; $i < count($usergroup); $i++) {
																for ($j = 0 ; $j < count($group); $j++) {
																	if($usergroup[$i]->userId == $data->userId  && $usergroup[$i]->groupId == $group[$j]->id){
																		echo (' ('.$group[$j]->name.') ');
																	}
																}
															}
															
														?>
													</td>
													<!-- <td>Edinburgh</td> -->
													<td>
														<div class="form-button-action">
															<a href="{{URL::to('/admin/users/edit-user/'.$data->userId)}}"  class="btn btn-link btn-primary btn-lg">
																<i href="#" class="fa fa-edit"></i>
															</a>
															<a href="{{URL::to('/admin/users/delete-user/'.$data->userId)}}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
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