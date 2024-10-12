@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap">
        <div>
          <h1 class="ttl-frm">Espace Clients</h1>
        </div>
        <div class="three-column">
              <div class="">
                <div class="ct-clss">
                  <a class="clss-cvtrg active" href="javascript:">
                    <i class="icn-tab prps-cvtrg"><img src="/assets/images/proposition_covoiturage.png"></i>
                    <span class="tb-ttle">Trajets</span> (208)
                  </a>
                  <a class="clss-cvtrg" href="javascript:">
                    <i class="icn-tab prps-cvtrg"><img src="/assets/images/de-location.png"></i>
                    <span class="tb-ttle">Location</span> (208)
                  </a>
                </div>
                @include('covoiturage.summer')
                @include('covoiturage.summer')
              </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
