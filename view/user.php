<div class="container user__block">
	<h2>Редактирование профиля</h1>
	<div class="user__block-main">
		<div id="message"></div>	
		<div>Ваш логин: <strong><?=$userData['data']['username']?></strong></div>
		 <form action="javascript:void(0)" method="post" id="ajax-update">
		 	<input type="hidden" name="id" id="id" class="form-control" value="<?=$userData['id']?>" maxlength="55550" >
			<div class="row">
				<div class="col-lg-6">
					<label style="font-weight:600;">ФИО</label>
					 <input type="text" name="fio" id="phone" class="form-control" value="<?=$userData['data']['fio']?>" maxlength="50" >

					 <label  style="font-weight:600;">E-mail</label>
                     <input type="text" name="email" id="email" class="form-control" value="<?=$userData['data']['email']?>" maxlength="50" >
                     
				</div>
				<div class="col-lg-6">
					<label style="font-weight:600;">Старый пароль</label>
                      <input type="password" name="password1" id="password1" class="form-control" value="" maxlength="50" >

                      <label style="font-weight:600;">Новый пароль</label>
                       <input type="text" name="password2" id="password2" class="form-control" value="" maxlength="50" >
				</div>
				<input type="submit" class="btn btn-primary" name="Сохранить" value="Сохранить" style="margin-top: 18px; margin-left: 15px;box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(156, 39, 176, 0.4);">
			</div>

		</form>
	</div>
</div>

<script type="text/javascript">
 $(document).ready(function($){

    // hide messages 
    $("#error").hide();
    $("#show_message").hide();
 
    // on submit...
    $('form').submit(function(e){
		
        e.preventDefault();
 
 
        $("#error").hide();
		var fio = $(this.fio).val();
        if(fio == ""){
          toastr.warning('Введите ФИО');
            return false;
        } 		       
        		var email = $(this.email).val();
        if(email == ""){
          toastr.warning('Введите email');
            return false;
        } 	
        // ajax
        $.ajax({
            type:"POST",
            url: "/ajax/form-ajax-profile.php",
			
            data: $(this).serialize(), // get all form field value in serialize form
            success: function(data){
				 var response = jQuery.parseJSON(data);
				 $('#message').fadeIn();
				 $('#message').html(response);
				 $('#message').fadeOut(3000);
				 toastr.options = {
timeOut : 0,
extendedTimeOut : 100,
tapToDismiss : true,
debug : false,
fadeOut: 10,
positionClass : "toast-top-center"
};
				toastr.warning(response);
				console.log(response);
              
              //$("#ajax-form").fadeOut();
            }
        });
    });  
 
   
    });

    </script>

    