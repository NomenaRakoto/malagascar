@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
      <div class="page-container frm-ct-dv cnx-ct">
          <div class="cvtrg-detail">
            <div class="ct-dtl">
              <div class="infs-bs-prfl inline-block">
                <div class="name">Se connecter en utilisant?</div>
              </div>  

            </div>
            <div class="line-sprt"></div>
            <div class="ct-infs-prfl">
              <div class="infs-avis">
                <a href="" class="btn-avis">
                  <span class="tp-vhcl">Compte facebook</span>
                  <i class="i-icn-img-cnx">
                    <img src="/assets/images/facebook.png">
                  </i>
                  <i class="fa fa-chevron-right chv-pls-avis"></i>
                </a>
              </div>

              <div class="infs-avis">
                <a href="javascript:" id="mail-lg-lnk" class="btn-avis">
                  <span class="tp-vhcl">Adresse email</span>
                  <i class="i-icn-img-cnx">
                    <img src="/assets/images/e-mail.png">
                  </i>
                  <i class="fa fa-chevron-right chv-pls-avis"></i>
                </a>
              </div>



              <div class="infs-prfl">
                <i class="i-icn-img-prfl">
                        <img src="/assets/images/new-user.png">
                      </i>
                <span class="tp-vhcl">
                  Pas encore membre?
                  <a href="{{route('register')}}">S'inscrire</a>
                </span>
              </div>


            </div>
          </div>
          
        
      </div>

      <div class="page-container hide email-lg-frm">
      
        <div class="listing listing-text log no-wrap register-container">
          
          
          <div class="three-column lgn-ctt">
                @if($status = \Session::get('quote'))
                <div class="alert alert-success" role="alert">
                 {{i18n('demande_devis.demande_devis_connexion_message')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                @if($status = \Session::get('message_create_password'))
                <div class="alert alert-success" role="alert">
                 {{i18n('login.password-reinit-success')}}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                
                <form class="frm-lg" novalidate method="POST" action="{{route('process_login')}}">
                {{ csrf_field() }}

                <div class="ct-dtl">
                  <div class="infs-bs-prfl inline-block">
                    <div class="name">{!!i18n('connexion.sidentifier')!!}</div>
                  </div>  

                </div>
                <div class="line-sprt"></div>
                
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                 {!!i18n('messages.error_connexion')!!}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif

               
                <div class="ipt-cnx">
                  <input type="text" name="email" class="ipt" placeholder="{!!i18n('connexion.mail')!!}" @if($errors->any())  value="{{old('email')}}" @endif />
                  @error('name')
                  <p class="error">{{$message}}</p>
                  @enderror
                </div>
                <div class="ipt-cnx">
                  <input type="password" name="password" class="ipt" placeholder="{!!i18n('connexion.password')!!}" />
                </div>
                <div class="ipt-cnx">
                  <a class="pass-forgot" href="{{route('passwordforgot')}}">{!!i18n('connexion.forgot_password')!!}</a>
                </div>
                <div class="load-more">
                  <button class="btn btn-login">
                    {!!i18n('connexion.connexion')!!}
                  </button>
                </div>
                </form>
          </div>
        </div>
      </div>
   </div>
</section>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#mail-lg-lnk').on('click', function(){
      $('.cnx-ct').hide();
      $('.email-lg-frm').show();
    });
  });
</script>
@endpush