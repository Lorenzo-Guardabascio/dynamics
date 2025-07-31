<?php
function modal_call(){
    if (!is_user_logged_in()){
    echo '<div id="navbarNavDropdown-search" class="navbar-collapse nav-left-bar">';
    echo get_custom_search_form();
    echo '<a fref="#" class="login_redirect" data-toggle="modal" data-target="#account"> Accedi <span class="dyn-freccia"></span></a>';
    echo '</div>';
}elseif(is_user_logged_in()){
    echo '<div id="navbarNavDropdown-search" class="navbar-collapse nav-left-bar">';
    echo get_custom_search_form();
    echo '<a class="login_redirect" href="'. get_option('wisho_op_theme_link_account').'?id_section=account"> Il mio profilo <i class="fa fa-user-o" aria-hidden="true"></i> </a>';
    echo '<a class="login_redirect" href="'. wp_logout_url( home_url()) .'"> Logout <span class="dyn-freccia"></span></a>';
    echo '</div>';
}
}
function modal_cont(){
echo'<div class="modal fade" id="account" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
echo'  <div class="modal-dialog modal-dialog-centered" role="document">';
echo'    <div class="modal-content">';
echo'      <div class="modal-header">';
echo'        <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo'          <span aria-hidden="true">&times;</span>';
echo'        </button>';
echo'      </div>';
echo'      <div  class="modal-body">';
     wp_login_form();
    echo '<div id="loginform">';
	echo  '<a style="width: 100%; display: block;" data-toggle="modal" data-target="#avviso">Registrati</a>';
	echo  '<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=link" > Non hai ricevuto il link di attivazione? </a>';
	echo  '<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=username" > Username dimenticato </a>';
    echo  '<a style="width: 100%; display: block;" href="'. get_option('wisho_op_theme_link_account').'?id_section=password" > Password dimenticata </a>';
    echo  '</div>';
echo'      </div>';
echo'      <div class="modal-footer">';
echo'        <button type="button" class="btn btn-primary m-3" data-dismiss="modal">Chiudi</button>';
echo'      </div>';
echo'    </div>';
echo'  </div>';
echo'</div>';
}


function modal_reg(){
echo'<div class="modal fade" id="avviso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">';
echo'  <div class="modal-dialog modal-dialog-centered" role="document">';
echo'    <div class="modal-content">';
echo'      <div class="modal-header">';
echo'        <button type="button" class="close" data-dismiss="modal" aria-label="Close">';
echo'          <span aria-hidden="true">&times;</span>';
echo'        </button>';
echo'      </div>';
echo'      <div class="modal-body">';
echo'      I contenuti esposti nelle aree con accesso riservato sono destinati solo agli operatori sanitari. Si raccomanda quindi di proseguire nella registrazione solo ed esclusivamente se si appartiene a questa categoria.';
echo'      </div>';
echo'      <div class="modal-footer justify-content-center flex-column">';
echo'        <a type="button" class="btn btn-primary m-3" href="'. get_option('wisho_op_theme_link_account').'?id_section=account">Proseguo con la registrazione</a>';
echo'        <button type="button" class="btn btn-primary m-3" data-dismiss="modal">Annulla</button>';
echo'      </div>';
echo'    </div>';
echo'  </div>';
echo'</div>';
}
?>
<?php 
