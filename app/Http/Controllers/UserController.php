<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Follow;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function homefeed()
    {
        if (auth()->check()){
            return view('homefeed');
        } else {
            return view('homepage');
        }
    }

    public function showCorrectHomepage(){
        if (auth()->check()) {
            return view('homefeed');
        }else{
            return view('homepage');
        }
    }
   

    public function login(Request $request){

        $incomingfields=$request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (auth()->attempt(['email' => $incomingfields['email'],'password'=>$incomingfields['password']])) {
            $request->session()->regenerate();
            return redirect('/homepagefeed')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/')->with('failure', 'Invalid login.');
        }
    }

    
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'first_name' => ['required', 'min:3', 'max:13'],
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:7'],
            'gender' => 'required',
            'date_of_birth' => 'required',
            'address' => 'required',
        ]);
    
        $client = new Client();
        $geocoder = new Geocoder($client);
        $geocoder->setApiKey('AIzaSyDsDbf6HI9VCkiCZaR3udlrz8lslseyC5o');
        $result = $geocoder->getCoordinatesForAddress($incomingFields['address']);
    
        if ($result) {
            $latitude = $result['lat'];
            $longitude = $result['lng'];
            $incomingFields['latitude'] = $latitude;
            $incomingFields['longitude'] = $longitude;
        } else {
            return redirect()->back()->withErrors(['address' => 'Invalid address']);
        }
    
        $incomingFields['password'] = password_hash($incomingFields['password'], PASSWORD_BCRYPT);
    
        User::create($incomingFields);
    
        return 'User has been registered';
    }

    public function search(Request $request){
    $incomingFields = $request->validate([
        'gender' => 'required',
        'min_age' => 'nullable|integer',
        'max_age' => 'nullable|integer',
        'name' => 'nullable',
        'distance' => 'nullable|integer',
    ]);

    $query = User::query();

    // Filter by gender
    $query->where('gender', $incomingFields['gender']);

    // Filter by age range
    if (isset($incomingFields['min_age'])) {
        $query->whereRaw('YEAR(CURRENT_DATE) - YEAR(date_of_birth) >= ?', [$incomingFields['min_age']]);
    }
    if (isset($incomingFields['max_age'])) {
        $query->whereRaw('YEAR(CURRENT_DATE) - YEAR(date_of_birth) <= ?', [$incomingFields['max_age']]);
    }

    // Filter by name
    if (isset($incomingFields['name'])) {
        $query->where(function($q) use ($incomingFields) {
            $q->where('first_name', 'LIKE', '%'.$incomingFields['name'].'%')
              ->orWhere('last_name', 'LIKE', '%'.$incomingFields['name'].'%');
        });
    }

    // Filter by distance
    if (isset($incomingFields['distance'])) {
        $origin = auth()->user()->latitude.',' .auth()->user()->longitude;
        $haversine = '( 6371 * acos( cos( radians('.$origin.') ) *
                cos( radians( latitude ) )
                * cos( radians( longitude ) - radians('.$origin.') )
                + sin( radians('.$origin.') ) *
                sin( radians( latitude ) ) ) )';
        $query->selectRaw("*, {$haversine} AS distance")
              ->having('distance', '<=', $incomingFields['distance'])
              ->orderBy('distance', 'asc');
    }

    $results = $query->get();

    return view('search-results', compact('results'));
    }


    

    
    public function profile(User $user){
        $currentlyFollowing = 0;

        //does the current logged in user have a follow that matched the $user above
        if (auth()->check()){

            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('profile-page',['currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }

    public function profileFollowers(User $user){
        $currentlyFollowing = 0;

       //does the current logged in user have a follow that matched the $user above
        if (auth()->check()){

            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('profile-followers.blade.php',['currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }
    public function profileFollowing(User $user){
        $currentlyFollowing = 0;

        //does the current logged in user have a follow that matched the $user above
        if (auth()->check()){

            $currentlyFollowing= Follow::where([['user_id', '=', auth()->user()->id],['followinguser', '=', $user->id]])->count();
        }

        return view('profile-following',['currentlyFollowing' => $currentlyFollowing,'firstName'=> $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }

    public function logout(){

        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');

    }


}
?>