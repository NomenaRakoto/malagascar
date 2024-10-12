<header class="page-container-fluid px-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
      <img src="/assets/images/malagasycar-logo.png" alt="Whoomies" />
    </a>
    
    <div class="btn-mbl-menu">

    	
      @if(Auth::check())
      <a class="menu-a compte d-lg-none" href="{{route('logout')}}">
      <i class="fa fa-sign-out"></i></a>
      @else
      <a class="menu-a compte d-lg-none" href="{{route('login')}}">
        <i class="fa fa-user-circle"></i>
      </a>
      @endif
      
    	<a href="#" class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#menu"
          aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="material-icons md-menu"></i>
    	</a>
    </div>
   
    <div class="collapse navbar-collapse" id="menu">
      
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0 ">
        
    	  
        <li class="menu deroulant"><a href="#"><i class="fa fa-plus-circle"></i> Publier &ensp;</a>
          <ul class="sous">
            <li><a class="menu-a" href="{{route('covoiturage.proposer')}}">Covoiturage</a></li>
            <li><a class="menu-a" href="{{route('nos_activites')}}">Location de voiture</a></li>
          </ul>
        </li>

        <li class="menu deroulant"><a href="#"><i class="fa fa-search"></i> Rechercher &ensp;</a>
          <ul class="sous">
            <li><a class="menu-a" href="{{route('covoiturage.search')}}">Covoiturage</a></li>
            <li><a class="menu-a" href="{{route('nos_activites')}}">Location de voiture</a></li>
            <li><a class="menu-a" href="{{route('nos_activites')}}">Taxi brousse</a></li>
          </ul>
        </li>

        



        <li class="menu ">
          <a class="font-comic ntfctn" href="{{route('covoiturage.search')}}"><i class="fa fa-bell"></i></a>
        </li>
    	  
        

    	  
    	  
          @if(Auth::check())
          <li class="menu">
            <a title="{!!i18n('menu.compte')!!}" class="menu-a compte tooltipmenu" href="{{route('covoiturage.user.profil', ['name' => str_slug(\Auth::user()->name . ' ' . \Auth::user()->prenom), 'user_id' => \Auth::user()->id])}}">
              <img class="hd-img-pdp" src="/assets/img/app/pdp/{{Auth::user()->pdp}}">
              <span class="txt-cpt tooltiptext">{!!i18n('menu.compte')!!}</span>
            </a>
            <ul class="sous sous-compte">
              <li>
                <a class="menu-a compte" href="{{route('espace_client')}}">
                  <i class="fa fa-list"></i>
                  <span class="txt-cpt">{!!i18n('menu.espace_client')!!}</span>
                </a>
              </li>
              <li>
                <a class="menu-a compte" href="{{route('mon_compte')}}">
                  <i class="fa fa-gear"></i>
                  <span class="txt-cpt">{!!i18n('menu.mon_compte')!!}</span>
                </a>
              </li>

              <li>
                <a class="menu-a compte" href="{{route('logout')}}">
                  <i class="fa fa-sign-out"></i>
                  <span class="txt-cpt">{!!i18n('menu.logout')!!}</span>
                </a>
              </li>

              
            </ul>
            
          </li>
          @else
          <li class="menu">
          <a title="{!!i18n('menu.compte')!!}" class="menu-a compte tooltipmenu" href="{{route('login')}}">
            <i class="fa fa-user-circle"></i>
            <span class="txt-cpt tooltiptext">{!!i18n('menu.compte')!!}</span>
          </a>
          </li>
          @endif
          
          
        <li class="nav-item lang menu">
          @if(lang() == 'fr')
          <div class="btn-group">
            <a  class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" href="{{route('lang', ['fr'])}}">
              <img src="/assets/images/flag_fr.svg" alt="" />
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="language">
                <a href="{{route('lang', ['en'])}}" class="dropdown-item">
                  <img src="/assets/images/uk-flag.svg" alt="" />
                </a>
              </div>
            
          </div>
          @else
          <div class="btn-group">
            <a  class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" href="{{route('lang', ['fr'])}}">
              <img src="/assets/images/uk-flag.svg" alt="" />
            </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="language">
                <a href="{{route('lang', ['fr'])}}" class="dropdown-item">
                  <img src="/assets/images/flag_fr.svg" alt="" />
                </a>
              </div>
            
          </div>
          @endif
        </li>
    </ul>
  </div>
  </nav>
</header>