<div id="Anmeldung">
  <form id="formular_anmeldung" action="login" method="post">
    <div class="contact_anmeldung"><h2>Anmeldung</h2></div>
    <div class="contact_label">

        <p id="benutzernamelabel">
            Benutzername
        </p>
        <p id="loginpwlabel">
            Passwort
        </p>
    </div>
    <div class="contact_formstuff">
            <input type="text" id="benutzernamefeld" name="benutzernamefeld"placeholder="Email eingeben" required />
            <input type="password" id="loginpwfeld" name="loginpwfeld" placeholder="Passwort eingeben" required />
    </div>

    <div class="breakerino"></div>
    <div id="login_notification_box">
        <div id="login_email_info">
      <p id="login_no_email">Benutzername ist keine Email</p>
      </div>
        <div id="login_pwd_info">
       <p id="login_pwd_no">Passwort ist zu kurz</p>
    </div>
    </div>

    <div class="bottom_send_und_link">
        <input type="submit" class="btn_format" value="Login" id="loginbtn"/>

    </div>
    <div class="breakerino"></div>
  </form>
  <button id="reg_activate_btn" class="btn_format" onclick="changereg()">Registrieren</button>
</div>

<div id="Registrierung">
    <form id="formular_registrierung" action="registration" method="post">
      <div class="contact_anmeldung"><h2>Registrierung</h2></div>
      <div class="contact_label">

          <p id="reg_benutzer_label">
              Benutzername
          </p>
          <p id="reg_pwd_label">
              Passwort
          </p>
          <p id="reg_pwd_rep_label">
              Pw. erneut
          </p>
          <p id="sprache_label">
              Sprache
          </p>
          <p>
              Geschlecht
          </p>
          <p id="aktivitat">
              Aktivitäten
          </p>
      </div>
      <div class="contact_formstuff">

              <input type="text" name="benreg" id="benreg" onfocus="displayemailinfo()" onblur="hideemailinfo()" required/>
              <input type="password" name="passwd_reg" id="passwd_reg" onfocus="displaypwdinfo()" onblur="hidepwdinfo()" required/>
              <input type="password" name="passwd_reg_rep" id="passwd_reg_rep" onfocus="displayrepinfo()" onblur="hiderepinfo()" required/>
              <select name="sprak" id="sprak">

                  <option value="deu">Deutsch</option>
                  <option value="frz">Français</option>
                  <option value="ita">Italiano</option>
                  <option value="leer" selected>-</option>
              </select>
              <div>
                  <input type="radio" name="geschlecht" id="maennlich" value="maennlich"/>
                      <label for="maennlich">männlich</label>
              </div>
              <div>
                  <input type="radio" name="geschlecht" id="weiblich" value="weiblich"/>
                      <label for="weiblich">weiblich</label>
              </div>
              <div class="reg_chkbx">
                  <input type="checkbox" name="chkb_handball" id="chkb_handball"/>
                  <label for="chkb_handball">Handball</label><br/>
                  <input type="checkbox" name="chkb_schwimmen" id="chkb_schwimmen"/>
                  <label for="chkb_schwimmen">Schwimmen</label><br/>
                  <input type="checkbox" name="chkb_parkour" id="chkb_parkour"/>
                  <label for="chkb_parkour">Parkour</label>
              </div>

      </div>

      <div class="breakerino"></div>

      <div id="reg_email_info">
        <p id="no_email">Benutzername ist keine Email</p>
        <p id="yes_email">Benutzername ist gültige Email</p>
      </div>

      <div id="reg_pwdinfo">
        <p>Passwort muss folgendes enthalten</p>
        <ul>
          <li class="vorgaben">mind. 1 Kleinbuchstabe</li>
          <li class="vorgaben">mind. 1 Grossbuchstabe</li>
          <li class="vorgaben">mind. 1 Zahl</li>
          <li class="vorgaben">mind. 1 Sonderzeichen</li>
          <li class="vorgaben">mind. 8 Zeichen lang</li>
          <li id="stimmt">Es entspricht den Kriterien!</li>
        </ul>
      </div>
      <div id="reg_pwd_rep_info">
        <p id="pwd_no_correlation">Passwörter stimmen nicht überein!</p>
        <p id="pwd_yes_correlation">Passwörter stimmen überein!</p>
      </div>
      <input type="submit" class="btn_format" value="registrieren" id="reg_btn"/>
      <input type="button" class="btn_format" value="zurück" id="reg_back_btn" onclick="changereg()"/>
      <div class="breakerino"></div>
    </form>
</div>
