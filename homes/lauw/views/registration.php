<script src="./js/functions.js"></script>

<div id="content">

    <article>
        <div>
             <header>
                 <div>
                    <h2 class="section_titel">Registration!</h2>
                </div>
            </header>

            <article>
                <div>
                     <h3 class="section_subtitel">Register and start managing your collection!</h3>
                </div>
                    <div>
                        <p>Just a few more steps untill you can start using all the features of this wonderful website! Please fill out the form.
                        </p>
                    </div>
            </article>

        </div>
    </article>

    <div>

    <form id="registration_form" name="registration_form" class="pure-form pure-form-aligned" action="register" onsubmit="return validateForm()" method="post">
        <fieldset>
        <div class="pure-control-group ">
            <label for="firstname">Firstname</label>
            <input id="firstname" type="text" name="firstname" placeholder="Firstname" required>  
            <span class="pure-form-message-inline">First letter uppercase.</span>          
        </div>

        <div class="pure-control-group ">
            <label for="surname">Surname</label>
            <input id="surname" type="text" name="surname" placeholder="Surname" required>     
            <span class="pure-form-message-inline">First letter uppercase.</span>         
        </div>

        <div class="pure-control-group ">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" placeholder="Username" required> 
            <span class="pure-form-message-inline">"_" allowed.</span>             
        </div>  

        <div class="pure-control-group">
            <label for="email_registration">Email</label>
            <input id="email_registration" type="email" name="email_registration" placeholder="Email Address" required>
         </div>

        <div class="pure-control-group">
            <label for="password_registration">Password</label>
            <input id="password_registration" type="password" name="password_registration" placeholder="Password" required>
            <span class="pure-form-message-inline">At least 1 uppercase letter and number. Must be 6 letters long.</span>  
        </div>

        <div class="pure-control-group">
            <label for="password_conformation_registration">Confirm Password</label>
            <input id="password_conformation_registration" type="password" name="password_conformation_registration" placeholder="Confirm Password" required>
            <span class="pure-form-message-inline">Must match password.</span>  
        </div> 

            <div class="pure-controls">
                <label for="cb" class="pure-checkbox">
                    <input id="cb" type="checkbox"  name="checkbox" required onClick="validateForm_Registration()" > I accept what this site has to offer
                </label>

                 <button type="button" id="check_username_button" class="pure-button pure-button-primary login_button" disabled="disabled">Check Username</button>
                <button type="submit" id="register_button" class="pure-button pure-button-primary login_button" disabled="disabled">Submit</button>
            </div>
        </fieldset>
    </form>
</div>


</div>

<script src="./js/register_validation.js"></script>
