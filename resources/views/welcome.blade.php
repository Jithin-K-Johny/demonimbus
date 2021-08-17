<!-- @extends('admin::layouts.master') -->
<!-- @section('content') -->
<style>
 .error{
   color: red;
   font-size: 12px; 
 }
</style>
<section class="inner_section">
  <div class="bg_shapes">
    <div class="shape1">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 405.9 340.4">
        <path d="M0 0l186.2 319.1c9.3 15.9 29.7 21.4 45.7 12.2 0 0 109-62.3 174-99.4V0H0z" fill="#fbfcfd" />
      </svg>
    </div>
    <div class="shape2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 405.9 340.4">
        <path d="M405.9 0L219.7 319.1c-9.3 15.9-29.7 21.4-45.7 12.2 0 0-109-62.3-174-99.4V0h405.9z" fill="#fbfcfd" />
      </svg>
    </div>
  </div>
  <div class="main_content">
    <div class="container">

      <div class="questionnaire">

        <!-- Register -->
        <form method="post" id="register" name="register"> 
           @csrf
           <div class="quiz_container_sm">
          <div class="quiz_head">
            <div class="quiz_body">
              <h2>Change your Password</h2>
              <p>
                Please fill in the form to continue.
              </p>
            </div>
          </div>

          <div style="display:none" id="error" class="alert alert-danger" role="alert"> </div>
          <div style="display:none" id="success" class="alert alert-success"></div>
          <div class="form_sec">
            <div class="form_group">
                <div class="formElement">
                  <input id="old_password" name="old_password" type="password" />
                  <label class="element_label" for="old_password">Old Password</label>
                </div>
              </div>
         
            <div class="form_group">
              <div class="formElement">
                <input id="password" name="password" type="password" />
                <label class="element_label" for="password">Create New Password</label>
              </div>
            </div>
            <div class="form_group">
              <div class="formElement">
                <input id="password_confirmation" name="password_confirmation" type="password" />
                <label class="element_label" for="password_confirmation">Confirm New Password</label>
              </div>
            </div>


            <div class="list_points">
              <label class="points">
                <span class="dot_sec">
                  <span class="dot"></span>
                </span>
                <span class="txt">Password must be at least 8 characters long</span>
              </label>
              <label class="points">
                <span class="dot_sec">
                  <span class="dot"></span>
                </span>
                <span class="txt">Include at least one uppercase letter or number or symbol</span>
              </label>
            </div>


         
           

            <div class="btn_block">
              <button class="btn_submit">
                <span class=" loadingspinner" style="display: none;"></span>
                <span>Change Password</span>
              </button>
              <label>Don't wanna change ? <a href="{{url('dashboard')}}" class="">Go back</a></label>
            </div>
          </div>
          </div>
        </form>
        <!--//END. REGISTER -->

      </div>
    </div>
  </div>
</section>
        
@endsection

@push('scripts')
<script>
  
  jQuery.validator.addMethod("noSpace", function(value, element) { 
              return value.indexOf(" ") < 0 && value != ""; 
            }, "No space please and don't leave it empty.");
  jQuery.validator.addMethod("password_checker", function(value, element) {
    return this.optional(element) || /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])[a-zA-Z0-9!@#$%&*]+$/i.test(value);
    }, "Password should include at least one uppercase letter or number or symbol.");          
    $("#register").validate({
      ignore: [':not(checkbox:hidden)'],
    rules: {
          'old_password': {
                          required: true,
                          minlength: 8,
                          maxlength: 32,
                          noSpace: true,
                          password_checker: true,
                          },
            'password': {
                          required: true,
                          minlength: 8,
                          maxlength: 32,
                          noSpace: true,
                          password_checker: true,
                          },
            'password_confirmation': {
                          required: true,
                          minlength: 8,
                          maxlength: 32,
                          noSpace: true,
                          password_checker: true,
                          equalTo:"#password",
                          },
           
    },
    messages: {
            
            'old_password': {
                          required: 'Please enter your old password.',
                          minlength: "Password must be at least 8 characters long.",
                          maxlength: "Password cannot be more than 32 characters.",
                        },
            'password': {
                          required: 'Please enter your new password.',
                          minlength: "Password must be at least 8 characters long.",
                          maxlength: "Password cannot be more than 32 characters.",
                        },
            'password_confirmation': {
                          required: 'Please confirm your new password',
                          minlength: "Password must be at least 8 characters long.",
                          maxlength: "Password cannot be more than 32 characters.",
                          equalTo : "Passwords should be same.",
                        },
            'condition': {required : 'Please accept our terms and conditions.'},
    },
    errorPlacement: function(error, element) {
      error.insertAfter(element.parent());
    },
    submitHandler: function(form, event) {
      $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
      $('.loadingspinner').show();
      $.ajax({
        method: 'post',
        data: $('#register').serialize(),
        url: "{{url('check-password')}}",
        success: function(response) {
          if(response.status === "error"){
                    $('#error').show();
                    $('.loadingspinner').hide();
                    $('#error').html(response.data);
                    setTimeout(function(){
                        $('#error').hide();
                    },5000);
          }else if(response.status === "success"){
                    $('#success').show();
                    $('.loadingspinner').hide();
                    $('#success').html(response.data);
                    setTimeout(function(){
                        location.href="{{url('dashboard')}}";
                    },1000);
                    
          }
        },
        error: function(err) {
          
          
        },
      });
    }
  });


  
  
</script>

@endpush