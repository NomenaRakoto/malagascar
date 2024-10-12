@extends('layouts.app')

@section('content')  
<section class="profil page-body-content">
  <div class="inner">
      <div class="page-container frm-ct-dv ">
          <div class="cvtrg-detail">
            <div class="ct-dtl">
              <div class="infs-bs-prfl inline-block">
                <div class="name">S'inscrire en utilisant?</div>
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
                <a href="{{route('register_mail')}}" class="btn-avis">
                  <span class="tp-vhcl">Adresse email ou Numero Telephone</span>
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
                  Deja membre?
                  <a href="{{route('login')}}">Se connecter</a>
                </span>
              </div>


            </div>
          </div>
          
        
      </div>
   </div>
</section>
@endsection