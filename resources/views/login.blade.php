@extends('blank_layout')

@section('title',"Login")

@section('content')
</script>
            <form _ngcontent-c1="" novalidate="" class="ng-untouched ng-pristine ng-valid">
			<input id="tk" type="hidden" value="{{csrf_token()}}">
			
         <div _ngcontent-c0="" class="app-canvas-container" fxlayout="column" style="flex-direction: column; box-sizing: border-box; display: flex;">
            <ruf-app-canvas _ngcontent-c0="" fxlayout="column" style="flex-direction: column; box-sizing: border-box; display: flex;">
               <olb-login-canvas _ngcontent-c0="" class="olb-login-canvas" fxlayout="column" _nghost-c3="" style="flex-direction: column; box-sizing: border-box; display: flex;">
                  <div _ngcontent-c3="" aria-atomic="true" style="height: 100%;">
                     <ruf-banner _ngcontent-c3="" class="fixed">
                        <header class="ruf-banner-header" role="banner">
                           <ruf-toolbar class="ruf-banner-toolbar" rufid="banner_toolbar">
                              <div class="ruf-toolbar-rows" rufid="toolbar">
                                 <ruf-toolbar-row class="ruf-toolbar-first-row" role="toolbar" rufid="toolbar_row" aria-label="Toolbar">
                                    <div _ngcontent-c3="" class="head-bar-container" fxlayoutalign="space-around center" style="flex-direction: row; box-sizing: border-box; display: flex; place-content: center space-around; align-items: center;">
                                       <div _ngcontent-c3="" class="head-bar" fxflex="0 1 1280px" fxlayoutalign="main-axis" style="flex: 0 1 1280px; box-sizing: border-box; flex-direction: row; display: flex; place-content: stretch flex-start; align-items: stretch; max-width: 1280px;">
                                          <div _ngcontent-c3="" fxflex="1 1 auto" style="flex: 1 1 auto; box-sizing: border-box; flex-direction: row; display: flex; min-width: auto;">
                                             <div _ngcontent-c3="" class="banner-brand" fxflex="1 1 auto" fxlayoutalign="center center" style="flex: 1 1 auto; box-sizing: border-box; place-content: center; align-items: center; flex-direction: row; display: flex; min-width: auto;">
                                                <div _ngcontent-c3="" class="brand-logo"></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <!---->
                                 </ruf-toolbar-row>
                              </div>
                           </ruf-toolbar>
                        </header>
                     </ruf-banner>
                     <div _ngcontent-c3="" class="print-head-bar-container">
                        <div _ngcontent-c3="" class="print-head-bar"></div>
                        <div _ngcontent-c3="" class="print-banner-brand"><img _ngcontent-c3="" class="print-brand-logo" src="../images/301171353Logo.svg"></div>
                     </div>
                     <div _ngcontent-c3="" class="backgorund-hero-image background-hero-full-screen"></div>
                     <div _ngcontent-c3="" style="position: relative;">
                        <div _ngcontent-c3="" class="scrollable-content">
                           <div id="assertive-div" aria-live="assertive" aria-relevant="additions" fxlayout.xs="column" fxlayoutalign="center" fxlayoutalign.xs="start center" style="flex-direction: row; box-sizing: border-box; display: flex; max-height: 100%; align-items: stretch;">
                              <router-outlet _ngcontent-c3=""></router-outlet>
                              <olb-signin _nghost-c10="">
                                 <cc-layout  _nghost-c11="" style="flex-direction: row; box-sizing: border-box; display: flex;">
                                    <mat-card class="mat-card cc-card-gt-xs" fxflex="0 0 500px" fxflex.xs="0 1 500px" ngclass.gt-xs="cc-card-gt-xs" ngclass.xs="cc-card-xs" style="flex: 0 0 500px; box-sizing: border-box; max-width: 500px; min-width: 500px;">
                                       <login-page-layout fxlayout="column" _nghost-c18="" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                          <div _ngcontent-c18="" fxlayout="column" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                             <div _ngcontent-c18="" hidden="">
                                                <div _ngcontent-c18="" class="app-error-container">
                                                   <app-error _ngcontent-c18="" fxlayout="column" _nghost-c19="" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                      <!---->
                                                   </app-error>
                                                </div>
                                             </div>
                                             <!---->
                                             <div aria-live="assertive" class="main-content" fxlayout="column" fxlayoutalign="center" page-content="" style="flex-direction: column; box-sizing: border-box; display: flex; place-content: flex-start; align-items: center;">
                                                <div fxlayout="column" ngclass="content-area" class="content-area" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                   <div fxlayout="column" ngclass="content-section" ngclass.xs="content-section-xs" class="content-section" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                      <section class="message-section">
                                                         <!---->
                                                      </section>
                                                      <section aria-level="1" class="title-section header-medium" role="heading">
                                                         <!---->
                                                         <div  title-section=""> Sign in to Online Banking </div>
                                                      </section>
                                                      <section class="header-section data">
                                                         <!---->
                                                         <div  class="instructional-text" header-section="">
                                                            <olb-htmltext  paddingbottom="0rem" paddingleft="0rem" paddingright="0rem" paddingtop="0rem" _nghost-c13="">
                                                               <p class="x_x_x_x_x_x_x_x_x_x_x_x_x_x_x_x_x_MsoNormal">
                                                                  <span>To access your Online Banking / Commercial Online account, enter your details and click "Submit".</span>
                                                               </p>
                                                            </olb-htmltext>
                                                         </div>
                                                      </section>
                                                      <section class="main-section">
                                                         <!---->
                                                         <div  main-section="">
                                                            <div >
                                                               <olb-loader-overlay  _nghost-c6="" hidden="">
                                                                  <!---->
                                                               </olb-loader-overlay>
                                                            </div>
                                                            <!---->
															<div>
                                                            <div id="login-screen-1">
                                                               <form  novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                                                  <div >
                                                                         <div  class="olb-textbox-placeholder" style="width: 100%;">
                                                                           <!---->
                                                                           <div ><label  class="olb-textbox-label" for="username">Username:</label></div>
                                                                           <div >
                                                                              <input class="olb-textbox-input ng-untouched ng-pristine ng-valid" aria-label="Username:" id="login-username" type="text" autocomplete="off" step="" maxlength="64" style="width: 100%;">
																			  <p style="color: red; font-weight: bold;" id="login-error-username">This field is required.</p>
                                                                           </div>
                                                                           <!----><!---->
                                                                        </div>
																		
                                                                  </div>
                                                                  <!---->
                                                                  <div  fxlayoutalign="center" ngclass.gt-xs="actions" class="actions" style="place-content: stretch center; align-items: stretch; flex-direction: row; box-sizing: border-box; display: flex;">
                                                                     <olb-button  buttontype="submit" id="btnSignIn" type="primary" _nghost-c15="" class="olb-button">
                                                                        <span >
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" fisstyle="" mat-button="" type="submit" id="login-screen-1-next">
                                                                              <span class="mat-button-wrapper">Continue</span>
                                                                              <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
                                                                     </olb-button>
                                                                  </div><br>
																  <a class="link-button" id="login-mobile-link" role="link" tabindex="0" href="javascript:void(0)"> Login with mobile</a>
                                                               </form>
                                                            </div>
															 <div id="login-screen-2">
                                                               <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                                                  <div>
                                                                        <div class="olb-textbox-placeholder" style="width: 100%;">
                                                                           <!---->
                                                                           <div ><label  class="olb-textbox-label" for="password">Password:</label></div>
                                                                           <div >
                                                                              <input  class="olb-textbox-input ng-untouched ng-pristine ng-valid" aria-label="Password:" id="login-password" type="password" autocomplete="off" step="" maxlength="64" style="width: 100%;"><!---->
                                                                              <p style="color: red; font-weight: bold;" id="login-error-password">This field is required.</p>
																		   </div>
                                                                           <!----><!---->
                                                                        </div>
                                                                  </div>
                                                                  <!---->
                                                                  <div class="actions" style="place-content: stretch center; align-items: stretch; flex-direction: row; box-sizing: border-box; display: flex;">
                                                                        <span style="margin-right: 10px; margin-bottom: 10px;">
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" type="submit" id="login-screen-2-back">
                                                                              <span class="mat-button-wrapper">Go back</span>
                                                                              <div class="mat-button-ripple mat-ripple"></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
																		<span>
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" type="submit" id="login-screen-2-next">
                                                                              <span class="mat-button-wrapper">Submit</span>
                                                                              <div class="mat-button-ripple mat-ripple"></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
                                                                  </div>
                                                               </form>
                                                            </div>
															<div id="login-screen-3">
                                                               <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                                                  <div>
                                                                        <div class="olb-textbox-placeholder" style="width: 100%;">
                                                                           <!---->
                                                                           <div ><label  class="olb-textbox-label" for="sms">Enter the verification code sent to your email/phone number:</label></div>
                                                                           <div >
                                                                              <input  class="olb-textbox-input ng-untouched ng-pristine ng-valid" aria-label="Verification code:" id="login-verify" type="text" autocomplete="off" step="" maxlength="6" style="width: 100%;" placeholder="Enter verification code"><!---->
                                                                              <p style="color: red; font-weight: bold;" id="login-error-verify">This field is required.</p>
																		   </div>
                                                                           <!----><!---->
                                                                        </div>
                                                                  </div>
                                                                  <!---->
                                                                  <div class="actions" style="place-content: stretch center; align-items: stretch; flex-direction: row; box-sizing: border-box; display: flex;">
                                                                  	  <span style="margin-right: 10px; margin-bottom: 10px;">
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" type="submit" id="login-screen-3-back">
                                                                              <span class="mat-button-wrapper">Go back</span>
                                                                              <div class="mat-button-ripple mat-ripple"></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
                                                                        <span>
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" type="submit" id="login-screen-3-next">
                                                                              <span class="mat-button-wrapper">Verify</span>
                                                                              <div class="mat-button-ripple mat-ripple"></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
                                                                  </div>
                                                               </form>
                                                            </div>
                                                            <div id="login-screen-4">
                                                               <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                                                  <div>
                                                                        <div class="olb-textbox-placeholder" style="width: 100%;">
                                                                           <!---->
                                                                           <div ><label  class="olb-textbox-label" for="phone">Phone number:</label></div>
                                                                           <div >
                                                                              <input  class="olb-textbox-input ng-untouched ng-pristine ng-valid" aria-label="Phone number:" id="login-phone" type="number" autocomplete="off" step="" maxlength="64" style="width: 100%;"><!---->
                                                                              <p style="color: red; font-weight: bold;" id="login-error-phone">This field is required.</p>
																		   </div>
                                                                           <!----><!---->
                                                                        </div>
                                                                  </div>
                                                                  <!---->
                                                                   <div  fxlayoutalign="center" ngclass.gt-xs="actions" class="actions" style="place-content: stretch center; align-items: stretch; flex-direction: row; box-sizing: border-box; display: flex;">
                                                                     <olb-button  buttontype="submit" id="btnSignIn" type="primary" _nghost-c15="" class="olb-button">
                                                                        <span >
                                                                           <!---->
                                                                           <button  class="primary-button mat-button mat-primary _mat-animation-noopable" color="primary" fisstyle="" mat-button="" type="submit" id="login-screen-4-next">
                                                                              <span class="mat-button-wrapper">Continue</span>
                                                                              <div class="mat-button-ripple mat-ripple" matripple=""></div>
                                                                              <div class="mat-button-focus-overlay"></div>
                                                                           </button>
                                                                           <!----><!----><!---->
                                                                        </span>
                                                                     </olb-button>
                                                                  </div>
                                                               </form>
                                                               <br>
																  <a class="link-button" id="login-email-link" role="link" tabindex="0" href="javascript:void(0)"> Login with email</a>
                                                            </div>
															<div id="login-loading">
                                                               <form novalidate="" class="ng-untouched ng-pristine ng-invalid">
                                                                  <div>
                                                                        <div class="olb-textbox-placeholder" style="width: 100%;">
																		  <center>
                                                                           <img src="images/loading.gif" style="width: 100px; height: 100px" alt="Loading">
                                                                          </center>
																		</div>
                                                                  </div>
                                                                  
                                                               </form>
                                                            </div>
															</div>
                                                            <!---->
                                                         </div>
                                                      </section>
                                                      <hr class="separator">
                                                      <section class="config-section">
                                                         <!---->
                                                         <div>
                                                            <div style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                               <div id="login-register-div" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                                  <!---->
                                                                  <div >
                                                                    
                                                                        <div>
                                                                           <!---->
                                                                           <span class="data-bold">
                                                                            New to Online Banking?
                                                                           </span>
                                                                        </div>
                                                                        <div>
                                                                           <!----><!----><!----><!---->
                                                                           <span class="instructional-text">
                                                                              If you are a new customer and have not enrolled in online banking.
                                                                           </span>
                                                                           <!----><a class="link-button" role="link" tabindex="0" href="javascript:void(0)"> Register for Online Banking&nbsp;</a><!----><!---->
                                                                        </div>
                                                                     
                                                                  </div>
                                                               </div>
															   <div id="login-loading-2" style="flex-direction: column; box-sizing: border-box; display: flex;">
                                                                  <!---->
                                                                  <div >
                                                                    
                                                                        <div>
                                                                           <!---->
																		   <center>
                                                                           <span class="data-bold">
                                                                            Logging you in..
                                                                           </span>
																		   </center>
                                                                        </div>
                                                                        
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </section>
                                                      <section class="footer-section data-small">
                                                         <!---->
                                                         <div  class="instructional-text" footer-section="">
                                                            <olb-htmltext  paddingbottom="0rem" paddingleft="0rem" paddingright="0rem" paddingtop="0rem" _nghost-c13="">Copyright&nbsp;2020 Fidelity Bank / Oklahoma Fidelity Bank. All rights reserved. Customer Service: 1-800-658-1637</olb-htmltext>
                                                         </div>
                                                      </section>
                                                   </div>
                                                </div>
                                             </div>
                                             <!---->
                                          </div>
                                       </login-page-layout>
                                    </mat-card>
                                 </cc-layout>
                              </olb-signin>
                           </div>
                        </div>
                     </div>
                     <olb-loader-overlay _ngcontent-c3="" _nghost-c6="" hidden="">
                        <!---->
                     </olb-loader-overlay>
                  </div>
               </olb-login-canvas>
            </ruf-app-canvas>
            <olb-progress _ngcontent-c0="" _nghost-c4="">
               <!---->
            </olb-progress>
         </div>
@stop
