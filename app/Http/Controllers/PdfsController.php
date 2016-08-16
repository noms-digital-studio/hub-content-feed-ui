<?php

namespace App\Http\Controllers;

//use App\Exceptions\VideoNotFoundException;
use App\Facades\Pdfs;
use App\Http\Controllers\Controller;
//use App\Models\Video;
//use App\User;

class PdfsController extends Controller {

  function showPdfLandingPage($tid) {
    $categories = Pdfs::landingPagePdfs($tid);    

    return view('pdf.landingPage', ['categories' => $categories]);
  }

  function show($tid) {
      $pdfs = Pdfs::show($tid);
	  
	  return view('pdf.detail', ['pdfs' => $pdfs]);	  
  }
}