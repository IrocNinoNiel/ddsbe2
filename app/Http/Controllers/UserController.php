<?php


    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\User;
    use App\UserJob;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;

    Class UserController extends Controller {   
        use ApiResponser;
        private $request;

        public function __construct(Request $request){
            $this->request = $request;
        }
        
        // Create User
        public function addUsers(Request $request){

            $rules = [
                'username' => 'required|max:20',
                'password' => 'required:max:20',
                'jobid' => 'required|numeric|min:1|not_in:0',
            ];

            $this->validate($request, $rules);
            $userjob = UserJob::findOrFail($request->jobid);
            $users = new User;

            $users->username = $request->username;
            $users->password = $request->password;
            $users->jobid = $request->jobid;


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
        public function updateUser(Request $request,$id){
            $rules = [
                'username' => 'required|max:20',
                'password' => 'required:max:20',
                'jobid' => 'required|numeric|min:1|not_in:0',
            ];

            $this->validate($request, $rules);
            // $userjob = UserJob::findOrFail($request->jobid);

            $user = User::find($id);

            if($user == null) return $this->errorResponse('No Such User in the database',404);

            $user->username = $request->username;
            $user->password = $request->password;
            $user->jobid = $request->jobid;

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