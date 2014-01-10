<?php

use Illuminate\Support\Facades\Input;

class PupilController extends BaseController {

    public function index() {
        return View::make('hello');
    }

    public function store() {
        // Check if `first_name` is set
        if(!Input::has('first_name')) {
            return \Illuminate\Support\Facades\Response::json([
                'errors' => [
                    '`first_name` should be set'
                ]
            ], 400);
        }

        // Check if `last_name` is set
        if(!Input::has('last_name')) {
            return \Illuminate\Support\Facades\Response::json([
                'errors' => [
                    '`first_name` should be set'
                ]
            ], 400);
        }

        $pupil = new User();
        $pupil->first_name = Input::get('first_name');
        $pupil->last_name = Input::get('last_name');
        $pupil->password = '1337';
        $pupil->role = 'PUPIL';
        if($pupil->save()) {
            return \Illuminate\Support\Facades\Response::json($pupil->toArray(), 201);
        }

        return View::make('hello');
    }

}
