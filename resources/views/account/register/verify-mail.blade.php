@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <form id='verify-frm' novalidate method="POST" action="{{route('covoiturage.user.mail.verify.code')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="infs-perso dv-pg-preference">
            <div class="ct-dtl">
              <div class="infs-bs-prfl inline-block">
                <div class="name frm-ttl"><i class="fa fa-check-square-o"></i> Verifier votre adresse mail</div>
              </div>  

            </div>
            <div class="line-sprt"></div>
            <div class="ct-msg-sec">
              Verifier votre compte pour donner plus de confiance au membres de la communaute de MalagasyCar. Veuillez saisir le code à 6 chiffres envoye à <span class="ml-adrs">{{\Auth::user()->email}}</span>
            </div>
            <div class="ipt-rgstr">
              <div class="ipt-rgstr">
                <input type="email" required="" name="code" class="ipt field" placeholder="Code 6 chiffres*"/>
              </div>
            </div>
            <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
              <a href="javascript:" next="" class="btn btn-primary btn-submit">Renvoyer le code</a>
              <a href="javascript:" id='btn-verify' next="" class="btn btn-primary btn-submit">Verify</a>
              <a href="{{route('espace_client')}}" class="btn btn-primary btn-frm-pag">Ignore</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
$('#btn-verify').on('click', function(){
  $('.ct-loading').show();
  $('.error').hide();
  var data = $('#verify-frm').serialize();

  $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#verify-frm').attr('action'),
        type : 'POST',
        data : data,
        success: function (result) {

          if(result.error) {

          } else {
            location.href = result.url;
          }
          
            //console.log(JSON.stringify(result));
          $('.ct-loading').hide();

        },
        error: function (xhr, status, error) {
          if(xhr.status == 422) {
            var errors = JSON.parse(xhr.responseText);
            var inputs = $('#verify-frm').find('.field');
            
            inputs.each(function(e){
              
              var name = $(this).attr('name');

              if(errors.errors[name]) {
                $(this).parent().append('<p class="error">'+ errors.errors[name] +'</p>');
              }
              
            });
          } 

          $('.ct-loading').hide();  
        }
    });

});

</script>
@endpush