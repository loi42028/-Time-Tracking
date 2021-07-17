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
								<a href="#">Roles</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">List of Roles</h4>
										<form>
											<div class="input-group">									
												<input class="form-control" id="system-search" name="q" placeholder="Search for" required>
												<span type="submit" class="input-group-text"><i class="fas fa-search"></i>
												</span>
											</div>
										</form>

									</div>								
								</div>
								<div class="card-body">
									
									
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover table-list-search" >
											<thead>
												<tr>
													<th>Roles Name</th>
													<th>scopes</th>
													<!-- <th style="width: 10%">Function</th> -->
												</tr>
											</thead>
											<tbody>
                                                @foreach($dataRoles as $key=>$data)
												<tr>
													<td>{{$data->name}}</td>
													<td>
														{{$data->scopes}}														
													</td>										
												</tr>
                                                @endforeach												
											</tbody>
											
										</table>										
									</div>
						
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		
@endsection