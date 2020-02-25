<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav list-group">
						@if(auth()->user()->role == 'admin')
							<li><a href="/dasboard" style="font-size: 15px" class="{{ 'dasboard' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
							<li><a href="/pengajuan" style="font-size: 15px" class="{{ 'pengajuan' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-pencil"></i> <span>Pengajuan</span></a></li>
							<li><a href="/persetujuan" style="font-size: 15px" class="{{ 'persetujuan' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-envelope"></i> <span>Persetujuan</span></a></li>
							<li><a href="/history" style="font-size: 15px" class="{{ 'history' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-chart-bars"></i> <span>History Pengajuan</span></a></li>
						@elseif(auth()->user()->role == 'atasan')
							<li><a href="/dasboard" style="font-size: 15px" class="{{ 'dasboard' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dasboard</span></a></li>
							<li><a href="/persetujuan" style="font-size: 15px" class="{{ 'persetujuan' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-envelope"></i> <span>Persetujuan</span></a></li>
							<li><a href="/history" style="font-size: 15px" class="{{ 'history' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-chart-bars"></i> <span>History Pengajuan</span></a></li>
						@elseif(auth()->user()->role == 'pengajuan')
							<li><a href="/dasboard" style="font-size: 15px" class="{{ 'dasboard' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-home"></i> <span>Dasboard</span></a></li>
							<li><a href="/pengajuan" style="font-size: 15px" class="{{ 'pengajuan' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-pencil"></i> <span>Pengajuan</span></a></li>
							<li><a href="/history" style="font-size: 15px" class="{{ 'history' == request()->path() ? 'active' : ''}}"><i class="lnr lnr-chart-bars"></i> <span>History Pengajuan</span></a></li>
						@endif
					</ul>
				</nav>
			</div>
		</div>