<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index($id = "")
    {
        $data['title'] = (!empty($id)) ? 'User Update Form' : 'User Registration Form';

        if (!empty($id)) {
            $data['user'] = User::find($id);
            $data['user']['skills'] = explode(",", $data['user']['skills']);
        }
        return view('form', $data);
    }

    public function save(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $data['skills'] = implode(",", $data['skills']);
            if (empty($data['id'])) {
                unset($data['id']);
            }

            if (isset($data['_token'])) {
                unset($data['_token']);
            }

            $result = (!empty($data['id'])) ? User::where('id', $data['id'])->update($data) : User::insert($data);
            echo json_encode([
                'status' => $result,
                'message' => $result ? (!empty($data['id']) ? 'User Updated Successfully' : 'User Created Successfully') : 'Something Went Wrong'
            ]);
        }
    }

    public function table()
    {
        $data['titile'] = 'User List';
        $data['users']  = User::all()->toArray();
        return view('user', $data);
    }

    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('id');

            $result = User::where('id', $id)->delete();
            echo json_encode([
                'status' => $result,
                'message' => $result ? 'User Deleted Successfully' : 'Something Went Wrong'
            ]);
        }
    }
}
