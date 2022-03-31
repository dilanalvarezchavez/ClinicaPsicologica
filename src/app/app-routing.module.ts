import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from './components/auth/login/login.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { DataComponent } from './components/data/data.component';
import { PaperComponent } from './components/paper/paper.component';
import { UserComponent } from './components/user/user.component';
import { AuthGuard } from './guards/auth.guard';



const routes: Routes = [
  { path: '', component: LoginComponent, },
  { path: 'dashboard', component: DashboardComponent },
  { path: 'paper', canActivate: [AuthGuard], component: PaperComponent },
  { path: 'data', canActivate: [AuthGuard], component: DataComponent },
  { path: 'user', canActivate: [AuthGuard], component: UserComponent },

  { path: 'login', component: LoginComponent },
  {
    path: '**',
    redirectTo: 'login'
  }


];

@NgModule({
  imports: [RouterModule.forRoot(routes), FormsModule],
  exports: [RouterModule]
})
export class AppRoutingModule { }
