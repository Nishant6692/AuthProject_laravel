<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if (Session:: has('success'))
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '{{ Session::get('success') }}',
  });
  @endif

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>


    $(document).ready(function () {
        // Add keyup event for name input
        $('input[name="name"]').keyup(function () {
            validateName();
        });

        // Add keyup event for email input
        $('input[name="email"]').keyup(function () {
            validateEmail();
        });

        // Add keyup event for phone input
        $('input[name="phone"]').keyup(function () {
            validatePhone();
        });

        // Add keyup event for password input
        $('input[name="password"]').keyup(function () {
            validatePassword();
        });

        // Add keyup event for password confirmation input
        $('input[name="password_confirmation"]').keyup(function () {
            validatePasswordConfirmation();
        });

        // Add change event for image input
        $('input[name="image"]').change(function () {
            validateImage();
            
        });

       

        // Your other keyup and change events for additional inputs go here

        // Define validation functions
        function validateName() {
            var name = $('input[name="name"]').val();
            var regEx = /[0-9*.-@#$%&^]/g;
            if (!name) {
                showError('name', '* Please Enter Your Name');
            } 
            else if(regEx.test(name)){
              showError('name', '* Name only contain Alphabets');
            }
            else if(name.length < 3){
              showError('name', '* Name only contain Alphabets* Name Must contain more then 2 character');
            }
            else if(name.length >15){
              showError('name', '* Name Must contain less then 14 character');
            }
            else{
                hideError('name');
            }
        }

        function validateEmail() {
            var email = $('input[name="email"]').val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
             if (!email) {
                showError('email', '* Please Enter Your Email');
            }
            else if (!emailRegex.test(email)) {
                showError('email', 'Enter a valid email address.');
            }
              else {
                hideError('email');
            }
        }

        function validatePhone() {
            var phone = $('input[name="phone"]').val();
            var regEx = /^\d+$/g
             if (!phone) {
                showError('phone', '* please Enter Your Phone Number');
            }
            else if (!regEx.test(phone)) {
                showError('phone', '* Phone Number Only Contain Number.');
            }else if (name.length >10) {
                showError('phone', '* Mobile Number Must Contain 10 digit');
            }
              else {
                hideError('phone');
            }
        }

        function validatePassword() {
            var password = $('input[name="password"]').val();
            if (password.length < 8) {
                showError('password', 'Password must be at least 9 characters long.');
            } else {
                hideError('password');
            }
        }

        function validatePasswordConfirmation() {
            var password = $('input[name="password"]').val();
            var passwordConfirmation = $('input[name="password_confirmation"]').val();
            if (password !== passwordConfirmation) {
                showError('password_confirmation', 'Passwords do not match.');
            } else {
                hideError('password_confirmation');
            }
        }

        function validateImage() {
            // Your image validation logic goes here
        }

        // Your other validation functions go here

        // Display error message
        function showError(fieldName, message) {
            $('span[data-field="' + fieldName + '"]').html(message).show();
        }

        // Hide error message
        function hideError(fieldName) {
            $('span[data-field="' + fieldName + '"]').html('').hide();
        }
    });

   
</script>
