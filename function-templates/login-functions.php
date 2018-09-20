<?php
function no_wordpress_errors(){
  return 'Incorrect details entered';
}
add_filter( 'login_errors', 'no_wordpress_errors' );
//change login logo and link to homepage
function my_login_logo() { ?>
    <style type="text/css">

        body.login {
        background: #86475a;
        padding-bottom: 50px;
        }

        #login h1 a, .login h1 a {
        height: 250px;
        width: 250px;
        background-size: auto;
        background-position: center center;
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/admin-logo-final.jpg);
        }

        #nav, #backtoblog{
        display:none;
        background: #45aff3;
        }

        body.login form {
        -webkit-box-shadow: rgba(200, 200, 200, 0.7) 0 4px 200px -1px;
        -moz-box-shadow: rgba(200, 200, 200, 0.7) 0 4px 200px -1px;
        box-shadow: rgba(200, 200, 200, 0.7) 0 4px 200px -1px;
        }
    </style>
    <?php }
    add_action( 'login_enqueue_scripts', 'my_login_logo' );


//change login logo link
/*Change the logo url*/
  function custom_login_url() {
  return site_url();
  //If you wish to redirect to another site, here is an alternative:
  //return 'http://my.site.com'
  }
  add_filter('login_headerurl', 'custom_login_url');


/*Change the "Powered by WordPress!" title*/
  function custom_login_title(){
      return get_bloginfo('name');
  }
  add_filter('login_headertitle','custom_login_title');


 ?>
