import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/Auth/auth.service';
import { AuthHttpService } from '../../../services/Auth/auth-http.service';
import { MessageService } from '../../../services/messages/message.service';
import { of } from 'rxjs';




@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  FormLogin: FormGroup;
  constructor(
    private formBuilder: FormBuilder,
    private authHttpService: AuthHttpService,
    private messageService: MessageService,
    private authService: AuthService,
    private router: Router,
  ) {
    this.FormLogin = this.newFormLogin();
  }
  ngOnInit(): void {
  }
  newFormLogin(): FormGroup {
    return this.formBuilder.group({
      dni: [null, [Validators.required]],
      password: [null, [Validators.required]],
    });
  }
  get dniField() {
    return this.FormLogin.controls['dni'];
  }
  get passwordField() {
    return this.FormLogin.controls['password'];
  }
  onSubmit() {
    console.log('funciona');
    if (this.FormLogin.valid) {
      this.Login();
    } else {
      this.FormLogin.markAllAsTouched();
    }
  }
  Login() {
    this.authHttpService.login(this.FormLogin.value).subscribe(
      Response => {
        this.authService.token = Response.token;
        this.authService.user = Response.data.user;
        this.authService.roles = Response.data.roles;
        this.authService.permissions = Response.data.permissions;
        this.messageService.success(Response);
        this.router.navigate(['paper']);
      }, error => {
        this.messageService.error(error);
      }
    );
  }
  RegisterRedirect() {
    this.router.navigate(['/users/registration']);
  }
}
