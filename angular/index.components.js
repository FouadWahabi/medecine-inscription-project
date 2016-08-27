import {StudentInscriptionFormComponent} from './app/components/student_inscription_form/student_inscription_form.component';
import {AppHeaderComponent} from './app/components/app-header/app-header.component';
import {AppViewComponent} from './app/components/app-view/app-view.component';
import {AppShellComponent} from './app/components/app-shell/app-shell.component';
import {ResetPasswordComponent} from './app/components/reset-password/reset-password.component';
import {ForgotPasswordComponent} from './app/components/forgot-password/forgot-password.component';
import {LoginFormComponent} from './app/components/login-form/login-form.component';
import {RegisterFormComponent} from './app/components/register-form/register-form.component';
import {HomeComponent} from './app/components/home/home.component';
import {ListStudentComponent} from './app/components/admin/list-student/list-student.component';

angular.module('app.components')
    .component('studentInscriptionForm', StudentInscriptionFormComponent)
    .component('appHeader', AppHeaderComponent)
    .component('appView', AppViewComponent)
    .component('appShell', AppShellComponent)
    .component('resetPassword', ResetPasswordComponent)
    .component('forgotPassword', ForgotPasswordComponent)
    .component('loginForm', LoginFormComponent)
    .component('home', HomeComponent)
    .component('registerForm', RegisterFormComponent)
    .component('listStudent', ListStudentComponent);

