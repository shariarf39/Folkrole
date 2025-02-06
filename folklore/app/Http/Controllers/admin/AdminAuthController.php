<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Ebook;
use App\Models\users;
use App\Models\EbookPurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    function adminLogin()
    {
        return view('server/pages/adminLogin');
    }
    public function adminDashboard()
    {
        
        return view('dashboard');
    }

    public function adminmenu()
    {
        
       
        return view('admin/component/dashboard');
    }
    public function adminCourse()
    {
        
        $courses = Course::all();
        return view('server/pages/course', compact('courses'));
       
    }
    public function admin()
    {
        
        $admins = Admin::all();
        return view('server/pages/admin', compact('admins'));
    }

    public function users()
    {
        
        $users = users::all();
        return view('server/pages/users', compact('users'));
    }


    public function adminebook(Request $request)
    {
        $search = $request->search;
        $ebooks = Ebook::when($search, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%');
        })->get(); // Retrieve all matching records without pagination
    
        return view('server/pages/ebook', compact('ebooks'));
    }

 
public function ebookPurchasesTable(Request $request)
{
    $search = $request->search;

    $ebooks = DB::table('ebook_purchases')
        ->join('users', 'ebook_purchases.user_id', '=', 'users.id')
        ->join('ebooks', 'ebook_purchases.ebook_id', '=', 'ebooks.id')
        ->select('ebook_purchases.*', 'ebook_purchases.id as pur_id','ebook_purchases.is_active as pur_is_active', 'users.*', 'ebooks.*')
        ->when($search, function ($query, $search) {
            return $query->where(function ($q) use ($search) {
                $q->where('ebooks.title', 'like', '%' . $search . '%')
                  ->orWhere('users.name', 'like', '%' . $search . '%');
            });
           
        })
        ->orderBy('ebook_purchases.is_active', 'asc') // Sorts by is_active (1 first, then 2)
        ->get();

    return view('server/pages/ebookPurchasesTable', compact('ebooks'));
}
    
    

    public function adminGallery()
    {
        $images = Gallery::all();
        return view('server/pages/gallery', compact('images'));
    }

    public function adminNews()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('server/pages/news', compact('news'));
    }

    public function plogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('adminDashboard')->with('successAdmin', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function adminlogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminlogin')->with('successAdmin', 'Logged out successfully!');
    }


    //admin

     // Change the admin status (active/deactive)
     public function adminchangeStatus(Request $request)
     {
         $admin = Admin::find($request->id);
         $admin->is_active = $request->status;
         $admin->save();
 
         return redirect()->route('admin')->with('sucess', 'Admin added successfully.');
     }
 
     // Add a new admin
     public function addAdmin(Request $request)
     {
         // Validate the request data
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:admins',
             'password' => 'required|string|min:8|confirmed',  
         ]);
         
         // Create a new admin
         Admin::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => bcrypt($request->password), 
             'is_active' => 1, 
         ]);
         
         // Redirect with success message
         return redirect()->route('admin')->with('success', 'Admin added successfully.');
     }
     


     public function deleteAdmin(Request $request)
{
    $admin = Admin::find($request->id);

    if ($admin) {
        $admin->delete();
         return redirect()->route('admin')->with('sucess', 'Admin added successfully.');
    }

   
}

public function storeCourse(Request $request)
{


    $cr = new Course;
    $cr->title = $request->title;
    $cr->short_description = $request->short_description;
    $cr->description = $request->description;
    $cr->regular_price = $request->regular_price;
    $cr->offer_price = $request->offer_price;
  

    if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $filename = uniqid() . '_' . $cr->cr_name;
        $file->move('uploads/images/courses', $filename);
        $cr->picture = $filename;
    }

    $result = $cr->save();

    
    if ($result) {
        return redirect()->route('adminCourse')->with('sucess', 'Admin added successfully.');
    } else {
        return redirect()->route('adminCourse')->with('error', 'Somethinf went wrong, please try again.');
    }
    

}

public function deleteCourse(Request $request)
{
    $course = Course::find($request->id);

    if (!$course) {
        return redirect()->back()->with('error', 'Course not found.');
    }

    // Delete the course image if it exists
    if ($course->picture) {
        $imagePath = public_path('uploads/images/courses/' . $course->picture);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the course from database
    $course->delete();

    return redirect()->route('adminCourse')->with('success', 'Course deleted successfully.');
}

public function coursechangeStatus(Request $request)
{
    $admin = Course::find($request->id);
    $admin->is_active = $request->status;
    $admin->save();

    return redirect()->back()->with('success', 'Course status updated successfully.');
}


public function storeGallery(Request $request)
{
  
    // Save to database
    $gallery = new Gallery();
    $gallery->title = $request->title;
    $gallery->is_active = $request->has('is_active') ? 1 : 0;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('uploads/images/gallery', $filename);
        $gallery->image = $filename;
    }
    $gallery->save();


    return redirect()->back()->with('success', 'Image uploaded successfully.');
}


public function destroyGallery($id)
{
    $image = Gallery::findOrFail($id);
    $imagePath = public_path('uploads/images/gallery/'.$image->image);

    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    $image->delete();
    return redirect()->back()->with('success', 'Image deleted successfully.');
}


public function gallerychangeStatus(Request $request)
{
    $admin = Gallery::find($request->id);
    $admin->is_active = $request->status;
    $admin->save();

    return redirect()->back()->with('success', 'Gallery status updated successfully.');
}


  // Store news
  public function storeNews(Request $request)
  {
      
     

    $news = new News();
    $news->title = $request->title;
    $news->short_description = $request->short_description;
    $news->full_description = $request->full_description;
    $news->news_date = $request->news_date;
    $news->is_active = $request->has('is_active') ? 1 : 0;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = uniqid() . '_' . $file->getClientOriginalName();
        $file->move('uploads/images/news', $filename);
        $news->image = $filename;
    }
    $news->save();


 

      return redirect()->back()->with('success', 'News uploaded successfully');
  }

  // Delete news
  public function destroyNews($id)
  {
      $news = News::findOrFail($id);
  
      // Construct the full image path
      $imagePath = public_path('uploads/images/news/' . $news->image);
  
      if (file_exists($imagePath)) {
        unlink($imagePath);
    }
  
      $news->delete();
  
      return redirect()->back()->with('success', 'News deleted successfully');
  }

  // Toggle active status
  public function toggleStatusNews(Request $request)
  {
    $admin = News::find($request->id);
    $admin->is_active = $request->status;
    $admin->save();

    return redirect()->back()->with('success', 'Gallery status updated successfully.');
  }


  public function storeEbook(Request $request)
  {
    
      $ebook = new Ebook();
      $ebook->title = $request->title;
      $ebook->shortdes = $request->short_description;
      $ebook->fulldes = $request->full_description;
      $ebook->regularprice = $request->regular_price;
      $ebook->offerprice = $request->offer_price;
      $ebook->is_active = $request->has('is_active') ? 1 : 0;
  
      if ($request->hasFile('file')) {
          $file = $request->file('file');
          $filename = uniqid() . '_' . $file->getClientOriginalName();
          $file->move('uploads/pdf/ebooks', $filename);
          $ebook->file_path = $filename;
      }
      $ebook->save();
  

  
        return redirect()->back()->with('success', 'News uploaded successfully');
  }

  public function destroyEbook($id)
  {
      $ebook = Ebook::findOrFail($id);

      $pdfPath = public_path('uploads/pdf/ebooks' . $ebook->file_path);
  
      if (file_exists($pdfPath)) {
        unlink($pdfPath);
    }
  
      $ebook->delete();
  

      return back()->with('success', 'eBook deleted successfully.');
  }

  public function toggleStatusEbook($id)
  {
      $ebook = Ebook::findOrFail($id);
      $ebook->is_active = !$ebook->is_active;
      $ebook->save();

      return back()->with('success', 'eBook status updated.');
  }



  // Change the users status (active/deactive)

  public function deleteusers(Request $request)
{
 $admin = users::find($request->id);

 if ($admin) {
     $admin->delete();
      return redirect()->route('admin')->with('sucess', 'Admin added successfully.');
 }


}



public function destroyPurEbook($id)
{
    $ebook = EbookPurchase::findOrFail($id);

    $ebook->delete();


    return back()->with('success', 'eBook deleted successfully.');
}

public function toggleStatusPurEbook($id)
{
    $ebook = EbookPurchase::findOrFail($id);
    $ebook->is_active = ($ebook->is_active == 1) ? 2 : 1;
    $ebook->save();

    return back()->with('success', 'eBook status updated.');
}


 
  
}

   





     

