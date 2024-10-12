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
						<div class="age">{{$user->age}} ans</div>
					</div>	

				</div>
				<div class="line-sprt"></div>
				<div class="ct-infs-prfl">
					<div class="infs-avis">
						<a href="{{route('covoiturage.user.avis', ['name' => str_slug($user->name . ' ' . $user->prenom), 'user_id' => $user->id])}}" class="btn-avis">
							<i class="fa fa-star"></i>
							<span class="tp-vhcl">@if($user->profil_avis()->count()>0){{profil_note($user->profil_avis)}}/5 - @endif {{$user->profil_avis()->count()}} avis</span>
							<i class="fa fa-chevron-right chv-pls-avis"></i>
						</a>
					</div>
					<div class="infs-prfl">
						<i class="fa fa-users"></i>
						<span class="tp-vhcl">Membre depuis {{month(intval(date('m', strtotime($user->created_at))))}} {{date('Y', strtotime($user->created_at))}}</span>
					</div>



					<div class="infs-prfl">
						<i class="i-icn-img-prfl">
			          		<img src="/assets/images/trajet.png">
			          	</i>
						<span class="tp-vhcl">{{$user->trajets()->count()}} trajets publies</span>
					</div>


				</div>
				<div class="line-sprt"></div>

				<div class="ct-infs-prfl">
					
					<div class="infs-prfl prfl-vrf">
						<i class="fa fa-shield"></i>
						<span class="tp-vhcl">{{$user->name}} {{$user->prenom}} et profil verifie</span>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">Membre professionnel</span>
							<i class="i-icn-img-prfl chv-pls-avis">
				          		<img src="/assets/images/user-pro.png">
				          	</i>
						</a>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">Membre basique</span>
							<i class="i-icn-img-prfl chv-pls-avis">
				          		<img src="/assets/images/utilisateur.png">
				          	</i>
						</a>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							@if($user->is_email_verified)
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">Adresse Email verifie</span>
							@else
							<i class="fa fa-warning warn"></i>
							<span class="tp-vhcl">Adresse Email non verifie</span>
							@endif
							<i class="fa fa-envelope chv-pls-avis"></i>
						</a>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							@if(is_pj_verified($user, 'cin'))
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">CIN verifie</span>
							@else
							<i class="fa fa-warning warn"></i>
							<span class="tp-vhcl">CIN non verifie </span>
							@endif
							<i class="fa fa-id-card chv-pls-avis"></i>

						</a>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							@if(is_pj_verified($user, 'permis'))
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">Permis de conduire verifie</span>
							@else
							<i class="fa fa-warning warn"></i>
							<span class="tp-vhcl">Permis de conduire non verifie</span>
							@endif
							<i class="fa fa-id-card chv-pls-avis"></i>

						</a>
					</div>

					<div class="infs-avis">
						<a href="javascript:" class="btn-avis">
							@if(is_pj_verified($user, 'residence'))
							<i class="fa fa-check-square-o"></i>
							<span class="tp-vhcl">Adresse Domicile verifie</span>
							@else
							<i class="fa fa-warning warn"></i>
							<span class="tp-vhcl">Adresse Domicile non verifie</span>
							@endif
							<i class="fa fa-id-card chv-pls-avis"></i>

						</a>
					</div>

					<div class="infs-prfl">
						<i class="material-icons m-ic md-location_on"></i>
						<span class="tp-vhcl">{{$user->adresse}}, {{$user->ville}}</span>
					</div>

						

				</div>
				<div class="line-sprt"></div>

				<div class="ct-infs-prfl">
					
					<div class="infs-prfl prfl-vrf">
						<i class="fa fa-handshake-o"></i>
						<span class="tp-vhcl">Fiates-vous connaissance avec Mohammed Ali</span>
					</div>
					@if($user->aime_discuter)
					<div class="infs-prfl">
						<i class="fa fa-commenting"></i>
						<span class="tp-vhcl">J'aime bien discuter quand je me sens à l'aise</span>
					</div>
					@endif

					@if($user->aime_music_tout_long)
					<div class="infs-prfl">
						<i class="fa fa-music"></i>
						<span class="tp-vhcl">Music tout le long</span>
					</div>

					@if($user->musics()->count() > 0)
					<div class="infs-prfl">
						<i class="fa fa-check-square-o"></i>
						<span class="tp-vhcl">
							@foreach($user->musics as $key => $music)
							@if($key != $user->musics()->count() - 1)
							{{$music->libelle}} | 
							@else
							{{$music->libelle}}
							@endif
							@endforeach
						</span>
					</div>
					@endif
					@endif

						

				</div>
				<div class="line-sprt"></div>

				<div class="ct-infs-prfl">
					<div class="infs-prfl">

						<div class="ct-btn inline-block">
							<a href="javascript:" class="btn-pls-ctrg">
								<i class="fa fa-phone"></i>
								<span>{{$user->full_telephone}}</span>
							</a>
						</div>

						@if($user->fb_link)
						<div class="ct-btn inline-block">
							<a href="{{$user->fb_link}}" class="btn-pls-ctrg">
								<i class="fa fa-facebook"></i>
								Facebook
							</a>
						</div>
						@endif

						@if($user->full_whatsapp)
						<div class="ct-btn inline-block">
							<a href="https://wa.me/{{$user->full_whatsapp}}" class="btn-pls-ctrg">
								<i class="fa fa-whatsapp"></i>
								Whatsapp
							</a>
						</div>
						@endif

						<div class="ct-btn inline-block">
							<a href="javascript:" class="btn-pls-ctrg">
								<i class="fa fa-warning"></i>
								signaler
							</a>
						</div>
						
					</div>
				</div>
				<div class="line-sprt"></div>
      		</div>
      		
      	
      </div>
   </div>
</section>
@endsection