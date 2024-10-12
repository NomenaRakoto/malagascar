@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container">
        <form class="frm-pple" novalidate method="POST" action="{{route('process_register')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
          @if($errors->any())
          <div class="alert alert-danger" role="alert">
            {!!i18n('messages.error_saisie')!!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @include('account.register.connexion')
          @include('account.register.infos-perso')
          @include('account.register.contact')
          @include('account.register.pdp')
          @include('account.register.pj')
          <div class="infs-perso dv-pg-preference hide">
            @include('account.register.preference')
            <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
              <a href="javascript:" step='ignore' next="residence" class="btn btn-primary btn-frm-pag">Précédente</a>
              <a href="javascript:" next="" class="btn btn-primary btn-submit">Suivante</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@push('styles')
<link rel="stylesheet" href="/assets/inttelput/css/intlTelInput.css" />
@endpush
@push('scripts')
<script src="/assets/inttelput/js/intlTelInput.js"></script>
<script src="/assets/js/countryPhoneSelect.js"></script>
<script src="/assets/js/form-pagination.js"></script>
<script src="/assets/js/cstm-radio.js"></script>
<script src="/assets/js/cstm-img-file.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.shw-psswd').on('click', function(){
      if($(this).find('.fa').hasClass('fa-eye')) {
        $(this).find('.fa').removeClass('fa-eye');
        $(this).find('.fa').addClass('fa-eye-slash');
        $(this).parent().find('.psswd').attr('type', 'text');
      } else {
        $(this).find('.fa').addClass('fa-eye');
        $(this).find('.fa').removeClass('fa-eye-slash');
        $(this).parent().find('.psswd').attr('type', 'password');
      }
    });

    $(".ipt-enter").keyup(function(e){ 
      var code = e.key; // recommended to use e.key, it's normalized across devices and languages
      if(code==="Enter") {
        e.preventDefault();
        $(this).parent().find('.ipt-vl-ct').append("<span class='msc-tp'>" + $(this).val() + " <i class='fa fa-window-close rmv-msc'></i> <input type='hidden' value='" + $(this).val() + "' name='" + $(this).attr('val-name') + "'> </span>");
        $(this).val('');
      }
    });

    $('body').on('click', '.rmv-msc', function() {
      $(this).parent().remove();
    });
  });
</script>
@endpush
@endsection