<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\User;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;

    Class UserController extends Controller {   
        use ApiResponser;
        private $request;

        public function __construct(Request $request){
            $this->request = $request;
        }
        
        // Create User
        public function addUsers(){

            $rules = [
                'username' => 'required|max:20',
                'password' => 'required:max:20'
            ];

            $this->validate($this->request, $rules);
            $users = new User;

            $users->username = $this->request->username;
            $users->password = $this->request->password;

            $users->save();
            return $this->successResponse($users);
        }

        // Read Users
        public function getUsers(){

            // $username = $_GET['username'];
            // $password = $_GET['password'];
            // $isFound = false;

            $users = User::all();
            return $this->successResponse($users);

            // foreach($users as $user) {
            //     if($user->username == $username && $user->password == $password){
            //         $isFound = true;
            //         break;
            //     }
            // }

            // if(!$isFound) return response()->json('Invalid Credentials',404);
            // return redirect('/dashboard');
        }

        public function getUser($id){
            $user = User::find($id);
            if($user == null) return $this->errorResponse('No Such User in the database',404);
            return $this->successResponse($user);
        }

        // Update User
        public function updateUser($id){

            $rules = [
                'username' => 'required|max:20',
                'password' => 'required:max:20'
            ];

            $this->validate($this->request, $rules);

            $user = User::find($id);
            if($user == null) return $this->errorResponse('No Such User in the database',404);

            $user->username = $this->request->username;
            $user->password = $this->request->password;

            $user->save();

            return $this->successResponse($user);
        }
        
        public function deleteUser($id){
            $user = User::find($id);

            if($user == null) return $this->errorResponse('No User Found in the Database',404);

            $user->delete();

            return $this->successResponse($user);
        }
    }