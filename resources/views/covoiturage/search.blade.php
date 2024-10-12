@extends('layouts.app')

@section('content')  
<section class="profil bg-gr">
  <div class="inner">
  	  <div>
  		<div>
      		<h1 class="ttl-frm">Où voulez-vous allez?</h1>
      	</div>
      	<div class="form-search frm-srch">
	      <div>
	        <div class="ipt-srch-ct">
	          <span class="icn"><i class="material-icons m-ic md-location_on"></i></span>
	          <input type="text" name="password" class="ipt" placeholder="Départ" />
	        </div>
	        
	        <div class="ipt-srch-ct">
	          <span class="fa-dest icn"><i class=" fa fa-location-arrow"></i></span>
	          <input type="text" name="password" class="ipt" placeholder="Destination" />
	        </div>

	        <div class="ipt-srch-ct">
	          <span class="fa-dest icn"><i class=" fa fa-calendar"></i></span>
	          <input type="text" name="password" value="" class="ipt" placeholder="Date" />
	        </div>

	        <div class="ipt-srch-ct">
	          <span class="fa-dest icn"><i class=" fa fa-user"></i></span>
	          <input type="text" name="password" value="1 Passager" class="ipt" placeholder="Passager" />
	        </div>

	        <div class=" btn-srch">
	          <a href="javascript:">
	            <span>Rechercher</span>
	            <i class=" fa fa-search"></i>
	          </a>
	        </div>
	        
	      </div>
	      
	    </div>
  	</div>
    <div class="frm-srch">
    	

      	@include('covoiturage.filter')
      	<div class="rslt">
      		<div class="ct-clss">
      			<a class="clss-cvtrg active" href="javascript:">
      				Tout (12)
      			</a>
      			<a class="clss-cvtrg" href="javascript:">
      				<i class="icn-tab prps-cvtrg"><img src="/assets/images/proposition_covoiturage.png"></i>
      				<span class="tb-ttle">Proposition</span> (208)
      			</a>
      			<a class="clss-cvtrg" href="javascript:">
      				<i class="icn-tab srch-cvtrg"><img src="/assets/images/search_covoiturage.png"></i>
      				<span class="tb-ttle">Demande</span> (204)
      			</a>
      		</div>
      		@include('covoiturage.summer')
      		@include('covoiturage.summer')
      	</div>      	
    </div>
   </div>
</section>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/datetimepicker/jquery.datetimepicker.min.css') }}" />
<link rel="stylesheet" href="/assets/file-input/css/fileinput.min.css" />
@endpush
@push('scripts')
<script src="/assets/file-input/js/fileinput.min.js"></script>
<script type="text/javascript" src="/assets/datetimepicker/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.file').fileinput({
			'multiple' : true,
			'uploadUrl' : '/upload',
			 deleteUrl: "/site/file-delete"
		});

		$('.a-chk').on('click',function(){
			var chk = $(this).find('input');
			if(chk.is(':checked')) {
				chk.prop("checked", false);
			} else {
				chk.prop( "checked", true);
			}
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


		$('.date-input').datetimepicker({
			format:'d/m/Y',
			startDate: new Date(),
			timepicker:false,
			minDate:true,

		});

		$('.time-input').datetimepicker({
			format:'H:i',
			step: 15,
			timepicker:true,
			datepicker:false
		});
		$.datetimepicker.setLocale('fr');

		

		$('.btn-frm-pag').on("click", function(){
			$('.dv-pg-' + $(this).attr('next')).show();
			$(this).parent().parent().hide();
		});	

		$('.tp-slct').on('click', function(){
			$(this).parent().find('.tp-slct').removeClass('active');
			$(this).addClass('active');
			$('.dv-hr').hide();
			$('.' + $(this).attr('tab-ct')).show();

		});

		$('#fltr-btn').on('click', function(){
			$('.ct-lst-filter').show();
		});

		$('.cls-fltr').on('click', function(){
			$('.ct-lst-filter').hide();
		});
	});
</script>
@endpush