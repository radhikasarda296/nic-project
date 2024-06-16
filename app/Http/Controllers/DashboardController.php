<?php

namespace App\Http\Controllers;

use App\Imports\SchemesImport;
use App\Models\File;
use App\Models\Scheme;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

/**
 * @OA\Info(
 *      title="Your API Title",
 *      version="1.0.0",
 *      description="Your API Description",
 *      @OA\Contact(
 *          email="contact@example.com",
 *          name="API Support"
 *      ),
 *      @OA\License(
 *          name="MIT License",
 *          url="https://opensource.org/licenses/MIT"
 *      )
 * )
 */
class DashboardController extends Controller
{
    /** @OA\Get(
     *      path="/api/schemes",
     *      operationId="getSchemes",
     *      tags={"Schemes"},
     *      summary="Get all schemes",
     *      description="Returns a list of all schemes",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="schemes",
     *                  type="array",
     *                  @OA\Items(ref="#/components/schemas/Scheme")
     *              ),
     *          ),
     *      ),
     *      security={
     *          {"sanctum": {}}
     *      }
     * )
     */
    public function getScheme()
    {
        $schemes = Scheme::all();
        return response()->json(['schemes'=>$schemes],200);
    }

    /**
     * Upload Excel
     */
   public function importScheme(Request $request)
   {
       // Validate the uploaded file
       $validator = Validator::make($request->all(),[
           'file' => 'required|file|mimes:xlsx'
       ]);

       if($validator->passes()){
           // Process valid file
           $file = $request->file('file');
           $originalName = $file->getClientOriginalName();
           $extension = $file->getClientOriginalExtension();
           $storedName = time().'.'.$extension;
           $file->move(public_path().'/uploads/schemes/', $storedName);

           $path = public_path().'/uploads/schemes/'.$storedName;

           // Save file details to database
           $fileModel = new File();
           $fileModel->original_name = $originalName;
           $fileModel->stored_name = $storedName;
           $fileModel->path = $path;
           $fileModel->save();

           Excel::import(new SchemesImport(), $path);
           return redirect('dashboard')->with('success', 'Data Imported Successfully');
       } else {
           return redirect()->back()->withErrors($validator);
       }

   }

    /**
     * Dashboard page
     */
    public function dashboard(){
        // Display dashboard view
        return view("dashboard");
    }

    /**
     * Profile update
     */
    public function profile(Request $request){
        // Handle profile update POST request
        if($request->isMethod("post")){

            $request->validate([
                "name" => "required|string",
                "phone" => "required"
            ]);

            // Update user's name and phone number
            $id = auth()->user()->id; // Logged In userID
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->save();

            // Redirect to profile with success message
            return to_route("profile")->with("success", "Successfully, profile updated");
        }
        // Display profile view
        return view("profile");
    }

    /**
     * View uploaded files
     */
    public function viewFiles()
    {
        // Retrieve all files from the database
        $files = File::all();

        // Display view with files data
        return view("view-files")->with("files", $files);
    }
}
