import { Component, Input, OnInit } from '@angular/core';
import { MatSidenav } from '@angular/material/sidenav';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/services/Auth/auth.service';

@Component({
  selector: 'app-toolbar',
  templateUrl: './toolbar.component.html',
  styleUrls: ['./toolbar.component.css']
})
export class ToolbarComponent implements OnInit {

  @Input() inputSideNav: MatSidenav;
  constructor(
    private auth: AuthService,
    private router: Router
    ) { }
  ngOnInit(): void {
  }
  Logout() {
    this.auth.removeLogin()
  }
  Login() {
    this.router.navigate(['/login'])
  }

}
