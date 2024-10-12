<div class="infs-cnx dv-pg-cnx">
    <div class="ct-dtl">
      <div class="infs-bs-prfl inline-block">
        <div class="name frm-ttl"><i class="fa fa-user"></i> {!!i18n('creation-compte.creer_compte')!!}</div>
      </div>

    </div>
    <div class="line-sprt"></div>
    <div class="ipt-rgstr">
      <input type="email" required="" name="email" class="ipt" placeholder="{!!i18n('creation-compte.email')!!} or Phone number*"/>
      
    </div>

    <div class="ipt-rgstr">
      <input type="password" required="" name="password" class="ipt psswd" placeholder="{!!i18n('creation-compte.password')!!}*" />
      <a href="javascript:" class="shw-psswd"><i class="fa fa-eye"></i></a>
    </div>

    <div class="ipt-rgstr">
      <input type="password" required="" name="password_confirmation" class="ipt psswd" placeholder="{!!i18n('creation-compte.confirm_password')!!}*" />
      <a href="javascript:" class="shw-psswd"><i class="fa fa-eye"></i></a>
    </div> 

    <div class="ipt-cnx">
      <a class="pass-forgot" href="{{route('login')}}">{!!i18n('creation-compte.connexion')!!}</a>
    </div>
     
    <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
      <a href="javascript:" step='1' next="perso" class="btn btn-primary btn-frm-pag sbmt-frm-pg">Suivant</a>
    </div>              
  </div>