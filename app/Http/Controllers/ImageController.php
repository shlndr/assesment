<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
class ImageController extends Controller
{
	/**
     * Warraper function for resize image
     * 
     * @param  \Illuminate\Http\Request $request
     * @return String
     *
     */
	public function index(Request $request)
	{
		$type 	= $request->fittype;

		$width1 	= $request->width1;
		$height1 	= $request->height1;

		$width2 	= $request->width2;
		$height2 	= $request->height2;

		if($type == "cover")
		{
			$img 	= array($width1,$height1);
			$result	= $this->resizeImage($img,$width2,$height2);
		} else {
			$img 	= array($width2,$height2);
			$result = $this->resizeImage($img,$width1,$height1);
		}

		return "Dimension: " . json_encode($result);
	}

	/**
     * Resize image
     * 
     * @param  Array $img,Integer $imageAwidth,Integer $imageAheight
     * @return Array
     *
     */
	public function resizeImage($img,$imageAwidth,$imageAheight) 
	{
	    $dimension 			= array();
	    $imageBwidth 		= $img[0];
	    $imageBheight 		= $img[1];

	    if($imageBwidth > $imageAwidth)
	    {
	        $ratio 		= $imageAwidth/$imageBwidth;
	        $newwidthB 	= round($imageBwidth*$ratio);
	        $newheightB = round($imageBheight*$ratio);

	        if($newheightB > $imageAheight)
	        {
	            $ratio = $imageAheight/$newheightB;
	            $dimension[] = round($newwidthB*$ratio);
	            $dimension[] = round($newheightB*$ratio);
	            return $dimension;
	        } else {
	            $dimension[] = $newwidthB;
	            $dimension[] = $newheightB;
	            return $dimension;
	        }

	    }
	    elseif($imageBheight > $imageAheight) 
	    {
	        $ratio 		= $imageAheight/$imageBheight;
	        $newwidthB 	= round($imageBwidth*$ratio);
	        $newheightB = round($imageBheight*$ratio);

	        if($newwidthB > $imageAwidth)
	        {
	            $ratio = $imageAwidth/$newwidthB;
	            $dimension[] = round($newwidthB*$ratio);
	            $dimension[] = round($newheightB*$ratio);
	            return $dimension;
	        } else {
	            $dimension[] = $newwidthB;
	            $dimension[] = $newheightB;
	            return $dimension;
	        }
	    } else {
	        $dimension[] = $imageBwidth;
	        $dimension[] = $imageBheight;
	        return $dimension;
	    }
	}
}