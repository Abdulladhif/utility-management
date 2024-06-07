// import { Component } from '@angular/core';
// import { Router } from '@angular/router';
// import { AuthService } from '../../services/auth.service';

// @Component({
//   selector: 'app-login',
//   templateUrl: './login.component.html',
//   styleUrls: ['./login.component.scss']
// })
// export class LoginComponent {
//   credentials = { email: '', password: '' };

//   constructor(private authService: AuthService, private router: Router) { }

//   login() {
//     this.authService.login(this.credentials).subscribe(response => {
//       localStorage.setItem('token', response.token);
//       this.router.navigate(['/dashboard']);
//     });
//   }
// }
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  loginForm = new FormGroup({
    email: new FormControl('', Validators.required),
    password: new FormControl('', Validators.required)
  });

  constructor(private authService: AuthService, private router: Router) { }

  login() {
    this.authService.login(this.loginForm.value).subscribe(response => {
      localStorage.setItem('token', response.token);
      this.router.navigate(['/dashboard']);
    });
  }
}
