<div class="infs-perso dv-pg-perso hide">
  <div class="ct-dtl">
    <div class="infs-bs-prfl inline-block">
      <div class="name frm-ttl"><i class="fa fa-user"></i>  Informations Personnelles</div>
    </div>  

  </div>
  <div class="line-sprt"></div>
  <div class="ipt-rgstr">
    <input required="" type="text" name="name" class="ipt" placeholder="{!!i18n('creation-compte.nom')!!}*"/>
    
  </div>

  <div class="ipt-rgstr">
    <input required="" type="text" name="prenom" class="ipt" placeholder="{!!i18n('creation-compte.prenom')!!}"/>
  </div>

  <div class="ipt-rgstr">
    <div class="hlf flt-lft">
      <input required="" type="text" name="age" class="ipt" placeholder="Age*" />
      
    </div>

    <div class="hlf flt-rhgt">
      <select name="sex" class="slct-frm">
        <option value="0">Femme</option>
        <option value="1">Homme</option>
      </select>
    </div>
    
  </div>

  <div class="ipt-rgstr">
    <input required="" type="text" name="adresse" class="ipt" placeholder="{!!i18n('creation-compte.adresse')!!}*"/>
    
  </div>

  <div class="ipt-rgstr">
    <input type="text" required="" name="ville" class="ipt" placeholder="{!!i18n('creation-compte.ville')!!}*"/>
  </div>

  <div class="load-more mt-lg-5 mt-md-3 text-center frm-btn-ct">
    <a href="javascript:" step='ignore' next="cnx" class="btn btn-primary btn-frm-pag">Précédente</a>
    <a href="javascript:" step='2' next="contact" class="btn btn-primary btn-frm-pag">Suivante</a>
  </div>
</div>