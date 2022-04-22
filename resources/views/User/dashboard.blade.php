@extends('layouts.app')
@section("includes")
    <link href="{{asset('css/users/left-dashboard.css')}}" rel=stylesheet>
@endsection
@section("content")
<div class="row mw-100 mx-0">
	<div class="dashboard-sidebar d-inline-block col-md-3 pr-0 pl-1">
		<div class="dashboard-sidebar-inner" data-simplebar="init">
			
			<div class="dashboard-nav-container w-100">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger" style="overflow:hidden">
					<span class="hamburger hamburger--collapse">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Navigation de dashboard</span>
				</a>

                <div class="dashboard-nav pr-0">
					<div class="dashboard-nav-inner py-1">

						<ul>
							<li class="@yield('dashboard')"><a href="{{Route('publications.create')}}"><i class="fa fa-tachometer"></i> new publication</a></li>
							<li class="@yield('messages')"><a href="{{route('view.listeamis')}}"><i class="fa fa-envelope"></i> Amis</a></li>
							<li class="@yield('avis')"><a href="{{route('profile')}}"><i class="fa fa-star"></i> profile</a></li>
						</ul>
						
						
						
					</div>
				</div>

            </div>
        </div>
    </div>
</div>