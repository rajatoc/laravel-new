<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\UserDetail;
use App\Http\Resources\User as UserResource;
class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();

        $user->access_token = $tokenResult->accessToken;
        $user->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */


    public function getUser(Request $request) {
        $user = $request->user();
        $user_detail = User::find($user->id);

        return response()->json([
            'user' => $user_detail,
            'user_details' => $user_detail->details
        ]);
        
    }

    public function profile () {
        
        return view('profile');
    }

    public function updateProfile (Request $request) {
        $r_user = $request->user();
        
        $user = User::find($r_user->id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->save();

        $user_details = UserDetail::where('user_id', $user->id)->first();
        $user_details->father =  $request->input('father');
        $user_details->mother =  $request->input('mother');
        $user_details->wife=  $request->input('wife');
        $user_details->child =  $request->input('child');
        $user_details->address =  $request->input('address');
        $user_details->country =  $request->input('country');
        $user_details->state =  $request->input('state');
        $user_details->zip =  $request->input('zip');
        $user_details->save();

        $new_user = User::find($user->id);
        return response()->json([
            'user' => $new_user,
            'user_details' => $new_user->details
        ]);
    }

}