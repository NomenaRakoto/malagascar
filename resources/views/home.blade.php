@extends('layouts.appfooter')

@section('content')   
<section class="sct-search search">
  <div class="img1 mySlides ">
    <h1 class="font-comic">
    Voyager facilement, voyager avec du plaisir
    </h1>
    {!! image('acceuil.image_slide_1') !!}
    <div class="form-search">
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
          <input type="text" name="password" value="" class="ipt date-input" placeholder="Date" />
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
</section>

<section class="profil">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing no-wrap">
        <div class="three-column">
          <a class="block" href="{{route('covoiturage')}}">
            <div class="icn-div">
                <img src="/assets/images/des-economies.gif">
                <img src="/assets/images/covoiturage.png">
            </div>
            <figcaption class="card-caption">
              <p class="card-title">Voyager en economisant, covoiturer</p>
              <p class="p-desc-ct card-subtitle">
                Ou que vous alliez à Madagascar, covoiturer pour effectuer vos trajets sans trop depenser et dans le confort. Trouver vos compagnons de route idéal avec MalagasyCar
              </p>
            </figcaption>
          </a>
        </div>

        <div class="three-column"> 
          <a class="block" href="{{route('covoiturage')}}">
              <div class="icn-div">
                <img src="/assets/images/sans-galere.png">
                <img src="/assets/images/moto.jpg">
              </div>
              <figcaption class="card-caption">
                <p class="card-title">Vos trajet quotidien sans galère</p>
                <p class=" p-desc-ct card-subtitle">
                  Vous prenez le même trajet quotidiennement à Antananarivo? Vous allez au travail tous les jours, au salle de sport ou faires vos courses et vous galerez dans les mêlés de TaxiBe et n'arrivant pas à trouver votre bus facilement? Sachez que d'autres personnes éffectuent le même trajet que vous à vide tous les jours. MalagasyCar vous facilite la vie en vous permettant de trouver un covoiturage quotidien à mini prix
                </p>
              </figcaption>
          </a>
          
        </div>
        <div class="three-column">
          <a class="block" href="{{route('covoiturage')}}">
            <div class="icn-div">
                <img src="/assets/images/tonnerre.gif">
              </div>
            <figcaption class="card-caption">
              <p class="card-title">Publiez | Recherchez, cliquez et reservez</p>
              <p class="p-desc-ct card-subtitle">
                Publier votre annonce et l'appli se chargera de vous lier avec ce que vous voulez.
                Rechercher et réserver un trajet facilement avec notre appli facile d'utilisation et dotée de technologies avancés
              </p>
            </figcaption>
          </a>
        </div>
        
      </div>
    </div>
  </div>
</section>

<section class="profil ct-emb">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing listing-text no-wrap ct-emb-listing">
        
        <div class="three-column">
          <div class="common-card img-histo">
            <figure class="common-card-figure">
              {!!image('acceuil.historique')!!}
            </figure>
          </div>
        </div>
        <div class="three-column">
          <figcaption class="card-caption">
            <p class="histo-title">Embarquez pour des anecdotes passionnantes.</p>
            <p class="histo-text">
              Avec MalagasyCar, les rencontres font partie des voyages. Partagez votre trajet et un moment de vie avec des voyageurs de tous horizons. Discutez pendant des heures, découvrez de nouvelles musiques ou riez aux éclats avec un nouvel ami. Vivez une expérience humaine unique que seul le covoiturage peut vous offrir.
            </p>
          </figcaption>
          <div class="load-more mt-lg-5 mt-md-3  text-center">
            <a href="{{route('qui_sommes_nous')}}" class="btn btn-primary">En route</a>
          </div>
        </div>
        
      </div>

      <div class="">
        <div class="title-ou-allez">
          Ou voulez-vous aller?
        </div>

        <div class="trajet-ct">
          <a class="emb-trjt" href="javascript:">
            <span>Tana <i class=" fa fa-arrow-right"></i></span>
            <span>Antsirabe</span>
            <i class=" fa fa-chevron-right arr-trjt"></i>
          </a>
        </div>

        <div class="trajet-ct">
          <a class="emb-trjt" href="javascript:">
            <span>Tana <i class=" fa fa-arrow-right"></i></span>
            <span>Tamatave</span>
            <i class=" fa fa-chevron-right arr-trjt"></i>
          </a>
        </div>

        <div class="trajet-ct">
          <a class="emb-trjt" href="javascript:">
            <span>Tana <i class=" fa fa-arrow-right"></i></span>
            <span>Tulear</span>
            <i class=" fa fa-chevron-right arr-trjt"></i>
          </a>
        </div>

        <div class="trajet-ct">
          <a class="emb-trjt" href="javascript:">
            <span>Tana <i class=" fa fa-arrow-right"></i></span>
            <span>Majunga</span>
            <i class=" fa fa-chevron-right arr-trjt"></i>
          </a>
        </div>
      </div>
  </div>

  </div>
</section>

<section class="profil">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing listing-text no-wrap">
        
        <div class="three-column img-logo">
          <img src="/assets/images/malagasycar-logo.png">
        </div>
        <div class="three-column">
          <figcaption class="card-caption">
            <p class="histo-title">Le covoiturage selon MalagasyCar</p>
            <p class="histo-text">
              Notre objectif est de permettre a n'importe qui d'avoir le moyen de voyager facilement a Madagascar en se donnant du plaisir. Que ce soit pour un trajet quotidien ou un trajet long inter regionale ou inter-province, tout le monde merite d'etre bien a l'aise durant un voyage. Cela n'est pas toujours dans l'obligation de payer cher ou d'avoir en disposition un vehicule mais en covoiturant. Notre vision est de disposer dans un futur proches une communaute de covoiturage fiable et digne de confiance a Madagascar. 
            </p>
          </figcaption>
          <div class="load-more mt-lg-5 mt-md-3  text-center">
            <a href="{{route('covoiturage')}}" class="btn btn-primary">{!!i18n('acceuil.savoir_plus')!!}</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="profil ct-sec">
  <div class="inner">
    <div class="page-container">
      
      <div class="listing listing-text no-wrap ct-emb-listing">
        <div class="three-column">
          <figcaption class="card-caption">
            <p class="histo-title">Votre securite est notre priorite</p>
            <p class="histo-text">
              Chez MalagasyCar, nous nous sommes fixé comme objectif de construire une communauté de covoiturage fiable et digne de confiance à Madagascar.
              Rendez-vous sur notre page Confiance et sécurité pour explorer les différentes fonctionnalités disponibles pour covoiturer sereinement.
            </p>
          </figcaption>
          <div class="load-more mt-lg-5 mt-md-3  text-center">
            <a href="{{route('securite')}}" class="btn btn-primary">{!!i18n('acceuil.savoir_plus')!!}</a>
          </div>
        </div>

        <div class="three-column">
          <div class="common-card img-histo">
            <figure class="common-card-figure">
              <img src="/assets/images/securite.jpg">
            </figure>
          </div>
        </div>
        
      </div>
  </div>

  </div>
</section>

@endsection



