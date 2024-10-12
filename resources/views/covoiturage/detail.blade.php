@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
      <div class="page-container frm-ct-dv">
      		<div class="cvtrg-detail">
      			<div class="ct-dtl">
					<div class="">
						<span class="dtl-ttl-date">
							<i class="fa fa-calendar"></i>
							29 Septembre 2024
						</span>
					</div>
					<div class="ct-dtl-day">
						<div class="ct-day">
							<span class="day">
								L
							</span>
							<span class="day disable">
								M
							</span>
							<span class="day">
								M
							</span>
							<span class="day disable">
								J
							</span>
							<span class="day">
								V
							</span>
							<span class="day">
								S
							</span>
							<span class="day">
								D
							</span>
						</div>
						<div class="ct-btn-day">
							<a class="cmd-btn" href="javascript:">
								<i class="fa fa-chevron-circle-down"></i>
							</a>
						</div>	
						<div class="dtl-price">
							10,000.00 MGA
						</div>
					</div>	
					
				</div>
				<div class="line-sprt"></div>
				<div class="ct-dtl ct-dtl-trj">
					<div class="cvtrg-trjt">
						<div class="cvtrg-dprt">
							<div>
								<span class="hr-dprt">
									09:00
								</span>
								<span class="dprt-i">
									<i class="material-icons md-location_on"></i>
								</span>
							</div>
							<div class="dprt-nm">
								Analamahitsy, Antananarivo
							</div>
						</div>
						<div class="trjt-dssn"></div>
						<div class="cvtrg-etp">
							<div>
								<span class="dprt-i">
									<i class="fa fa-dot-circle-o"></i>
								</span>
							</div>
							<div class="etp-nm-ipr">
								Andravoahangy
							</div>
						</div>
						<div class="trjt-dssn trj-etp"></div>
						<div class="cvtrg-etp">
							<div>
								<span class="dprt-i">
									<i class="fa fa-dot-circle-o"></i>
								</span>
							</div>
							<div class="etp-nm-pr">
								Besarety
							</div>
						</div>
						<div class="trjt-dssn trj-etp"></div>
						<div class="cvtrg-etp">
							<div>
								<span class="arrvd-i">
									<i class="fa fa-dot-circle-o"></i>
								</span>
							</div>
							<div class="etp-nm-ipr">
								Besarety
							</div>
						</div>
					</div>
				</div>
				<div class="line-sprt"></div>
				<div class="ct-dtl">
					<div class="frst ct-infos-profil">

						<div class="inline-block infs-ct">
							<i class="i-img-prfl">
			          		<img src="/assets/images/chauffeur.jpg">
			          	</i>
			          	<span class="tp-vhcl">Mohammed Ali</span>
			          	
			          	
						</div>
						<div class="inline-block infs-ct seprt">
							<i class="fa fa-star"></i>
							<span class="tp-vhcl">4.2/5 - 45 avis</span>
						</div>
					</div>

					<div class="ct-contact">
						<div class="inline-block infs-ct seprt">

							<div class="ct-btn inline-block">
								<a href="{{route('covoiturage.user.profil', ['name' => str_slug('Mohammed Ali'), 'user_id' => 26])}}" class="btn-pls-ctrg">
									<i class="fa fa-user"></i>
									<span>Profil</span>
								</a>
							</div>

							<div class="ct-btn inline-block">
								<a href="javascript:" class="btn-pls-ctrg">
									<i class="fa fa-phone"></i>
									<span>+261 34 41 559 52</span>
								</a>
							</div>

							<div class="ct-btn inline-block">
								<a href="javascript:" class="btn-pls-ctrg">
									<i class="fa fa-facebook"></i>
									Facebook
								</a>
							</div>

							
						</div>
					</div>
				</div>
				<div class="line-sprt"></div>
				<div class="ct-dtl">
					<div class="frst ct-infos-profil">

						<div class="inline-block infs-ct">
							<i class="i-icn-img">
				          		<img src="/assets/images/sprinter.png">
				          	</i>
			          		<span class="tp-vhcl">Sprinter</span>
						</div>

						<div class="inline-block infs-ct">
							<i class="i-icn-seat">
				          		<img src="/assets/images/place.png">
				          	</i>
				          	<span class="tp-vhcl infs-seat">12/12 disponible</span>
						</div>
					</div>

					<div class="ct-type-vhcl">
						<div class="inline-block infs-ct">
			          		<span class="tp-vhcl infs-seat">Wolkswagen / Blanc</span>
						</div>
					</div>
				</div>
				<div class="line-sprt"></div>
				<div class="ct-dtl">
					<div class="ct-img">
						<div class="lft-big">
							<img src="/assets/images/securite2.jpg">
							<div>
								<a class="cmd-img" href="javascript:">
									<i class="fa fa-chevron-circle-left"></i>
								</a>
								<a class="cmd-img" href="javascript:">
									<i class="fa fa-chevron-circle-right"></i>
								</a>
							</div>
							
						</div>

						<div class="rght-smll">
							<a href="javascript:" class="smll-img inline-block">
								<img src="/assets/images/securite2.jpg">
							</a>

							<a href="javascript:" class="smll-img inline-block">
								<img src="/assets/images/securite2.jpg">
							</a>

							<a href="javascript:" class="smll-img inline-block active">
								<img src="/assets/images/securite2.jpg">
							</a>							
						</div>

					</div>
				</div>
				<div class="line-sprt"></div>

				<div class="ct-cmmts">
					<div class="cmmt">
						<div class="ct-pht-prfl pht-cmmts inline-block">

							<div class="inline-block infs-ct">
								<a href="javascript:">
									<i class="i-img-prfl">
					          		<img src="/assets/images/chauffeur.jpg">
					          		</i>
								</a>
											          	
							</div>
						</div>

						<div class="msg-cmmts inline-block">
							<p class="txt-cmmt">
								 <a class="cmmt-name" href="javascript">Mohammed Ali</a><br>
								 Bonjour. Je prevois d'aller a Majunga depuis tana le 11 septembre. je cherche alors des clients. il y a 4 places disponibles. M'hesitez pas a me contacter
							</p>
						</div>
					</div>

					<div class="cmmt">
						<div class="ct-pht-prfl pht-cmmts inline-block">

							<div class="inline-block infs-ct">
								<a href="javascript:">
									<i class="i-img-prfl">
					          			<img src="/assets/images/messages-2.jpg">
					          		</i>
								</a>
											          	
							</div>
						</div>

						<div class="msg-cmmts inline-block">
							<p class="txt-cmmt">
								 <a class="cmmt-name" href="javascript">Sarah Rakotomalala</a><br>
								 Bonjour. Je veux reserver 2 places svp
							</p>
						</div>
					</div>
					

					<div class="new-cmmts">
						<div class="dv-ipt">
				          <span class="fa-dest icn-ipt"><i class=" fa fa-comment"></i></span>
				          <input type="text" name="password" class="ipt-cmmt" placeholder=" Commentaire ou question" />
				          <a href="javascript:" class="btn-snd-cmmt"><i class="fa fa-send"></i></a>
				        </div>
					</div>
				</div>
				<div class="line-sprt"></div>
				<div class="ct-cmmts">
					<div class="ct-btn inline-block">
						<a href="javascript:" class="btn-pls-ctrg">
							<i class="fa fa-warning"></i>
							Signaler cette annonce
						</a>
					</div>
				</div>
      		</div>
      		
      	
      </div>
   </div>
</section>
@endsection