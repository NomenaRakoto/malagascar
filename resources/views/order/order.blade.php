@extends('layouts.app')

@section('content') 
<section class="profil page-body-content">
  <div class="inner">
    <div class="page-container">
      
      <div class="no-wrap register-container commande-container">
        <div class="section-heading devis">
          <h2>
            {!!i18n('order.votre_commande')!!} ({{$devis->ref}})
          </h2>
        </div>

        <div class="three-column">
         <form id="form-order" class="" novalidate method="POST" action="{{route('order.process')}}">
          {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$devis->id}}">
            <div class="order-infos-produit">
                  <div class="btn-ct cmd-title-info">
               
                  <span class="cmd-price"> {!!i18n('order.liste_produits')!!}</span>
                
                  </div>
                  @foreach($devis->products as $key => $product)
                  <div class="row devis-product @if($key==0) first @endif">
                    <div class="devis-btn-content">
                      <a href="{{url_product($product->product)}}" class="voir_message tip tooltipmenu">
                        <span class="message"><i class="fa fa-eye"></i></span>
                        <span class="tooltiptext">{!!i18n('order.detail')!!}</span>
                      </a>
                    </div>
                    <input type="hidden" name="products[]" value="{{$product->id}}">
                    <div class="product-image col-3">
                       <div class="img-product devis">
                          <a class="devis-detail-product" href="javascript:">
                            @if(count($product->product->images)>0)
                            <img src="/assets/images/products/{{$product->product->images[0]->filename}}" alt="{{i18n_product($product, 'nom')}}" />
                            @endif
                          </a>
                       </div>
                    </div>

                    <div class="product-infos devis col-9">
                       <p class="title-p font-comic"><span class="basket-ref">{{$product->product->ref}}</span> - <span id="basket-nom">{{i18n_product($product->product, 'nom')}}</span></p>
                       <p id="devis-subtitle" class="detail-p"></p>
                       <div class="">
                         <input class="ipt-qte-p ipt-qte ipt-qte-o"   disabled=''  type="text" min="1" name="quantite[]" value="{{$product->quantite}} {{$product->unite->abr}}">
                       </div>

                       <div class="qte-det">
                         <span class="pu">{!!i18n('order_detail.pu')!!} {{format_money($product->unit_price)}} {{$devis->response->price_unit->symbol}}</span>
                       </div>
                    </div>
                  </div>
                  @endforeach
                  <div class="row devis-product div-montant">
                  @if($devis->statut == 3)
                    
                      <span class="cmd-price">{!!i18n('order.total')!!} {{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
                    
                  @endif
                  </div>
                  
                  <div class="load-more mt-lg-5 mt-md-3 center">
                    
                    <button class="btn btn-login btn-cmd btn-page" next="order-infos-client">
                       {!!i18n('order.suivant')!!} <i class="fa fa-caret-right"></i>
                    </button>
                  </div>
            </div>
            
            <div class="order-infos-client">
                <div class="btn-ct cmd-title-info">
              
                  <span class="cmd-price">{!!i18n('order.verifier_informations')!!}</span>
                
                </div>

                <div class="row devis-product perso-info first">
                      <div class="ipt-rgstr">
                        <label>{!!i18n('order.nom')!!}</label>
                        <input type="text" required="" name="name" class="ipt" placeholder="Nom" @if($errors->any())  value="{{old('name')}}" @else value="{{$devis->user->name}}" @endif/>
                        @error('name')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                       <div class="ipt-rgstr">
                        <label>{!!i18n('order.prenom')!!}</label>
                        <input type="text" required="" name="prenom" class="ipt" placeholder="Prénom" @if($errors->any())  value="{{old('prenom')}}" @else value="{{$devis->user->prenom}}" @endif/>
                        @error('prenom')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="ipt-rgstr">
                        <label>{!!i18n('order.email')!!}</label>
                        <input type="email" required="" name="email" class="ipt" placeholder="Adresse Email" @if($errors->any())  value="{{old('email')}}" @else value="{{$devis->user->email}}" @endif />
                        @error('email')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                       <div class="ipt-rgstr">
                        <label>{!!i18n('order.adresse')!!}</label>
                        <input type="text" required="" name="adresse" class="ipt" placeholder="Adresse" @if($errors->any())  value="{{old('name')}}" @else value="{{$devis->user->adresse}}" @endif/>
                        @error('adresse')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="ipt-rgstr">
                        <label>{!!i18n('order.ville')!!}</label>
                        <input type="text" required="" name="ville" class="ipt" placeholder="Ville" @if($errors->any())  value="{{old('ville')}}" @else value="{{$devis->user->ville}}" @endif />
                        @error('ville')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="ipt-rgstr">
                        <label>{!!i18n('order.pays')!!}</label>
                        <input type="text" id='country_selector' required="" name="pays" class="ipt"placeholder="Pays" @if($errors->any())  value="{{old('pays')}}" @else value="{{$devis->user->pays}}" @endif />
                        @error('pays')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                      <div class="ipt-rgstr">
                        <label>{!!i18n('order.telephone')!!}</label>
                        <input type="text" id="phone" type="tel" required="" name="telephone" class="ipt"  @if($errors->any())  value="{{old('telephone')}}" @else value="{{$devis->user->full_number}}" @endif />
                        @error('telephone')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                </div>

                <div class="row devis-product div-montant">
                @if($devis->statut == 3)
                  
                    <span class="cmd-price">{!!i18n('order.total')!!} {{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
                  
                @endif
                </div>
                
                <div class="load-more mt-lg-5 mt-md-3 center">
                  <button class="btn btn-login btn-cmd  btn-page" next="order-infos-produit">
                     <i class="fa fa-caret-left"></i> {!!i18n('order.precedent')!!} 
                  </button>

                  <button class="btn btn-login btn-cmd btn-page" next="order-payment">
                     {!!i18n('order.order')!!} <i class="fa fa-caret-right"></i>
                  </button>
                </div>
            </div>

            <div class="order-payment hidden">
                  <div class="btn-ct cmd-title-info">
                    <span class="cmd-price"> Choisissez votre mode de paiement (Paypal / Credit Card)</span>
                  </div>

                  <div class="row devis-product div-montant">
                @if($devis->statut == 3)
                  
                    <span class="cmd-price">{!!i18n('order.total')!!} {{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
                  
                @endif
                </div>
                  <div class="payment">
                      <a id="btn-paypal" class="btn-payment" href="javascript:">
                        <span>
                            <i class="fa fa-paypal"></i>
                        </span>
                      </a>

                      <a class="btn-payment btn-page" next="order-card-info" href="javascript:">
                        <span>
                            <i class="fa fa-credit-card"></i>
                        </span>
                      </a>
                  </div>

                  <div class="load-more mt-lg-5 mt-md-3 center">
                    <button class="btn btn-login btn-cmd  btn-page" next="order-infos-client">
                       <i class="fa fa-caret-left"></i> {!!i18n('order.precedent')!!} 
                    </button>
                  </div>
                  
            </div>

            <div class="order-card-info hidden">
                <div class="btn-ct cmd-title-info">
              
                  <span class="cmd-price"><i class="fa fa-credit-card"></i> Carte bancaire</span>
                
                </div>

                <div class="row devis-product perso-info first">
                      <div class="ipt-rgstr">
                        <label>Numero de la carte</label>
                        <input type="number" required="" name="number" class="ipt" placeholder="Numero de la carte" @if($errors->any())  value="{{old('card_number')}}" @endif/>
                        @error('card_number')
                        <p class="error">{{$message}}</p>
                        @enderror
                      </div>
                      
                      <div class="ipt-rgstr">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date d'expiration</label>
                                <input type="text" required="" name="expiry" class="ipt" placeholder="MM/DD" @if($errors->any())  value="{{old('expiry_date')}}" @endif/>
                                @error('expiry_date')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label>Crypto. Visuel</label>
                                <input type="text" required="" name="security_code" class="ipt" placeholder="Cryptogramme Visuel" @if($errors->any())  value="{{old('crypto')}}" @endif/>
                                @error('expiry_date')
                                <p class="error">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                       
                      </div>

                      <div class="ipt-rgstr">
                          <label>{!!i18n('order.nom')!!}</label>
                          <input type="text" required="" name="card_nom" class="ipt" placeholder="Nom" @if($errors->any())  value="{{old('name')}}" @else value="{{$devis->user->name}} {{$devis->user->prenom}}" @endif/>
                          @error('name') 
                          <p class="error">{{$message}}</p>
                          @enderror
                      </div>
                </div>

                <div class="row devis-product div-montant">
                @if($devis->statut == 3)
                  
                    <span class="cmd-price">{!!i18n('order.total')!!} {{format_money($devis->response->price)}} {{$devis->response->price_unit->symbol}}</span>
                  
                @endif
                </div>
                
                <div class="load-more mt-lg-5 mt-md-3 center">
                  <button class="btn btn-login btn-cmd  btn-page" next="order-payment">
                     <i class="fa fa-caret-left"></i> {!!i18n('order.precedent')!!} 
                  </button>

                  <button class="btn btn-login btn-cmd btn-card-payment" next="order-payment">
                     Payer <i class="fa fa-credit-card"></i>
                  </button>
                </div>
            </div>
          </form> 
        </div>
      </div>
    </div>
  </div>
</section>
@push('scripts')
<script type="text/javascript">
   $(document).ready(function(){
      $('#btn-paypal').on('click', function(e){
        $('#form-order').submit();
      });

      $('#btn-card-payment').on('click', function(e){
        $('#form-order').submit();
      });

      $('.btn-page').on('click', function(e){
        e.preventDefault();
        $(this).parent().parent().hide();
        $('.' + $(this).attr('next')).show();
      });
   });
</script>
@endpush
@endsection
