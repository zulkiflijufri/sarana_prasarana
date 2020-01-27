<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/dasboard" style="font-size: 19px">Sarana Prasarana STT NF</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				@if(request()->path() != 'dasboard' && request()->path() != 'pengajuan')
					<form class="navbar-form navbar-left" action="{{'persetujuan' == request()->path() ? '/persetujuan' : '/history'}}" method="GET">
						<div class="input-group">
							<input type="text" class="form-control" name="cari" placeholder="{{'persetujuan' == request()->path() ? 'Cari pengajuan' : 'Cari history'}}" autocomplete="off">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary">Cari</button>
							</span>
						</div>
					</form>
				@endif
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('admin/assets/img/user.png')}}" class="img-circle" alt="Avatar"> <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>