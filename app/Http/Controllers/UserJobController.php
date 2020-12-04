<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\UserJob;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;

    Class UserJobController extends Controller {
        // use to add your Traits ApiResponser
        use ApiResponser;
        private $request;

        public function __construct(Request $request){
            $this->request = $request;
        }

        public function index(){    
            $users = UserJob::all();
            return $this->successResponse($users);

        }

        public function show($id){
            $userjob = UserJob::findOrFail($id);
            return $this->successResponse($userjob);
        }
    }