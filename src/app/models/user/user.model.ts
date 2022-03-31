export interface UserModel {
  id?: number;
  dni?: string;
  name?: string;
  phone?: string;
  password?: string;
  role?: string;
}

// export class UserModel {

//   constructor(id = 0, name = "", dni = "", password = "", role = "User",) {
//     this.id = id;
//     this.name = name;
//     this.dni = dni;
//     this.password = password;
//     this.role = role;

//   }

//   id: number;
//   name: string;
//   dni: string;
//   password: string;
//   role: string;
// }