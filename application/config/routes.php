<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//==========================================//
//================ADMINISTACAO==============//
//=========================================//

$route['admin'] = 'admin/AdminController/index';
$route['entrar'] = 'admin/AdminController/form_login';
$route['logar'] = 'admin/AdminController/logar';
$route['sair'] = 'admin/AdminController/sair';
$route['login/recuperar'] = 'admin/AdminController/recuperar_senha_form';
$route['login/enviatoken'] = 'admin/AdminController/gerar_e_enviartoken';
$route['altera/password/(:any)'] = 'admin/AdminController/valida_token_alterar_password';
$route['novo/password'] = 'admin/AdminController/novo_password';
$route['form/lista/preferencias'] = 'admin/AdminController/form_lista_preferencias';
$route['admin/editaperfil/:num'] = 'admin/UsuariosController/form_edita_perfil';
$route['admin/usuario/alteraimagem'] = 'admin/UsuariosController/form_edita_imagem';
$route['admin/usuario/atualizaperfil'] = 'admin/UsuariosController/atualiza_perfil';
//==========================================//
//================AJAX==============//
//=========================================//

$route['api/lista/posts'] = 'admin/PostController/lista_posts';
$route['api/lista/chamadas'] = 'admin/ChamadasController/lista_chamadas';
$route['api/lista/usuarios'] = 'admin/UsuariosController/lista_usuarios';
$route['api/lista/subcategorias'] = 'admin/SubcategoriasController/lista_subcategorias';
$route['api/lista/qtd_posts_por_subcategoria'] = 'admin/SubcategoriasController/qtd_posts_por_subcategoria';

$route['api/lista/preferencias'] = 'admin/AdminController/lista_preferencias';


//==========================================//
//================MIGRATIONS==============//
//=========================================//
$route['migrate'] = 'Migrate/index';
$route['migolds'] = 'Migrate/migolds';



