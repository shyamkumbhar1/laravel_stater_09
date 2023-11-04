<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
 use App\Models\State;
use App\Models\City;
 use App\Models\User;
use App\Events\ContactUsMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use App\Models\Review;
use App\Models\Contactnow;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
 

  class ListingPmhnpsController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        // $professional_title=$_GET['professional_title'];
        // $aoe=$_GET['aoe'];
        // $pin_code=$_GET['pin_code'];
        // $state=$_GET['state'];
        // $city=$_GET['city'];
         // $users = DB::table('users')->paginate(4) ;


        //$users = DB::select("SELECT u.*,(SELECT AVG(rating) FROM reviews WHERE user_id=u.id) as reviews,(SELECT count(id) FROM reviews WHERE user_id=u.id) as reviewcnt FROM `users` u")->paginate(4); 

// $users = DB::table('users as u')
//     ->selectRaw('u.*, (SELECT AVG(rating) FROM reviews WHERE user_id = u.id) as reviews, 
//                 (SELECT COUNT(id) FROM reviews WHERE user_id = u.id) as reviewcnt')
//     ->paginate(4);
        

$usersx = DB::table('users as u')
    ->select('u.*')
    ->selectSub(function ($query) {
        $query->from('reviews')
            ->whereRaw('user_id = u.id')
            ->selectRaw('AVG(rating)');
    }, 'reviews')
    ->selectSub(function ($query) {
        $query->from('reviews')
            ->whereRaw('user_id = u.id')
            ->selectRaw('COUNT(id)');
    }, 'reviewcnt')->where('is_admin','=' ,"0");
 
$paginatedResults = $usersx->paginate(5);


//        echo  $users[0]->id;
// die;

         // $users = DB::table('users')
         // ->join('reviews', 'users.id', '=', 'reviews.user_id')
         //   ->select('users.*', 'reviews.rating')
         //    ->paginate(4) ;

        if (isset($_GET['professional_title']) && !empty($_GET['professional_title'])){
            $users = $users->where('professional_title', 'LIKE', "%" . $_GET['professional_title'] . "%");
        }
		   
        if (isset($_GET['aoe']) && !empty($_GET['aoe'])){
            $var_aoe=$_GET['aoe'];
            $extracted_data=implode(',', $var_aoe);
              // $extracted_data=$extracted_data.', ';
            //print_r($extracted_data);die;
            $users = $users->where('areas_of_expertise', 'LIKE', "%" . 
                $extracted_data . "%");
        }

        if (isset($_GET['pin_code']) && !empty($_GET['pin_code'])){
            $users = $users->where('postal_code', 'LIKE', "%" . $_GET['pin_code'] . "%");
        }

        if (isset($_GET['state']) && !empty($_GET['state'])){
            $users = $users->where('state', 'LIKE', "%" . $_GET['state'] . "%");
        }

        if (isset($_GET['city']) && !empty($_GET['city'])){
            $users = $users->where('city', 'LIKE', "%" . $_GET['city'] . "%");
        }

        /*foreach ($users as $key => $post) {

            $userid = $post->id;
            $reviews = Review::where('user_id',$post->id)->get();
            $reviewsCount = $reviews->count();

            $data['professional_title'] = $post->professional_title;
            $data['areas_of_expertise'] = $post->areas_of_expertise;
            // $data['pin_code'] = $post->pin_code;
            $data['state'] = $post->state;
            $data['city'] = $post->city;
            $data['reviewsCount'] = $reviewsCount;
            $data['userid'] = $userid;
            $data['name'] = $post->name;
            $data['bio'] = $post->bio;
            $data['address_line1'] = $post->address_line1;
            $data['postal_code'] = $post->postal_code;
            $data['bio'] = $post->bio;

            $users[] = $data;
            array_push($a,"blue","yellow");
        }
        $users = (array)$users;*/
 
         $states = State::all();
      // $usersvb=$users
      //   $reviews = Review::where('user_id','78')->get();
      //   $reviewsCount = $reviews->count();

    return view('home.find_pmhnps', compact('states','paginatedResults'));
    }

    public function getCitiesByState($state)
    {
        $cities = City::where('state_id', $state)->get();
        return response()->json($cities);
    }

       public function getProfileByid($pid)
    {    
           $decrypted_pid = Crypt::decryptString($pid);
  

        $users = User::where('id', $decrypted_pid)->get();
        $reviews = Review::where('user_id', $decrypted_pid)->get();
         return view('home.profile', compact('users','reviews'));

    }
     public function store(Request $request)
    {
 
         
        $request->validate([
             'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);
         $user = new Contactnow();
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->comment = $request->input('comment');
         $user->dr_id = $request->input('dr_id');
        
         $user->save();

           
        $data =array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => '',
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message')
        );

        Event::dispatch(new ContactUsMail($data));
        return back()->with('Contactsuccess', 'Thank You For Contact us!!!.');
    }


    public function review_insert(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $user = new Review();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->rating = $request->input('rating');
        $user->comment = $request->input('comment');
          $user->user_id = $request->input('user_id');

        $user->save();
        return back()->with('Reviewsuccess', 'We have received your Review and would like to thank you for writing to us.');

 /// return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
     
    }

}
