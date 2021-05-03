<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{


    private $uploadPath = "uploads/testimonials/";


     /**
   * Create a new controller instance.
   *
   * @return void
   */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
           $testimonials = testimonial::all();
           return view('admin.testimonial.show',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // return  $request->all();
        $this->validate($request,[
          'title_ar' => ['required', 'string', 'max:255'],

          // 'image'=> ['required'],
      ]);



         // Start of Upload Files
      $formFileName = "image";
      $fileFinalName = "";
      if ($request->$formFileName != "") {
          $fileFinalName = time() . rand(1111,
                  9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
          $path = $this->getUploadPath();
          $request->file($formFileName)->move($path, $fileFinalName);
      }



      // End of Upload Files

        $testimonial = new testimonial;



        $testimonial->image = $fileFinalName;

        $testimonial->title_ar = $request->title_ar;
        $testimonial->title_en = $request->title_en;
        $testimonial->title_tr = $request->title_tr;


        $testimonial->text_ar = $request->text_ar;
        $testimonial->text_en = $request->text_en;
        $testimonial->text_tr = $request->text_tr;


        $testimonial->save();



        return redirect(route('testimonial.index'))->with('message', trans('backend.created_successfully'));



    }



    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Model\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Model\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $testimonial = testimonial::find($id);

      return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Model\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
          'title_ar' => ['required', 'string', 'max:255'],
          // 'image'=>'required',
      ]);

       // Start of Upload Files
         $formFileName = "image";
         $fileFinalName = "";
         if ($request->$formFileName != "") {
             $fileFinalName = time() . rand(1111, 9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
             $path = $this->getUploadPath();
             $request->file($formFileName)->move($path, $fileFinalName);
             $testimonialx = testimonial::find($id);  // here to store image alone
             $testimonialx->image = $fileFinalName; // here there is  a bug when update profile image
             $testimonialx->save();
         }



         // End of Upload Files
        $testimonial = testimonial::where('id',$id)->update($request->except('_token','_method','image'));
      // except image cus we handle it aboves


        return redirect(route('testimonial.index'))->with('message', trans('backend.updated_successfully'));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Model\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = testimonial::find($id);
        unlink($this->getUploadPath() . $testimonial->image);

      testimonial::where('id',$id)->delete();


      return redirect()->back()->with('message', trans('backend.deleted_successfully'));
    }
}


