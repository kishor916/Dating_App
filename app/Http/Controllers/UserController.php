<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Follow;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
 


class UserController extends Controller
{
    public function homefeed()
    {
        if (auth()->check()) {
            return view('homefeed');
        } else {
            return view('homepage');
        }
    }

    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homefeed');
        } else {
            return view('homepage');
        }
    }

    public function login(Request $request)
    {

        $incomingfields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $incomingfields['email'], 'password' => $incomingfields['password']])) {
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
    // $incomingFields['verification_token'] = Str::random(40); // Generate a verification token

    $user = User::create($incomingFields);
    event(new Registered($user));
   

    return redirect('/')->with('success', 'Your account has been created. Please check your email for a verification link.');
}

    

    public function search(Request $request)
    {

        $query = User::query();

        // Filter by username
        if ($request->has('username')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->input('username') . '%')
                    ->orWhere('last_name', 'like', '%' . $request->input('username') . '%');
            });
        }

        // Filter by gender
        if ($request->has('gender') && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }

        // Filter by age
        if ($request->has('age')) {
            $age = $request->input('age');
            if ($age !== 'all' && $age !== 'custom') {
                $ageRange = explode('-', $age);
                $minAge = $ageRange[0];
                $maxAge = $ageRange[1];
                $query->whereBetween('date_of_birth', [
                    Carbon::now()->subYears($maxAge)->format('Y-m-d'),
                    Carbon::now()->subYears($minAge)->format('Y-m-d'),
                ]);
            } elseif ($age === 'custom' && $request->has('age-custom')) {
                $ageRange = explode('-', $request->input('age-custom'));
                $minAge = $ageRange[0];
                $maxAge = $ageRange[1];
                $query->whereBetween('date_of_birth', [
                    Carbon::now()->subYears($maxAge)->format('Y-m-d'),
                    Carbon::now()->subYears($minAge)->format('Y-m-d'),
                ]);
            }
        }

        // Filter by distance
        if ($request->has('distance')) {
            $distance = $request->input('distance');
            if ($distance !== '' && $distance !== '0') {
                $latitude = auth()->user()->latitude;
                $longitude = auth()->user()->longitude;
                $earthRadius = 6371; // km

                // Formula for calculating distance between two latitudes and longitudes
                $haversine = "(6371 * acos(cos(radians($latitude))
                    * cos(radians(latitude))
                    * cos(radians(longitude)
                    - radians($longitude))
                    + sin(radians($latitude))
                    * sin(radians(latitude))))";

                // Add a select distance clause to the query
                $query->selectRaw("{$haversine} AS distance");

                // Add a where clause to filter by distance
                $query->whereRaw("{$haversine} < ?", [$distance]);
            }
        }

        $users = $query->select('*')->get();
        dd($users);
        //return view('search', ['users' => $users]);

    }

    public function profile(User $user)
    {
        $currentlyFollowing = 0;

        //does the current logged in user have a follow that matched the $user above
        if (auth()->check()) {

            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followinguser', '=', $user->id]])->count();
        }

        return view('profile-page', ['currentlyFollowing' => $currentlyFollowing, 'firstName' => $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }

    public function profileFollowers(User $user)
    {
        $currentlyFollowing = 0;

        //does the current logged in user have a follow that matched the $user above
        if (auth()->check()) {

            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followinguser', '=', $user->id]])->count();
        }

        return view('profile-followers.blade.php', ['currentlyFollowing' => $currentlyFollowing, 'firstName' => $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }
    public function profileFollowing(User $user)
    {
        $currentlyFollowing = 0;

        //does the current logged in user have a follow that matched the $user above
        if (auth()->check()) {

            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followinguser', '=', $user->id]])->count();
        }

        return view('profile-following', ['currentlyFollowing' => $currentlyFollowing, 'firstName' => $user->first_name, 'lastName' => $user->last_name, 'user' => $user->id]);
    }

    public function logout()
    {

        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out.');

    }

}
