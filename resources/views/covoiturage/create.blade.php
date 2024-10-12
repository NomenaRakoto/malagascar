@extends('layouts.app')


@section('content')  
<section class="profil page-body-content">
  <div class="inner">
      <div class="page-container frm-ct-dv">
      	<form class="frm-pple" novalidate method="POST" action="{{route('covoiturage.save')}}"enctype="multipart/form-data">
      		{{ csrf_field() }}
      		<div class="dv-pg-type">
	      		<div>
		      		<h1 class="ttl-frm"> Proposer ou demander des place? </h1>
		      	</div>
		      	<div class="dv-slct-tp">
		      		<a href="javascript:" tab-ct="pctl" value='1' class="tp-slct cstm-rd-slct frst active">
		      			Proposer
		      		</a>
		      		<a href="javascript:" tab-ct="qtdn" value='2' class="tp-slct cstm-rd-slct scnd">
		      			Demander
		      		</a>
		      		<input type="hidden" name="type_ad" value="1">
		      	</div>
		      	<div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" next="dprt" step="ignore" class="btn btn-primary btn-frm-pag">Suivant</a>
			    </div>
		    </div>
	      	<div class="dv-pg-dprt hide">
	      		<div>
		      		<h1 class="ttl-frm">D'où partez vous?</h1>
		      	</div>
		      	<div class="dv-ipt">
		          <span class="icn-ipt"><i class="material-icons m-ic md-location_on"></i></span>
		          <input type="text" name="depart" id='depart' class="ipt-frm rqrd" placeholder="Saisissez votre adresse de depart" />
		        </div>

			    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" step="ignore" next="type" class="btn btn-primary btn-frm-pag">Précédente</a>
			      <a href="javascript:" next="dest" step="depart" class="btn btn-primary btn-frm-pag btn-rqrd hide">Suivant</a>
			    </div>
	      	</div>

	      	<div class="dv-pg-dest hide">
	      		<div>
		      		<h1 class="ttl-frm">Où voulez-vous allez?</h1>
		      	</div>
		      	<div class="ct-msg-sec">
				    Vous pouvez saisir un a un vos destinations et appuyer sur entree ainsi que les villes sur la route que vous voulez afficher sur la publication. Par exemple : Tana - Antsirabe - Ambositra - Fandriana
				</div>
		      	<div class="dv-ipt">
		          <span class="fa-dest icn-ipt"><i class=" fa fa-location-arrow"></i></span>
		          <input type="text" id='arrive' class="ipt-frm" placeholder="Saisissez les destinations" />
		        </div>

		        <div id="etapes">
		        	<div class="trjt-stp first">
		        		<i class="material-icons m-ic md-location_on"></i> <span id='dprt-trjt'></span>
		        		<input type="hidden" name="trajets">
		        	</div>		        	
		        </div>

			    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" step="ignore" next="dprt" class="btn btn-primary btn-frm-pag">Précédente</a>
			      <a href="javascript:" step="ignore" next="date" class="btn btn-primary btn-frm-pag btn-sv-etp hide">Suivant</a>
			    </div>
	      	</div>

	      	<div class="dv-pg-date hide">
	      		<div>
		      		<h1 class="ttl-frm"> Quand partez-vous?</h1>
		      	</div>
		      	<div class="dv-slct-tp">
		      		<a href="javascript:" tab-ct="pctl" value='0' class="tp-slct cstm-rd-slct frst active">
		      			Ponctuel
		      		</a>
		      		<a href="javascript:" tab-ct="qtdn" value='1' class="tp-slct cstm-rd-slct scnd">
		      			Quotidienne
		      		</a>
		      		<input type="hidden" name="quotidienne" value="1">
		      	</div>
		      	<div class="pctl dv-hr">
		      		<div class="dv-ipt-2">
			      		<div class="dv-ipt">
				          <span class="fa-dest icn-ipt"><i class=" fa fa-calendar"></i></span>
				          <input id="date" type="text" name="date_depart" value="{{date('d/m/Y')}}" class="ipt-frm date-input" placeholder="Date" />
				        </div>
			      	</div>
			      	<div class="dv-ipt-2">
			      		<div class="dv-ipt">
				          <span class="fa-dest icn-ipt"><i class=" fa fa-clock-o"></i></span>
				          <input type="text" value="{{date('H:i')}}" name="heure_depart" class="ipt-frm time-input" placeholder="Heure" />
				        </div>
			      	</div>
		      	</div>

		      	<div class="qtdn dv-hr hide">
		      		<div class="dv-ct-day chk-dt-ct">
		      			<div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day chk-all">
					         	<input type="checkbox" name="" class="chk-ipt">
					          	<label for="subscribeNews">Tous</label>
			      			</a>
			      			<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" placeholder="Heure" name="" value="{{date('H:i')}}" />
			      			</span>
				          	
				        </div>
		      			<div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" name="jour[]">
					          	<label for="subscribeNews">Dimanche</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

			      		<div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Lundi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

				        <div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Mardi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

				         <div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Mercredi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

				         <div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Jeudi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

				         <div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Vendredi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>

				         <div class="dv-ipt-dy">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="checkbox" checked="" name="jour[]">
					          	<label for="subscribeNews">Samedi</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-clock-o"></i>
			      				<input class="ipt-hr-day time-input" type="text" name="jour_heure[]" placeholder="Heure" value="{{date('H:i')}}" />
			      			</span>
				        </div>


			      	</div>
		      	</div>

			    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" step='ignore' next="dest" class="btn btn-primary btn-frm-pag">Précédente</a>
			      <a href="javascript:" step='ignore' next="place" class="btn btn-primary btn-frm-pag">Suivant</a>
			    </div>
	      	</div>

	      	<div class="dv-pg-place hide">
	      		<div>
		      		<h1 class="ttl-frm"> Combien de place à offrir?</h1>
		      	</div>
		      	<div class="">
		      		<div class="dv-ct-day">
		      			<div class="dv-ipt-dy plc plc-mt">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" checked="" name="vehicule_id" value="1">
					          	<label for="subscribeNews">Moto</label>
			      			</a>
			      			<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="1" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				          	
				        </div>

				        <div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id" value="2">
					          	<label for="subscribeNews">Legere</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="4" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>
		      			
		      			<div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id" value="3" >
					          	<label for="subscribeNews">4x4</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="6" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>

				        <div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id" value="4">
					          	<label for="subscribeNews">Starex</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="11" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>

				        <div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id">
					          	<label for="subscribeNews">Minibus</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="13" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>

				        <div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id">
					          	<label for="subscribeNews">Sprinter</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="17" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>

				        <div class="dv-ipt-dy plc-vtr plc">
			      			<a href="javascript:" class="slct-day a-chk">
					         	<input type="radio" name="vehicule_id">
					          	<label for="subscribeNews">Autres</label>
			      			</a>
				          	<span class="spn-ipt">
			      				<i class=" fa fa-user"></i>
			      				<input class="ipt-hr-day" type="text" value="20" name="nb_place_offert" placeholder="Nb Place" />
			      			</span>
				        </div>


			      	</div>
		      	</div>
		      	
			    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" step='ignore' next="date" class="btn btn-primary btn-frm-pag">Précédente</a>
			      <a href="javascript:" step='ignore' next="pic" class="btn btn-primary btn-frm-pag">Suivant</a>
			    </div>
	      	</div>

	      	<div class="dv-pg-pic hide">
	      		<div>
		      		<h1 class="ttl-frm"> Ajoutez des photos </h1>
		      	</div>
		      	<div class="ct-img-multi">
		      		<div class="ct-img-ad">
					    <div class="pj-rgstr">
					      <img class="img-pj img-preview" src="/assets/images/image.png">
					      <a class="mdf-pdp mdf-photo" target="img-0" href="javascript:">
					        <i class="fa fa-camera"></i>
					      </a>
					      <input class="cstm-ipt-file" id="img-0" name="img-0" type="file" accept="image/*" capture="user" onchange="encodeImageFileBase64(this)">
					    </div>
					  </div>

					  <div class="ct-img-ad">
					    <div class="pj-rgstr">
					      <img class="img-pj img-preview" src="/assets/images/image.png">
					      <a class="mdf-pdp mdf-photo" target="img-1" href="javascript:">
					        <i class="fa fa-camera"></i>
					      </a>
					      <input class="cstm-ipt-file" id="img-1" name="img-1" type="file" accept="image/*" capture="user" onchange="encodeImageFileBase64(this)">
					    </div>
					  </div>

					  <div class="ct-img-ad">
					    <div class="pj-rgstr">
					      <img class="img-pj img-preview" src="/assets/images/image.png">
					      <a class="mdf-pdp mdf-photo" target="img-2" href="javascript:">
					        <i class="fa fa-camera"></i>
					      </a>
					      <input class="cstm-ipt-file" id="img-2" name="img-2" type="file" accept="image/*" capture="user" onchange="encodeImageFileBase64(this)">
					    </div>
					  </div>

					  <div class="ct-img-ad">
					    <div class="pj-rgstr">
					      <img class="img-pj img-preview" src="/assets/images/image.png">
					      <a class="mdf-pdp mdf-photo" target="img-3" href="javascript:">
					        <i class="fa fa-camera"></i>
					      </a>
					      <input class="cstm-ipt-file" id="img-3" name="img-3" type="file" accept="image/*" capture="user" onchange="encodeImageFileBase64(this)">
					    </div>
					  </div>
		      		
		      	</div>
		      	
		      	
			    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
			      <a href="javascript:" step='ignore' next="place" class="btn btn-primary btn-frm-pag">Précédente</a>
			      <a href="javascript:" next="pic" class="btn btn-primary btn-frm-pag btn-submit">Publier</a>
			    </div>
	      	</div>
      		
      	</form>
      </div>
   </div>
</section>
@endsection
@push('styles')
<link rel="stylesheet" href="/assets/file-input/css/fileinput.min.css" />
@endpush
@push('scripts')
<script src="/assets/file-input/js/fileinput.min.js"></script>
<script src="/assets/js/form-pagination.js"></script>
<script src="/assets/js/cstm-radio.js"></script>
<script src="/assets/js/cstm-single-choice.js"></script>
<script src="/assets/js/cstm-img-file.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.file').fileinput({
			'multiple' : true,
			'uploadUrl' : '/upload',
			 deleteUrl: "/site/file-delete"
		});

		$('.r-chk').on('click',function(){
			var chk = $(this).find('input');
			chk.prop( "checked", true);
		});

		$('.chk-all').on('click', function(){

			if($(this).find('input').is(':checked')) {
				$('.chk-dt-ct').find('input').prop("checked", false);
			} else {
				$('.chk-dt-ct').find('input').prop( "checked", true);
			}
			
		});

		$('.vhcl').on('click', function(){
			$('.plc').hide();
			$('.plc-' + $(this).attr('vhcl')).show();
		});

		$('#depart').on('change', function(){
			$('#dprt-trjt').text($(this).val());
			$('#dprt-trjt').parent().find('input').val($(this).val());
		});

		$('body').on('click', 'a.rmv-trjt', function() {
			var trjt = $('.elm-trjt');
		    if(trjt.length == 1) {
		    	$(this).parent().parent().parent().parent().find('.btn-sv-etp').hide();
		    }  
		    $(this).parent().parent().remove();
		    
		});

		$("#arrive").keyup(function(e){ 
	      var code = e.key; // recommended to use e.key, it's normalized across devices and languages
	      if(code==="Enter" && $(this).val().trim() != '') {
	        e.preventDefault();
	        $(this).parent().parent().parent().find('.btn-sv-etp').show();
	        $('#etapes').append("<div><div class='trjt-dssn-crt'></div><div class='trjt-stp'><i class='fa fa-location-arrow'></i> " + $(this).val() + "<input class='elm-trjt' type='hidden' name='trajets[]' value='" + $(this).val() + "'><a href='javascript:' class='rmv-trjt'><i class='fa fa-window-close'></i></a></div></div>");
	        $(this).val('');
	      }
	    });
	});
</script>
@endpush