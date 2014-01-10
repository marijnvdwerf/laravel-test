<?php

class PortfolioItemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function indexForPupil($pupilId)
	{
        $portfolioItems = User::find($pupilId)->PortfolioItems;
        return \Illuminate\Support\Facades\Response::json($portfolioItems, 400);
	}

}