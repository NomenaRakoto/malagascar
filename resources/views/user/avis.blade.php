@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
      <div class="page-container frm-ct-dv">
      		<div class="cvtrg-detail">
      			<div class="ct-dtl">
					<a href="javascript:" class="ct-img-dtl-prfl inline-block">
						<img src="/assets/img/app/pdp/{{$user->pdp}}">
					</a>
					<div class="infs-bs-prfl inline-block">
						<div class="name">{{$user->name}} {{$user->prenom}}</div>
						<div class="age">Avis</div>
					</div>	
					@if(\Auth::id() != $user->id)
					<div class="ct-btn inline-block">
						<a href="javascript:" class="btn-pls-ctrg btn-vtr-avis">
							<i class="fa fa-star"></i>
							Votre avis
						</a>
					</div>
					@endif
				</div>
				<div class="line-sprt"></div>
				<div class="ct-dtl-avis-prfl">
					<div class="ttl-avis">
						<div class="pcpl">{{profil_note($user->profil_avis)}}/5</div>
						<div class="scndr">{{$user->profil_avis()->count()}} Avis</div>
					</div>
				</div>

				<div class="infs-avis">
					<a href="javascript:" class="btn-avis">
						<span class="tp-vhcl">Excellent</span>
						<span class=" nb-avis">{{nb_note($user, 5)}}</span>
					</a>
				</div>

				<div class="infs-avis">
					<a href="javascript:" class="btn-avis">
						<span class="tp-vhcl">Bien</span>
						<span class=" nb-avis">{{nb_note($user, 4)}}</span>
					</a>
				</div>

				<div class="infs-avis">
					<a href="javascript:" class="btn-avis">
						<span class="tp-vhcl">Correct</span>
						<span class=" nb-avis">{{nb_note($user, 3)}}</span>
					</a>
				</div>

				<div class="infs-avis">
					<a href="javascript:" class="btn-avis">
						<span class="tp-vhcl">Decevant</span>
						<span class=" nb-avis">{{nb_note($user, 2)}}</span>
					</a>
				</div>

				<div class="infs-avis">
					<a href="javascript:" class="btn-avis">
						<span class="tp-vhcl">Tres decevant</span>
						<span class="nb-avis">{{nb_note($user, 1)}}</span>
					</a>
				</div>

				@if(count($profil_avis) > 0)
				<div class="avs-cmmts">
					<div class="avs-cmmt">
						@foreach($profil_avis as $key => $avis)
						<div class="infs-avis ct-cmmt-avs">
							<a href="{{route('covoiturage.user.profil', ['name' => str_slug($avis->user->name . ' ' . $avis->user->prenom), 'user_id' => $avis->user->id])}}" class="btn-prfl-avis">
								<i class="i-img-cmmt">
									<img src="/assets/img/app/pdp/{{$avis->user->pdp}}">
								</i>
								<span class="tp-vhcl">{{$avis->user->name}} {{$avis->user->prenom}}</span>
								<i class="fa fa-chevron-right chv-pls-avs-dtl"></i>
							</a>
							<div class="ct-cmmt-avs">
								<div class="msg">
									<span>{{note($avis->note)}}</span><br>
									{{$avis->messages}}
								</div>
								<p><span class="ct-date-avis">{{month(intval(date('m', strtotime($avis->created_at))))}} {{date('Y', strtotime($avis->created_at))}}</span></p>
							</div>	
						</div>
						@endforeach
						<div class="ct-btn-dwn-avs">
							<a class="cmd-btn" href="javascript:">
								<i class="fa fa-chevron-circle-down"></i>
							</a>
						</div>
					</div>
					
				</div>
				@endif
      		</div>
      		
      	
      </div>
   </div>
</section>
@endsection

@if(Auth::check())
@include('user.modal-avis')
@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('.btn-vtr-avis').on('click', function(){
			$('#mdl-avis').modal('show');
		});
	});
</script>
@endpush
@endif