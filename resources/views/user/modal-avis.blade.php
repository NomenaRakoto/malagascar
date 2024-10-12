<div class="modal fade" id="mdl-avis" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <h5 class="basket-modal-title">
          
          Donnez votre avis <span id="question-ref"></span></span>
      </h5>
      <form id="avis-form" novalidate class="question-form" method="POST" action="{{route('user.avis.save')}}">
      {{ csrf_field() }}
        <input type="hidden" name="user_id" class="field" value="{{\Auth::id()}}">
        <input type="hidden" name="user_profil_id" class="field" value="{{$user->id}}">
        <div class="">
          <label class="lbl-thm">Note <i class="fa fa-star"></i> <span class="font-comic"> (1 - Tres Decevant à 5-Excellent)</label>
          <select name="note" class="slct-frm">
            <option value="5">Excellent</option>
            <option value="4">Bien</option>
            <option value="3">Correcte</option>
            <option value="2">Decevant</option>
            <option value="1">Tres Decevant</option>
          </select>
        </div>

        <div class="ipt-rgstr">
          <textarea name="messages" class="field" placeholder="Votre commentaire*"></textarea>
          
        </div>

        <div class="modal-footer">
          <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
            <a href="javascript:" id='btn-send-avis' class="btn btn-primary">Envoyer</a>
            <a href="javascript:"  onclick="$('#mdl-avis').modal('hide');" data-bs-dismiss="modal"class="btn btn-primary">Annuler</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
$('#btn-send-avis').on('click', function(){
  $('.ct-loading').show();
  $('.error').hide();
  var data = $('#avis-form').serialize();

  $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $('#avis-form').attr('action'),
        type : 'POST',
        data : data,
        success: function (result) {
          if(result) {
            $('#mdl-avis').modal('hide');
          } 
            //console.log(JSON.stringify(result));
          $('.ct-loading').hide();

        },
        error: function (xhr, status, error) {
          if(xhr.status == 422) {
            var errors = JSON.parse(xhr.responseText);
            var inputs = $('#avis-form').find('.field');
            
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