import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { AuthService } from '../services/Auth/auth.service';
import { Observable } from 'rxjs';
import Swal from 'sweetalert2';

@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  constructor(private auth: AuthService, private router: Router) { }
  canActivate() {

    if (this.auth.token) {
      return true;
    }
    this.router.navigate(['/login']);
    Swal.fire({
      icon: 'info',
      title: 'Oops...',
      text: 'Primero logueese o comuniquese con el administrador',

    });
  }

}
