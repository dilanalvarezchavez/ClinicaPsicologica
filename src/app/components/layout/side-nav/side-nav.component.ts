import { Component, OnInit } from '@angular/core';
import { AuthHttpService } from '../../../services/Auth/auth-http.service';
import { AuthService } from '../../../services/Auth/auth.service';

@Component({
  selector: 'app-side-nav',
  templateUrl: './side-nav.component.html',
  styleUrls: ['./side-nav.component.css']
})
export class SideNavComponent implements OnInit {

  isLogged: Boolean = false;
  constructor(private auth: AuthService, private authHtpp: AuthHttpService) { }
  ngOnInit() {
    let currentSesion = this.auth.user.dni;
    // let currentSesion = this.auth.role;


    if (currentSesion == '1713177655 ') {
      this.isLogged = true
      console.log(this.isLogged)
    }
    else {
      this.isLogged = false
      console.log(this.isLogged)

    }

  }
}