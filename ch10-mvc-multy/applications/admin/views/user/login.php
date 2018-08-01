<div id="element-box" class="login">
			<div class="m wbg">
				<h1>Administration Login</h1>
                <!-- ERROR -->
				<div id="system-message-container">
                    <dl id="system-message">
                        <dt class="error">Error</dt>
                        <dd class="error message">
                            <ul>
                                <li>Empty password not allowed</li>
                            </ul>
                        </dd>
                    </dl>
                </div>
				
                <div id="section-box">
					<div class="m">
						<form action="#" method="post" id="form-login">
							<fieldset class="loginform">
                                <label>User Name</label>
                                <input name="username" id="mod-login-username" type="text" class="inputbox" size="15" />
                                <label id="mod-login-password-lbl" for="mod-login-password">Password</label>
                                <input name="passwd" id="mod-login-password" type="password" class="inputbox" size="15" />
                                <div class="button-holder">
                                    <div class="button1">
                                        <div class="next">
                                            <a href="#" onclick="document.getElementById('form-login').submit();">Log in</a>
                                        </div>
                                    </div>
                                </div>
								<div class="clr"></div>
                            </fieldset>
						</form>
						<div class="clr"></div>
					</div>
				</div>
		
            	<p>Use a valid username and password to gain access to the administrator backend.</p>
            	<p><a href="http://localhost/joomla/">Go to site home page.</a></p>
				<div id="lock"></div>
			</div>
		</div>