import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
// import themes from '../../assets/themes/themes.json';
import { PermissionModel } from '../../models/permission/permission.model';
import { RoleModel } from '../../models/role/role.model';
import { UserModel } from '../../models/user/user.model';



@Injectable({
  providedIn: 'root'
})

export class AuthService {

  usuario: UserModel;
  constructor(private router: Router) {
  }

  // changeTheme(theme: string) {
  //   const themePath = themes.find(element => element.name == theme)?.path;
  //   console.log(themePath);
  //   const element = document.getElementById('theme-css');
  //   if (element && themePath) {
  //     element.setAttribute('href', themePath);
  //   }
  // }

  get token(): string | null {
    return JSON.parse(String(localStorage.getItem('token')));
  }

  set token(value: string | undefined | null) {
    localStorage.setItem('token', JSON.stringify(value));
  }

  get user(): UserModel | null {
    return JSON.parse(String(localStorage.getItem('auth')));
  }

  set user(user: UserModel | undefined | null) {
    localStorage.setItem('auth', JSON.stringify(user));
  }

  get permissions(): PermissionModel[] {
    return JSON.parse(String(localStorage.getItem('permissions')));
  }

  set permissions(permissions: PermissionModel[] | undefined | null) {
    localStorage.setItem('permissions', JSON.stringify(permissions));
  }

  get role(): RoleModel | null {
    return JSON.parse(String(localStorage.getItem('role')));
  }

  set role(role: RoleModel | undefined | null) {
    localStorage.setItem('role', JSON.stringify(role));
  }

  get roles(): RoleModel[] {
    return JSON.parse(String(localStorage.getItem('roles')));
  }

  set roles(roles: RoleModel[] | undefined | null) {
    localStorage.setItem('roles', JSON.stringify(roles));
  }

  get keepSession(): boolean | null {
    return JSON.parse(String(localStorage.getItem('keepSession')));
  }

  set keepSession(value: boolean | undefined | null) {
    localStorage.setItem('keepSession', JSON.stringify(value));
  }

  removeLogin() {
    localStorage.removeItem('token');
    localStorage.removeItem('auth');
    localStorage.removeItem('roles');
    localStorage.removeItem('role');
    localStorage.removeItem('permissions');
    localStorage.removeItem('keepSession');
    this.router.navigate(['/login']);
  }
}