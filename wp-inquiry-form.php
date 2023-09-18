<?php
		/*
		Plugin Name:WP Inquiry Form
		Plugin URI: http://www.vivacityinfotech.com
		Description: Simple WP Inquiry form for your blog posts or pages.
		Author: vivacityinfotech		
		Authero URI: http://vivacityinfotech.com
		Version: 1.0
		Requires at least: 3.8 or later
		
		*/
	/*  
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.*/
   	
	?>
<?php

//menu show in dashborad
function init_admin_actions() {
			add_menu_page("wp-main_form", "WP Inquiry form", 1, "wp-main_form", "admin_form_settings" );
		}

add_action('admin_menu', 'init_admin_actions');
  
  // settings update function
  function admin_form_settings () {
  ?>	
  <div id="wrapper">  
    <?php    echo "<h1>" .  'WP Inquiry Form Settings' . "</h1>"; ?>  
    <?php
 
      if($_POST['hidden_value'] == 'Y') {  
        //Form data sent  
        if( $_POST['req_heading']){
       
        update_option('req_heading', $_POST['req_heading']);

        }else{
         update_option('req_heading','Request Form for this Post');     
        }
        
         if( $_POST['req_lable_name']){
         
        update_option('req_lable_name', $_POST['req_lable_name']);  
        
        }else{
         update_option('req_lable_name','Post Name');     
        } 
  
        if( $_POST['req_Email_name']){
        update_option('req_Email_name', $_POST['req_Email_name']);  
        
        }else{
         update_option('req_Email_name','Your Email');     
        } 
  
       if( $_POST['req_name']){
        update_option('req_name', $_POST['req_name']);  
        
        }else{
         update_option('req_name','Your Name');     
        } 
  
        if( $_POST['req_message_name']){
        update_option('req_message_name', $_POST['req_message_name']);  
        
        }else{
         update_option('req_message_name','Request Message');     
        } 
        
         if( $_POST['to_email']){
        update_option('to_email', $_POST['to_email']);  
        
        }else{
         update_option('to_email',get_settings('admin_email'));     
        } 
        
          if( $_POST['suceess_message']){
        update_option('suceess_message', $_POST['suceess_message']);  
        
        }else{
         update_option('suceess_message','Thank you for your Request. We will contact you shortly to answer your questions.');     
        } 
        
        if( $_POST['captcha_error']){
        update_option('captcha_error', $_POST['captcha_error']);  
        
        }else{
         update_option('captcha_error','Error: please fill the correct value.');     
        } 
         if( $_POST['email_error']){
        update_option('email_error', $_POST['email_error']);  
        
        }else{
         update_option('email_error','Error: please enter a valid email address.');     
        } 
        
         if( $_POST['name_error']){
        update_option('name_error', $_POST['name_error']);  
        
        }else{
         update_option('name_error','Error: please enter your name.');     
        } 
        
         if( $_POST['stylesheet_request']){
        update_option('stylesheet_request', $_POST['stylesheet_request']);  
        
        }else{
         update_option('stylesheet_request','
div#main_form{ /*inquiry form wrapper div*/
padding:10px;
}
div#main_form label {
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 10px;
}
div#main_form input.form_text {
    display: block;
    height: 35px;
    margin: 0 10px 10px;
    width: 400px;
background:white;
}
div#main_form textarea { 
    height: 140px;
    margin-left: 10px;
    width: 400px;
background:white;
}
div#main_form input.submit_button {
    display: block;
    height: 50px;
    margin: 10px;
    width: 200px;
}

div#main_form span.req { 
    color: #268da3;
    font-size: 20px;
}

.form_label{display: inline-block; width: 60px;}');     
        } 

        ?>
        
        <?php }?>
 <!-- Plug in Settings form -->
 
    <form name="my_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"> 
          
       <?php    echo "<strong>" .  'Email To Settings' . "</strong>"; ?>  
        <p><input type="text" name="to_email" value="<?php if(get_option('to_email')){ echo get_option('to_email'); }else{ echo get_settings('admin_email');}?>" /></p>    
         
         <legend>
         <?php    echo "<strong>" . 'Form Feilds'. "</strong>"; ?>
           
              
        
         <p><span class="form_label">Subject:</span> &nbsp;<input type="text" name="req_lable_name" value="<?php if(get_option('req_lable_name')){ echo get_option('req_lable_name'); }else{ echo 'Your Subject';}?>"/></p>  
        <p><span class="form_label">Email:</span> &nbsp;<input type="text" name="req_Email_name" value="<?php if(get_option('req_Email_name')){ echo get_option('req_Email_name'); }else{ echo 'Your Email';}?>"/></p>  
        <p><span class="form_label">Name:</span> &nbsp;<input type="text" name="req_name" value="<?php if(get_option('req_name')){ echo get_option('req_name'); }else{ echo 'Your Name';}?>"/> </p>  
        <p><span class="form_label">Message:</span> &nbsp;<input type="text" name="req_message_name" value="<?php if(get_option('req_message_name')){ echo get_option('req_message_name'); }else{ echo 'Your Inquiry Message';}?>" /></p>  
     </legend>  
        
         
         
        <?php    echo "<strong>" . 'Error Messages Settings' . "</strong>"; ?>  
        <p><span class="form_label">Form Successful Message:</span> <input type="text" name="suceess_message" value="<?php if(get_option('suceess_message')){ echo get_option('suceess_message'); }else{ echo 'Thank you for your Inquiry. We will contact you shortly to answer your questions.';}?>"/></p>  
         <p><span class="form_label">Captcha Error:</span> <input type="text" name="captcha_error" value="<?php if(get_option('captcha_error')){ echo get_option('captcha_error'); }else{ echo 'Error: please fill the correct value.';}?>"/></p>
         <p><span class="form_label">Error Email Message:</span> <input type="text" name="email_error" value="<?php if(get_option('email_error')){ echo get_option('email_error'); }else{ echo 'Error: please enter a valid email address.';}?>"/></p>
         <p><span class="form_label">Error Name Message:</span> <input type="text" name="name_error" value="<?php if(get_option('name_error')){ echo get_option('name_error'); }else{ echo 'Error: please enter your name.';}?>"/></p>
        
         <input type="hidden" name="hidden_value" value="Y"> 
         <p class="submit">  
        <input type="submit" name="Submit" value="Update Option" />  
        </p> 
        
         
    </form>      
</div> 
 <?php 	
  	
  	}              
   //script included             
 function include_script() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    wp_enqueue_script( 'jquery' );
   
} 
//style included    
 function style_css() {
 	
 	 wp_enqueue_style( 'main_css',plugins_url( 'css/stylesheet.css' , __FILE__ ) );
 	
 	}
add_action('wp_enqueue_scripts', 'include_script');    
add_action('wp_enqueue_scripts', 'style_css');  
add_action('admin_enqueue_scripts', 'style_css');         
                
 function get_requestform() {
$link_request = get_permalink();

$title=get_the_title();

if(get_option('req_lable_name')){
$post_name=get_option('req_lable_name');
}else{
   $post_name="Post Name";
}

if(get_option('req_Email_name')){
    $email_tag=get_option('req_Email_name');
}else{
    $email_tag='Your Email';
}

if(get_option('req_name')){
    $name_tag=get_option('req_name');
}else{
    $name_tag='Your Name';
}
if(get_option('req_message_name')){
    $request_message=get_option('req_message_name');
}else{
    $request_message='Inquiry Message';
}

if(get_option('suceess_message')){
    $suceess_message=get_option('suceess_message');
}else{
    $suceess_message='Thank you for your Inquiry. We will contact you shortly to answer your questions.';
}

if(get_option('stylesheet_request')){
    $style_css=get_option('stylesheet_request');
}else{
    $style_css='div#main_form{
padding:10px;

}
div#main_form label {
    display: block;
    font-size: 13px;
    font-weight: bold;
    margin: 5px 10px;
}
div#main_form input.form_text {
    display: block;
    height: 35px;
    margin: 0 10px 10px;
    width: 400px;
background:white;
}
div#main_form textarea {
    height: 140px;
    margin-left: 10px;
    width: 400px;
background:white;
}
div#main_form input.submit_button {
    display: block;
    height: 50px;
    margin: 10px;
    width: 200px;
}

div#main_form span.req {
    color: #268da3;
    font-size: 20px;
}';
}


if($_GET['suc']==1){
    if(get_option('suceess_message')){ $req_message_success= '<p style="color: green; font-weight:bold">'.get_option('suceess_message').'</p>'; }else{ $req_message_success= $suceess_message;};
  
}
else{
    $req_message_success='';
}

$rand_no_1=$_SESSION['no1'];
$rand_no_2=$_SESSION['no2'];
$oparator_no=$_SESSION['operator_no'];
$operator=$_SESSION['operator'];

if($rand_no_2>$rand_no_1){
    $temp=$rand_no_1;
    $rand_no_1=$rand_no_2;
    $rand_no_2=$temp;
}
 $cap_val=str_pad($rand_no_1,2,'0',STR_PAD_LEFT).str_pad($rand_no_2,2,'0',STR_PAD_LEFT).$oparator_no;

$form = <<<EOT

<style type="text/css">
 {$style_css}

</style>

<div id="main_form"><h3>{$header}</h3>
<div id="send-msg"></div>

	{$req_message_success}
     
   <form name="my_form"  action="" method="post" enctype="multipart/form-data" style="text-align: left">
   <p><label for="post name">{$post_name}</label><input type="text" name="product" id="product" value="{$title}" size="22" class="form_text" readonly /> </p>
   <p><label for="name">{$name_tag}<span class="req">*</span></label><input type="text" name="name" id="name" value="" size="22" class="form_text" /> </p>
   <p><label for="email">{$email_tag}<span class="req">*</span></label><input type="text" name="email" id="email" value="" size="22" class="form_text" /> </p>
   <input type="hidden" name="val" id="val" value="{$cap_val}" />
   <p><label for="message">{$request_message}</label><textarea name="message" id="message" cols="100%" rows="10">type your message here...</textarea></p>

   <p>Fill the Correct value<span class="req">*</span></p>
   <p>{$rand_no_1}{$operator}{$rand_no_2}= <input type="text" name="cap" id="cap" size="4" />
   
   <p><input name="send" type="submit" id="send" value="Request" onclick="return validationform()" class="submit_button"/></p>
   
   <input type="hidden" name="my_form_submitted" value="1">
   
   </form>
   
</div>

EOT;

return $form;

}
//shortcode for form
add_shortcode('request_message', 'get_requestform');


function request_procced() {

session_start();


if(get_option('to_email')){
    $email_to=get_option('to_email');
}else{
    $email_to=get_settings('admin_email');
}

if(get_option('captcha_error')){
    $cap_error=get_option('captcha_error');
}else{
    $cap_error='Error: please fill the correct value.';
}
if(get_option('email_error')){
    $email_error=get_option('email_error');
}else{
    $email_error='Error: please enter a valid email address.';
}
if(get_option('name_error')){
    $name_err=get_option('name_error');
}else{
    $name_err='Error: please enter your name.';
}



$_SESSION['no1']=rand(0, 10);
$_SESSION['no2']=rand(0, 10);
$_SESSION['operator_no']=time()%3;
$_SESSION['operator']=set_captcha($_SESSION['operator_no']);

if ( isset($_POST['my_form_submitted']) ) {
 $product=( isset($_POST['product']) )  ? trim(strip_tags($_POST['product'])) : null;
 $name  = ( isset($_POST['name']) )  ? trim(strip_tags($_POST['name'])) : null;
 $email   = ( isset($_POST['email']) )   ? trim(strip_tags($_POST['email'])) : null;
 
 $message = ( isset($_POST['message']) ) ? trim(strip_tags($_POST['message'])) : null;
 $cap = ( isset($_POST['cap']) ) ? (int)trim(strip_tags($_POST['cap'])) : null;

 $val=(string)$_POST['val'];
 $result=(int)create_captcha($val);
 

 if ( $name == '' ) wp_die($name_err);
 if ( !is_email($email) ) wp_die($email_error);
 
 if ( ($cap != $result) ) wp_die($cap_error);
 
$to=$email_to;
$from=$email;
$subject="A Request Received ";


$body='<p> <strong>Subject Name</strong> :'.$product.'</p>
       <p> <strong>Name</strong> :'.$name.'</p>
       <p> Email</strong> :'.$email.'</p>
       <p> <strong>Message</strong> :'.$message.'</p>';



if ( !email_send($body,$from,$to,$subject) ) wp_die('email not sent');

$_SESSION['my_form_success'] = 1;

 
 header('Location: ' . $_SERVER['HTTP_REFERER'].'?suc=1');
 exit();

} 
else{
    get_requestform();
}
}

add_action('init', 'request_procced');

function request_script() { ?>

<script type="text/javascript">

 function validateMail(email) {

   var regExpEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   
   return(regExpEmail.test(email));
}

function validationform(){
	var err1,err2;
    var email=document.my_form.email.value;
    var name=document.my_form.name.value;
    var loadDiv=document.getElementById('send-msg');


    if ((name.length==0) || (name==null)) {
		$('div#main_form input#name').css('background','orange');
		 err1=1;
	 }else{
             err1=0;
             $('div#main_form input#name').css('background','white');
         }


	if(!validateMail(email)){
		$('div#main_form input#email').css('background','orange');
	          err2=1;
       }
           else{ err2=0;
           $('div#main_form input#email').css('background','white');
       }




	 if((err1==0) && (err2==0)){
         return true;

         }
         else{

             return false;

         }
}
</script>

<?php }

add_action('wp_head', 'request_script');
// email send function

function email_send($HTML,$from,$to,$subject) {
$headers = "From: $from\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$boundary = uniqid("HTMLEMAIL");
$headers .= "Content-Type: multipart/alternative;".
                "boundary = $boundary\r\n\r\n";
$headers .= "This is a MIME encoded message.\r\n\r\n";
$headers .= "--$boundary\r\n".
                "Content-Type: text/plain; charset=ISO-8859-1\r\n".
                "Content-Transfer-Encoding: base64\r\n\r\n";
$headers .= chunk_split(base64_encode(strip_tags($HTML)));
$headers .= "--$boundary\r\n".
                "Content-Type: text/html; charset=ISO-8859-1\r\n".
                "Content-Transfer-Encoding: base64\r\n\r\n";
$headers .= chunk_split(base64_encode($HTML));
if( mail($to,$subject,"",$headers))
   return true;
   else
   return false;
}
// create captcha function
function create_captcha($cap_String){
		
     $rand1=(int)substr($cap_String,0,2);
     
     $rand2=(int)substr($cap_String,2,2);
     
    $op=(int)substr($cap_String,4,1);

    switch ($op)
{
case 0:
    $result=$rand1+$rand2;

  break;
case 1:
   $result=$rand1-$rand2;
  break;
case 2:
  $result=$rand2*$rand1;
  break;
}
return $result;

}

function set_captcha($op){

    switch ($op)
{
case 0:
   return '+';

  break;
case 1:
  return '-';
  break;
case 2:
 return 'x';
  break;


default:
return '+';
}
}              
